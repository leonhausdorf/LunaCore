<?php
/* Smarty version 3.1.34-dev-7, created on 2022-01-19 13:25:25
  from '/Applications/XAMPP/xamppfiles/htdocs/templates/setup/setup.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61e8033549f809_76294692',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f5c04e884836c4be54c2ec6c8ca489205d93575a' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/templates/setup/setup.tpl',
      1 => 1642595090,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e8033549f809_76294692 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>LunaCore - Setup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A project management Bootstrap theme by Medium Rare">
    <link href="/app/modules/assets/img/lunalogo.png" rel="icon" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Gothic+A1" rel="stylesheet">
    <link href="/app/modules/assets/css/theme.css" rel="stylesheet" type="text/css" media="all"/>
</head>

<body>

<div class="main-container fullscreen">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-7">
                <div class="text-center">
                    <h1 class="h2">Setup &#x1f44b;</h1>
                    <p class="lead">Set up your admin credentials</p>
                    <form action="/setup/credentials/" method="post">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Username" name="username" />
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" placeholder="Password" name="password" />
                        </div>
                        <button class="btn btn-lg btn-block btn-primary mt-3" role="button" type="submit">
                            Save
                        </button>
                        <small>Do you need help? <a href="#">Documentation</a>
                        </small>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo '<script'; ?>
 type="text/javascript" src="/app/modules/assets/js/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/app/modules/assets/js/popper.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/app/modules/assets/js/bootstrap.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/app/modules/assets/js/theme.js"><?php echo '</script'; ?>
>

</body>

</html><?php }
}
