<?php
/* Smarty version 3.1.34-dev-7, created on 2021-10-06 00:44:51
  from '/Applications/XAMPP/xamppfiles/htdocs/templates/test.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_615cd56341a7b2_00495481',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '31ecbb062511d626ba69271decdebf1df1dc073c' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/templates/test.tpl',
      1 => 1633468011,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_615cd56341a7b2_00495481 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE HTML>
<html>

<head>
    <title>LunaCore | Engine</title>

</head>

<body>

<h1>LunaCore</h1>
<p>If you see this site, this engine is working.</p>
<p>Test Page</p>

<?php if ($_smarty_tpl->tpl_vars['TEST']->value != '') {?>
    <p>Test value: <?php echo $_smarty_tpl->tpl_vars['TEST']->value;?>
</p>
<?php }?>



</body>

</html><?php }
}
