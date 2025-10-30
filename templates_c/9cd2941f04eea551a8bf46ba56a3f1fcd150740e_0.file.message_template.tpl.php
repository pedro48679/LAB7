<?php
/* Smarty version 4.3.4, created on 2025-10-30 17:14:31
  from 'C:\xampp\htdocs\LAB7\templates\message_template.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_69038ee764b5e6_11958159',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9cd2941f04eea551a8bf46ba56a3f1fcd150740e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LAB7\\templates\\message_template.tpl',
      1 => 1761835423,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69038ee764b5e6_11958159 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
  <head>
   <!-- Registration Message -->
   <?php if ($_smarty_tpl->tpl_vars['message_type']->value == 1) {?>
      <title>Registration Complete</title>
      <meta http-equiv="refresh" content="20; url=index.php" />
   <?php }?>

   <!-- Logout Message -->
   <?php if ($_smarty_tpl->tpl_vars['message_type']->value == 2) {?>
      <title>Goodbye page</title>       
      <meta http-equiv="refresh" content="10; url=index.php" />
   <?php }?>

   <!-- Blog Messages -->
   <?php if ($_smarty_tpl->tpl_vars['message_type']->value == 3) {?>
      <title>SUCCESS: New Post Submitted. Redirecting to main page...</title>       
      <meta http-equiv="refresh" content="10; url=index.php" />
   <?php }?>
   <?php if ($_smarty_tpl->tpl_vars['message_type']->value == 4) {?>
      <title>ERROR: Login first. Redirecting to main page...</title>       
      <meta http-equiv="refresh" content="10; url=index.php" />
   <?php }?>
   <?php if ($_smarty_tpl->tpl_vars['message_type']->value == 5) {?>
      <title>SUCCESS: Post Updated. Redirecting to main page...</title>       
      <meta http-equiv="refresh" content="10; url=index.php" />
   <?php }?>
   <?php if ($_smarty_tpl->tpl_vars['message_type']->value == 6) {?>
      <title>ERROR: Not Allowed. Redirecting to main page...</title>       
      <meta http-equiv="refresh" content="10; url=index.php" />
   <?php }?>
   <?php if ($_smarty_tpl->tpl_vars['message_type']->value == 0) {?>
      <title>ERROR: Can't connect to Database. Try again later. <br> Redirecting to main page...</title>       
      <meta http-equiv="refresh" content="10; url=index.php" />
   <?php }?>
   <?php if ($_smarty_tpl->tpl_vars['message_type']->value == 9) {?>
      <title>ERROR: Password change successful</title>       
      <meta http-equiv="refresh" content="10; url=login.php" />
   <?php }?>
  </head>
  <body>
   <?php echo $_smarty_tpl->tpl_vars['message']->value;?>

  </body>
</html><?php }
}
