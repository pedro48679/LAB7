<?php
include 'db.php'; // Include your database connection file

$db = dbconnect($hostname, $db_name, $db_user, $db_passwd);

session_start();

// Handle the password reset process
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $errors_change = [];

  $email = $_POST['email'] ?? '';
  $new_password = $_POST['new_password'] ?? '';
  $confirm_new_password = $_POST['confirm_new_password'] ?? '';

  if (empty($email)) {
      $errors_change['email'] = 'Email is required.';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors_change['email'] = 'Invalid email format.';
  }

  $password_errors = [];

  if (empty($new_password)) {
      $password_errors[] = 'Password is required.';
  } elseif (strlen($new_password) < 6) {
      $password_errors[] = 'Password must be at least 6 characters long.';
  }
  if (!preg_match('/[A-Z]/', $new_password)) {
      $password_errors[] = 'Password must include at least one uppercase letter.';
  }
  if (!preg_match('/[a-z]/', $new_password)) {
      $password_errors[] = 'Password must include at least one lowercase letter.';
  }
  if (!preg_match('/[\W_]/', $new_password) && !preg_match('/[0-9]/', $new_password)) {
      $password_errors[] = 'Password must include at least one special character or number.';
  }

  if ($new_password !== $confirm_new_password) {
      $password_errors[] = 'Passwords do not match.';
  }

  if ($password_errors) {
      $errors_change['password'] = implode('<br>', $password_errors);
  }

  if ($errors_change) {
      $_SESSION['errors_change'] = $errors_change;
      $_SESSION['email'] = $email;
      $_SESSION['new_password'] = $new_password;
      $_SESSION['confirm_newpassword'] = $confirm_new_password;
      
      header("Location: password.php");
      exit;
  }

  if (empty($errors_change)) {
      $new_password_md5 = md5($new_password); 
      $update_query = "UPDATE users SET password_digest = ?, updated_at = NOW() WHERE email = ?";
      
      if ($stmt = mysqli_prepare($db, $update_query)) {
          mysqli_stmt_bind_param($stmt, "ss", $new_password_md5, $email);
          
          if (mysqli_stmt_execute($stmt)) {
              unset($_SESSION['email'], $_SESSION['new_password'], $_SESSION['confirm_newpassword']);
              $_SESSION['message_type'] = 9;
              header("Location: ./message.php");
              exit;
          } else {
              $_SESSION['message_type'] = 0;
              header("Location: ./message.php");
              exit;
          }
          mysqli_stmt_close($stmt);
      } else {
          $_SESSION['message_type'] = 0;
          header("Location: ./message.php");
          exit;
      }
  }

  $_SESSION['errors_change'] = $errors_change;
  $_SESSION['email'] = $email;
  header('Location: password.php');
  exit();
}

?>