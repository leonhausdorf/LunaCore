<?php
/* Smarty version 3.1.34-dev-7, created on 2022-01-19 13:28:16
  from '/Applications/XAMPP/xamppfiles/htdocs/templates/setup/overview.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61e803e0154857_66307714',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ec74b7a7bac41417f5c96690f0a940674485e4c3' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/templates/setup/overview.tpl',
      1 => 1642595090,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./sidenav.tpl' => 1,
  ),
),false)) {
function content_61e803e0154857_66307714 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>LunaCore - Setup - Overview</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A project management Bootstrap theme by Medium Rare">
    <link href="/app/modules/assets/img/lunalogo.png" rel="icon" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Gothic+A1" rel="stylesheet">
    <link href="/app/modules/assets/css/theme.css" rel="stylesheet" type="text/css" media="all"/>
</head>

<body>

<div class="layout layout-nav-side">

    <?php ob_start();
$_smarty_tpl->_subTemplateRender('file:./sidenav.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>


    <div class="main-container">

        <div class="breadcrumb-bar navbar bg-white sticky-top">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Overview</li>
                </ol>
            </nav>

        </div>
        <div class="mx-3">

            <div class="row mt-3">

                <div class="col-12 col-lg-8">

                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="card">
                                <div class="card-body p-3">
                                    <h6 class="card-title mb-2">Routes</h6>

                                    <span class="card-text font-weight-bold text-dark" style="font-size: 24px"><?php ob_start();
echo $_smarty_tpl->tpl_vars['COUNTROUTES']->value;
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
</span>
                                    <!-- End Row -->
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="card">
                                <div class="card-body p-3">
                                    <h6 class="card-title mb-2">Activities</h6>

                                    <span class="card-text font-weight-bold text-dark" style="font-size: 24px"><?php ob_start();
echo $_smarty_tpl->tpl_vars['COUNTACTIVITY']->value;
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
</span>
                                    <!-- End Row -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title mb-3">Latest Changelog</h6>

                                    <article id="1323">
                                        <h4><p><code>1.4.0</code> - setup update - 07 October 2021</p></h4>
                                        <div>
                                            <ul>
                                                <li>Added a whole new design to LunaCore</li>
                                                <li>Changed and added new modules
                                                    <ul>
                                                        <li>Added Activity module <code>modules/core/Activity.php</code></li>
                                                        <li>Added Setup module <code>modules/core/Setup.php</code></li>
                                                        <li>Edited Routes module <code>modules/core/Routes.php</code></li>
                                                    </ul>
                                                </li>
                                                <li>Changed the design of every page</li>
                                                <li>Added a whole new setup dashboard
                                                    <ul>
                                                        <li>Initial setup page</li>
                                                        <li>Login page</li>
                                                        <li>Overview page</li>
                                                        <li>Routes page for edit, remove and add routes</li>
                                                    </ul>
                                                </li>
                                                <li>Activity storage in <code>app/storage/activity.json</code></li>
                                                <li>New design for startpage and 404</li>
                                                <li>Minor bug fixes</li>
                                            </ul>
                                        </div>
                                    </article>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="col-12 col-lg-4">

                    <div class="row">
                        <div class="col-12">
                            <ol class="list-group list-group-activity">
                                <li class="list-group-item">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <div>
                                                <span class="h6">Last Activities</span>
                                            </div>
                                        </div>

                                    </div>
                                </li>

                                <?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ACTIVITY']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>

                                <li class="list-group-item">
                                    <div class="media align-items-center">
                                        <ul class="avatars">
                                            <li>
                                                <div class="avatar bg-primary" style="background: <?php ob_start();
echo $_smarty_tpl->tpl_vars['row']->value['color'];
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
 !important;">
                                                    <i class="material-icons"><?php ob_start();
echo $_smarty_tpl->tpl_vars['row']->value['icon'];
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
</i>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="media-body">
                                            <div>
                                                <span><?php ob_start();
echo $_smarty_tpl->tpl_vars['row']->value['name'];
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>
</span>
                                            </div>
                                            <span class="text-small"><?php ob_start();
echo $_smarty_tpl->tpl_vars['row']->value['date'];
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>
</span>
                                        </div>

                                    </div>
                                </li>
                                <?php ob_start();
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable9 = ob_get_clean();
echo $_prefixVariable9;?>


                            </ol>
                        </div>
                    </div>

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
