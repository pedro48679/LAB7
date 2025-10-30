<?php
/* Smarty version 4.3.4, created on 2025-10-30 16:32:55
  from 'C:\xampp\htdocs\LAB7\templates\login_template.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_69038527a3d479_54534227',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0162100ba2ba96440317126b7838f6ae13d05168' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LAB7\\templates\\login_template.tpl',
      1 => 1761838374,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69038527a3d479_54534227 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Template</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="./CSS/template.css">
  </head>
  <body id="login-body">
    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-gradient bg-opacity-75">
      <div class="container-fluid">
        <a class="navbar-brand">
          <img src="images/logo.png" alt="Logo" class="img-fluid">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <?php if ((isset($_smarty_tpl->tpl_vars['user_data']->value['username'])) && $_smarty_tpl->tpl_vars['user_data']->value['username'] != '') {?>
                <a class="nav-link">Welcome, <?php echo $_smarty_tpl->tpl_vars['user_data']->value['username'];?>
!</a>
              <?php } else { ?>
                <a class="nav-link">Welcome!</a>
              <?php }?>
            </li>
          </ul>
              
          <ul class="navbar-nav mb-auto mb-2 mb-lg-0" >
            <ul class="navbar-nav mb-auto mb-2 mb-lg-0">
              <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="./login.php">Login</a></li>
              <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
              <li class="nav-item"><a class="nav-link" href="./blog.php">Post blog</a></li>
            </ul>
          </ul>
        </div>
      </div>
    </nav>
    <div class="card shadow-lg p-4 glassmorphism-card">
      <div class="card-body">
        <form method="post" action="login_action.php">
          <button name="back" value="1" class="btn btn-outline-dark mb-3">
            <i class="bi bi-arrow-left"></i>
          </button>

          <h3 class="text-center mb-5 text-success">Login</h3>
          <!-- Email -->
          <div class="mb-4">
              <label for="email">Email</label>
              <input type="text" 
                    value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
"
                    class="form-control" 
                    id="email" name="email" 
                    placeholder="Enter email">
              <?php if ((isset($_smarty_tpl->tpl_vars['errors_login']->value['email']))) {?>
                <small class="text-danger"><?php echo $_smarty_tpl->tpl_vars['errors_login']->value['email'];?>
</small>
              <?php }?>
          </div>
          <!-- Password -->
          <div class="mb-4">
              <label for="password">Password</label>
              <input type="password" 
                    value="<?php echo $_smarty_tpl->tpl_vars['password']->value;?>
"
                    class="form-control" 
                    id="password" name="password" 
                    placeholder="Enter password">
              <?php if ((isset($_smarty_tpl->tpl_vars['errors_login']->value['password']))) {?>
                <small class="text-danger"><?php echo $_smarty_tpl->tpl_vars['errors_login']->value['password'];?>
</small>
              <?php }?>
          </div>
          <input type="checkbox" name="autologin" value="1"> Remember me </input>
          <br>
          <button type="submit" name= 'confirm' class="btn btn-success w-100 btn-login" value="Login" style="margin-right: 30px">Login</button>
          <div class="text-center mt-3">
            <a class="d-block" href="./password.php">Forgot password?</a>
            <small>Don't have an account? <a href="./register.php">Register</a></small>
          </div>
        </form>
      </div>
    </div>
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"><?php echo '</script'; ?>
>    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  </body>
</html>
<?php }
}
