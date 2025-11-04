<?php
/* Smarty version 4.3.4, created on 2025-10-30 11:47:22
  from 'C:\xampp\htdocs\LAB7\templates\Posts2_Smarty.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6903423aee0dc3_70531665',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b48c1a09282df1c86a8bc73e9ba99c494190a11e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LAB7\\templates\\Posts2_Smarty.tpl',
      1 => 1760473960,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:index_template.tpl' => 1,
  ),
),false)) {
function content_6903423aee0dc3_70531665 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
   <?php $_smarty_tpl->_subTemplateRender('file:index_template.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
   <title>base de dados de posts</title>
   <meta  http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>


<h2>Posts</h2>
<table border=4>
<tr>
  <th align=left>Post</th>
  <th align=left>Author</th>
  <th align=left>Created</th>
  <th align=left>Updated</th>
</tr>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>


<tr>
  <td><?php echo $_smarty_tpl->tpl_vars['p']->value['content'];?>
</td>
  <td align=right><?php echo $_smarty_tpl->tpl_vars['p']->value['name'];?>
</td>
  <td align=center><?php echo $_smarty_tpl->tpl_vars['p']->value['created_at'];?>
</td>
  <td><?php echo $_smarty_tpl->tpl_vars['p']->value['updated_at'];?>
</td>
</tr>

<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>



</table>

</body>

</html><?php }
}
