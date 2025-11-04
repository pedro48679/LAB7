<?php
include_once 'db.php';
include 'model.php';

$db = dbconnect($hostname, $db_name, $db_user, $db_passwd);

setcookie('PHPSESSIONID', '', [
    'expires' => time() - 3600,
    'path' => '/',
    'secure' => isset($_SERVER['HTTPS']),
    'httponly' => true,
    'samesite' => 'Strict'
]);
unset($_COOKIE['PHPSESSIONID']);

session_set_cookie_params([
    'lifetime' => 3600,
    'path' => '/',
    'secure' => isset($_SERVER['HTTPS']),
    'httponly' => true,
    'samesite' => 'Strict'
]);

session_start();

unset($_SESSION['email'], $_SESSION['password'], $_SESSION['errors_login']);

if (!empty($_POST['back']) || !isset($_POST['confirm'])) {
    header("Location: index.php");
    exit;
}
else{
  $errors_login = [];

  if (empty($_POST['email'])) {
      $errors_login['email'] = 'Email is required.';
  } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $errors_login['email'] = 'Invalid email format.';
  }

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

  if ($password_errors) {
      $errors_login['password'] = implode('<br>', $password_errors);
  }

  if ($errors_login) {
      $_SESSION['errors_login'] = $errors_login;
      $_SESSION['email'] = $_POST['email'];
      header("Location: login.php?m=1");
      exit;
  }

  $user_exists = check_if_user_exists($db, $_POST['email']);
  if (!$user_exists) {
      $_SESSION['errors_login']['email'] = 'No account found with that email.';
      header("Location: login.php?m=2");
      exit;
  }

  $user = login_user($db, $_POST['email'], $_POST['password']);
  if (empty($user)) {
      $_SESSION['errors_login']['password'] = 'Incorrect email or password.';
      $_SESSION['email'] = $_POST['email'];
      header("Location: login.php?m=1");
      exit;
  }

  $user_data = [
      'id' => $user['id'],
      'email' => $user['email'],
      'username' => $user['name']
  ];
  $cookie_value = json_encode($user_data);

  $_SESSION['user_data'] = $user_data;

  // Set cookie for 1 hour
  setcookie(
      'PHPSESSIONID',
      $cookie_value,
      [
          'expires' => time() + 3600,  // 1 hour
          'path' => '/',
          'secure' => isset($_SERVER['HTTPS']),
          'httponly' => false,
          'samesite' => 'Strict'
      ]
  );

  if (!empty($_POST['autologin']) && $_POST['autologin'] == '1') {
    $cookie_remember = substr(md5(time()), 0, 32);
    // Set cookie for 1 hour
    setcookie(
        'rememberMe',
        $cookie_remember,
        [
            'expires' => time() + (3600 * 24 * 30),  // 1 month
            'path' => '/',
            'secure' => isset($_SERVER['HTTPS']),
            'httponly' => false,
            'samesite' => 'Strict'
        ]
    );
    $update_query = "UPDATE users SET remember_digest = '$cookie_remember' WHERE id = {$user_data['id']}";
    mysqli_query($db, $update_query);
  }

  $_SESSION['message_type'] = 1;
  header("Location: ./message.php");
  exit;
}
?>
