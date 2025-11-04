<?php
include 'db.php';


$db = dbconnect($hostname, $db_name, $db_user, $db_passwd);
session_start();

// put full path to Smarty.class.php
require_once('/usr/share/php/smarty-4.3.4/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = 'templates';
$smarty->compile_dir = 'templates_c';

      
  if (isset($_GET['m'])) {       
    if ($_GET['m'] == "1") {$smarty->assign('MESSAGE', 'One or more required fields were left blank or are invalid. Please fill them in and try again.');}
      if ($_GET['m'] == "2") {$smarty->assign('MESSAGE', 'A user already exists with your chosen userid. Please try another.');}
  }
  else
    {$smarty->assign('MESSAGE', '');}
  
  if (isset($_SESSION['email']))
    $smarty->assign('email', $_SESSION['email']);
  else
    $smarty->assign('email', '');

  if (isset($_SESSION['password']))
    $smarty->assign('password', $_SESSION['password']);
  else
    $smarty->assign('password', '');

  if (isset($_SESSION['autologin'])) {
    $smarty->assign('autologin', $_SESSION['autologin']);
  } else {
    $smarty->assign('autologin', '');
  }

  if (isset($_SESSION['errors_login'])) {
    $smarty->assign('errors_login', $_SESSION['errors_login']);
    unset($_SESSION['errors_login']); // clear them after showing
  } else {
      $smarty->assign('errors_login', []);
  }

  $user_data = [];

  if (isset($_COOKIE['PHPSESSIONID'])) {
      $cookie_data = json_decode($_COOKIE['PHPSESSIONID'], true);
      if (is_array($cookie_data)) {
          $user_data = $cookie_data;
          $_SESSION['user_data'] = $user_data;

      }
  }

  if (empty($user_data) && isset($_COOKIE['rememberMe'])) {
      $remember_user = NULL;
      if (isset($_COOKIE['rememberMe'])) {
          $remember_user = $_COOKIE['rememberMe'];
          $query = "SELECT * FROM users WHERE remember_digest = '$remember_user' LIMIT 1";
          $result = mysqli_query($db, $query);

          // If user exists and remember_digest matches, auto-log them in
          if ($result && mysqli_num_rows($result) > 0) {
              $user = mysqli_fetch_assoc($result);
              // Automatically log the user in by setting session data
              $_SESSION['user_data'] = [
                  'id' => $user['id'],
                  'username' => $user['name'],
                  'email' => $user['email']
              ];
              $user_data = $_SESSION['user_data'];
          }
      }
  }

  $smarty->assign('user_data', $user_data);

  $smarty->assign('remember_user', $_COOKIE['rememberMe'] ?? NULL);

  // Actualiza o template
  $smarty->display('./templates/login_template.tpl');
 
?>