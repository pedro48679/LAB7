<?php
/* Smarty version 4.3.4, created on 2025-10-30 16:15:01
  from 'C:\xampp\htdocs\LAB7\templates\passwordchange_template.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_690380f5a59485_41549423',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '29e9886d2eb62bc503885bce598a43fe34e7df9e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LAB7\\templates\\passwordchange_template.tpl',
      1 => 1761837199,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_690380f5a59485_41549423 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
    <form method="post" action="../password_reset.php">
      <h3 class="mb-5" style="margin-top: 50px;">Change Password</h3>
      
      <!-- New Password -->
      <div class="mb-4">
        <label for="new_password">New Password</label>
        <input type="password" 
              class="form-control" 
              id="new_password" name="new_password" 
              placeholder="New password" style="width: 500px;">
      </div>

      <!-- Confirm New Password -->
      <div class="mb-4">
        <label for="confirm_new_password">Confirm New Password</label>
        <input type="password" 
              class="form-control" 
              id="confirm_new_password" name="confirm_new_password" 
              placeholder="Confirm new password" style="width: 500px;">
      </div>

      <!-- Buttons -->
      <div style="padding-left: 100px;">
        <button type="submit" name="submit_password_change" class="btn btn-success">Change Password</button>
        <button type="button" class="btn btn-danger" style="margin: 5px;">Cancel</button>        
        <button type="reset" class="btn" style="background-color: #ff5733; color: white; margin-left: 10px;">Reset</button>
      </div>
    </form>
  </body>
</html><?php }
}
