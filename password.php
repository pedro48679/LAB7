<?php

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

  if (isset($_SESSION['email'])) {
    $smarty->assign('email', $_SESSION['email']);
  } else {
    $smarty->assign('email', '');
  }
  
  if (isset($_SESSION['new_password'])) {
    $smarty->assign('new_password', $_SESSION['new_password']);
  } else {
    $smarty->assign('new_password', '');
  }

  if (isset($_SESSION['confirm_newpassword']))
    $smarty->assign('confirm_newpassword', $_SESSION['confirm_newpassword']);
  else
    $smarty->assign('confirm_newpassword', '');

  if (isset($_SESSION['errors_change'])) {
    $smarty->assign('errors_change', $_SESSION['errors_change']);
    unset($_SESSION['errors_change']); // clear them after showing
  } else {
      $smarty->assign('errors_change', []);
  }

  $user_data = [];

  if (isset($_COOKIE['PHPSESSIONID'])) {
      $cookie_data = json_decode($_COOKIE['PHPSESSIONID'], true);
      if (is_array($cookie_data)) {
          $user_data = $cookie_data;
      }
  }
  $smarty->assign('user_data', $user_data);

  // Actualiza o template
  $smarty->display('./templates/password_template.tpl');
 
?>