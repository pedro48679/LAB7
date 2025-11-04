<?php
include_once 'db.php';
include 'model.php';

// Connect to database
$db = dbconnect($hostname,$db_name,$db_user,$db_passwd);

// Clear any existing session and cookie data
setcookie('PHPSESSIONID', '', [
    'expires' => time() - 3600,
    'path' => '/',
    'secure' => isset($_SERVER['HTTPS']),
    'httponly' => true,
    'samesite' => 'Strict'
]);
unset($_COOKIE['PHPSESSIONID']);

session_set_cookie_params([
    'lifetime' => 3600,      // 1 hour
    'path' => '/',
    'domain' => '',           // leave empty for current domain
    'secure' => isset($_SERVER['HTTPS']), // true if HTTPS
    'httponly' => true,
    'samesite' => 'Strict'
]);

session_start();
unset($_SESSION['username']);
unset($_SESSION['email']);
unset($_SESSION['password']);
unset($_SESSION['confirm_password']);
unset($_SESSION['errors']);
// CSRF safeguard, expected origin URL: $_SERVER['HTTP_REFERER'] = 'http://intranet.deei.fct.ualg.pt/DAW/auth-db-sessions/signup.php'   
/*
$match=preg_match("/\/DAW\/auth-db-sessions\/signup.php$/", $_SERVER['HTTP_REFERER']);
if(!$match) {
   header("Location: index.php");
       exit;
}
*/
if (!empty($_POST['back'])) {
  // Display the user signup form
  unset($_SESSION['username']);
  unset($_SESSION['email']);
  unset($_SESSION['password']);
  unset($_SESSION['confirm_password']);
  header("Location: index.php");
  exit;
}
// very simple CSRF safeguard ... code above is better!
if(empty($_POST['confirm'])) {   
  // Display the user signup form
  unset($_SESSION['password']);
  unset($_SESSION['confirm_password']);
  header("Location: index.php");
  exit;
}
else{
  // Process signup submission
  // simple input validation
  // Username
  $errors = [];
  if (empty($_POST['username'])) {
      $errors['username'] = 'Username is required.';
  } elseif (strlen($_POST['username']) < 3) {
      $errors['username'] = 'Username must be at least 3 characters long.';
  } elseif (!preg_match("/^[a-zA-Z0-9_]{3,20}$/", $_POST['username'])) {
      $errors['username'] = 'Username can only contain letters, numbers, and underscores.';
  }

  // Email
  if (empty($_POST['email'])) {
      $errors['email'] = 'Email is required.';
  } 
  elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Invalid email format. Please use format like "user@example.com"';
  }

  // Password
  $password_errors = [];

  if (empty($_POST['password'])) {
      $password_errors[] = 'Password is required.';
  } elseif (strlen($_POST['password']) < 6) {
      $password_errors[] = 'Password must be at least 6 characters long.';
  }
  if (!preg_match('/[A-Z]/', $_POST['password'])) {
      $password_errors[] = 'Password must include at least one uppercase letter.';
  }
  if (!preg_match('/[a-z]/', $_POST['password'])) {
      $password_errors[] = 'Password must include at least one lowercase letter.';
  }
  if (!preg_match('/[\W_]/', $_POST['password']) && !preg_match('/[0-9]/', $_POST['password'])) {
      $password_errors[] = 'Password must include at least one special character or number.';
  }

  if (!empty($password_errors)) {
      $errors['password'] = implode('<br>', $password_errors);
  }


  // Confirm password
  if (empty($_POST['confirm_password'])) {
      $errors['confirm_password'] = 'Please confirm your password.';
  } elseif ($_POST['confirm_password'] !== $_POST['password']) {
      $errors['confirm_password'] = 'Passwords do not match.';
  }
    
  if (!empty($errors)) {
      $_SESSION['errors'] = $errors;
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['email'] = $_POST['email'];
      unset($_SESSION['password']);
      unset($_SESSION['confirm_password']);
      header("Location: register.php?m=1");
      exit;
  }

  // Check for existing user

  $user_exists = check_if_user_exists($db,$_POST['email']);


  if($user_exists) {
    // fail: user already exists in database
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['email'] = $_POST['email'];
    unset($_SESSION['password']);
    unset($_SESSION['confirm_password']);
    $errors['email'] = 'Email is already registered. Please use another email.';
    $_SESSION['errors'] = $errors;
    header("Location: register.php?m=2");
    exit;
  }
    
  // success: register new user

  register_user($db,$_POST['username'],$_POST['email'],$_POST['password']);
  unset($_SESSION['username']);
  unset($_SESSION['email']);
  unset($_SESSION['password']);
  unset($_SESSION['confirm_password']);
  header("Location: ./templates/register_success.html");
  exit;
}

?>