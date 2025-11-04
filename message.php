<?php

  session_start();

  // put full path to Smarty.class.php
  require_once('/usr/share/php/smarty-4.3.4/libs/Smarty.class.php');
  $smarty = new Smarty();

  $smarty->template_dir = 'templates';
  $smarty->compile_dir = 'templates_c';
  unset($_SESSION['message']);
  if ($_SESSION['message_type'] == 1 ) {   
    $message="<p><strong>User Login Successful!</strong></p>";
        $message=$message . "  you just filled in your login form.
      <br />
      If you are not redirected to the Login page in the next 20 seconds,
      click <a href=\"index.php\">here</a>.</p>";


      $smarty->assign('message', $message);
        $smarty->assign('message_type', $_SESSION['message_type']);
  }

  if ($_SESSION['message_type'] == 2 ) {
    setcookie('PHPSESSIONID', '', [
        'expires' => time() - 3600,
        'path' => '/',
        'secure' => isset($_SERVER['HTTPS']),
        'httponly' => true,
        'samesite' => 'Strict'
    ]);
    setcookie('rememberMe', '', [
        'expires' => time() - 3600,
        'path' => '/',
        'secure' => isset($_SERVER['HTTPS']),
        'httponly' => true,
        'samesite' => 'Strict'
    ]);
    $message="<h1>Thank you for your visit</h1>
      <p>To log in again click <a href=\"login.php\">here</a>.</p>";

    $smarty->assign('message', $message);
    $smarty->assign('message_type', $_SESSION['message_type']);
      session_destroy();

  }

  if ($_SESSION['message_type'] == 3 ) {
    $message="<h1>New Post Submitted</h1>
      <p>Redirecting to main page. Else click <a href=\"index.php\">here</a>.</p>";

    $smarty->assign('message', $message);
    $smarty->assign('message_type', $_SESSION['message_type']);
  }
  if ($_SESSION['message_type'] == 4 ) {
    $message="<h1>ERROR: Login first</h1>
      <p>Redirecting to main page. Else click <a href=\"index.php\">here</a>.</p>";

    $smarty->assign('message', $message);
    $smarty->assign('message_type', $_SESSION['message_type']);
  }
  if ($_SESSION['message_type'] == 5 ) {
    $message="<h1>SUCCESS: Post Updated</h1>
      <p>Redirecting to main page. Else click <a href=\"index.php\">here</a>.</p>";

    $smarty->assign('message', $message);
    $smarty->assign('message_type', $_SESSION['message_type']);
  }
  if ($_SESSION['message_type'] == 6 ) {
    $message="<h1>ERROR: Not Allowed</h1>
      <p>Redirecting to main page. Else click <a href=\"index.php\">here</a>.</p>";

    $smarty->assign('message', $message);
    $smarty->assign('message_type', $_SESSION['message_type']);
  }
  if ($_SESSION['message_type'] == 0 ) {
    $message="<h1>ERROR: Couldn't connect to the DataBase.</h1>
      <p>Try again later. <a href=\"index.php\">main page</a>.</p>";

    $smarty->assign('message', $message);
    $smarty->assign('message_type', $_SESSION['message_type']);
  }
  if ($_SESSION['message_type'] == 9 ) {
    $message="<h1>Password change successful</h1>
      <p><a href=\"login.php\">login page</a>.</p>";

    $smarty->assign('message', $message);
    $smarty->assign('message_type', $_SESSION['message_type']);
  }
  // Actualiza o template
  $smarty->display('./templates/message_template.tpl');
 
?>