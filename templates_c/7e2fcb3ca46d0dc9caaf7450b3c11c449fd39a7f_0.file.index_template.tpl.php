<?php
/* Smarty version 4.3.4, created on 2025-10-30 20:19:35
  from 'C:\xampp\htdocs\LAB7\templates\index_template.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6903ba47981572_68934554',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7e2fcb3ca46d0dc9caaf7450b3c11c449fd39a7f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LAB7\\templates\\index_template.tpl',
      1 => 1761851914,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6903ba47981572_68934554 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Index Template</title>
    <link rel="stylesheet" href="./CSS/template.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <div id="index-particles-js"></div>

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
              <li class="nav-item"><a class="nav-link" href="./logout_action.php">Logout</a></li>
              <li class="nav-item"><a class="nav-link" href="./login.php">Login</a></li>
              <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
              <li class="nav-item"><a class="nav-link" href="blog.php">Post blog</a></li>
            </ul>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container py-2">
      <!-- Carousel -->
      <div class="carousel-wrapper">
        <div id="carouselExampleAutoplaying" class="carousel slide custom-carousel" data-bs-ride="carousel" data-bs-interval="9000">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="./images/car.jpg" alt="...">
            </div>
            <div class="carousel-item">
              <img src="./images/plant2.jpg" alt="...">
            </div>
            <div class="carousel-item">
              <img src="./images/pasta.jpg" alt="...">
            </div>
            <div class="carousel-item">
              <img src="./images/view.jpg" alt="...">
            </div>
            <div class="carousel-item">
              <img src="./images/square_cat.jpg" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>

      <!-- Recent Posts Table -->
      <div class="recent-posts table-container py-5">
        <div class="table-responsive custom-table">
          <table class="table table-borderless align-middle posts-table">
            <colgroup>
              <col style="width: 70%"> 
              <col style="width: 10%">
              <col style="width: 11%">
              <col style="width: 9%">
            </colgroup>

            <thead class="table-dark">
              <tr>
                <th colspan="4" class="text-right">Recent Posts</th>
              </tr>
              <tr>
                <th scope="col">Post</th>
                <th scope="col">Author</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
              </tr>
            </thead>
            <tbody class="table-group-divider table-secondary">
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
                <tr class="post-row">
                  <td class="post-content"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['p']->value['content'], ENT_QUOTES, 'UTF-8', true);?>

                    <?php if ((isset($_smarty_tpl->tpl_vars['user_data']->value['username'])) && $_smarty_tpl->tpl_vars['user_data']->value['username'] != '' && (isset($_smarty_tpl->tpl_vars['user_data']->value['id'])) && $_smarty_tpl->tpl_vars['user_data']->value['id'] == $_smarty_tpl->tpl_vars['p']->value['user_id']) {?>
                      <div><a href="blog.php?micropost_id=<?php echo $_smarty_tpl->tpl_vars['p']->value['micropost_id'];?>
">Update</a></div>
                    <?php }?>
                  </td>
                  <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['p']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                  <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['p']->value['created_at'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                  <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['p']->value['updated_at'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                </tr>
              <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <nav aria-label="Post pagination">
      <ul class="pagination justify-content-center mt-4">
        <?php if ($_smarty_tpl->tpl_vars['current_page']->value > 1) {?>
          <li class="page-item">
            <a class="page-link" href="?page=<?php echo $_smarty_tpl->tpl_vars['current_page']->value-1;?>
">Previous</a>
          </li>
        <?php }?>

        <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['total_pages']->value+1) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_start = min(1, $__section_i_0_loop);
$__section_i_0_total = min(($__section_i_0_loop - $__section_i_0_start), $__section_i_0_loop);
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = $__section_i_0_start; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
          <li class="page-item <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null) == $_smarty_tpl->tpl_vars['current_page']->value) {?>active<?php }?>">
            <a class="page-link" href="?page=<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null);?>
">
              <?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null);?>

            </a>
          </li>
        <?php
}
}
?>

        <?php if ($_smarty_tpl->tpl_vars['current_page']->value < $_smarty_tpl->tpl_vars['total_pages']->value) {?>
          <li class="page-item">
            <a class="page-link" href="?page=<?php echo $_smarty_tpl->tpl_vars['current_page']->value+1;?>
">Next</a>
          </li>
        <?php }?>
      </ul>
    </nav>

    
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"><?php echo '</script'; ?>
>    
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"><?php echo '</script'; ?>
>
    <!-- Particles.js configuration for background -->
    <?php echo '<script'; ?>
>
      particlesJS("index-particles-js", {
        "particles": {
          "number": {
            "value": 80,
            "density": { "enable": true, "value_area": 800 }
          },
          "color": { "value": "#f2f2f2" },
          "shape": {
            "type": "circle",
            "stroke": { "width": 0, "color": "#000000" },
            "polygon": { "nb_sides": 5 }
          },
          "opacity": { "value": 0.5 },
          "size": { "value": 3, "random": true },
          "line_linked": {
            "enable": true,
            "distance": 150,
            "color": "#ffffff",
            "opacity": 0.4,
            "width": 1
          },
          "move": {
            "enable": true,
            "speed": 6,
            "direction": "none",
            "out_mode": "out"
          }
        },
        "interactivity": {
          "detect_on": "canvas",
          "events": {
            "onhover": { "enable": true, "mode": "repulse" },
            "onclick": { "enable": true, "mode": "push" },
            "resize": true
          },
          "modes": {
            "repulse": { "distance": 200, "duration": 0.4 },
            "push": { "particles_nb": 4 }
          }
        },
        "retina_detect": false
      });
    <?php echo '</script'; ?>
>
    
  </body>
</html> <?php }
}
