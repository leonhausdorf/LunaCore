<?php
/* Smarty version 3.1.34-dev-7, created on 2022-01-19 13:28:19
  from '/Applications/XAMPP/xamppfiles/htdocs/templates/setup/routes.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_61e803e343bb55_24147437',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0ee279ba8a35f7aa03c5a7dc14b600e4e71be7f7' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/templates/setup/routes.tpl',
      1 => 1642595090,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./sidenav.tpl' => 1,
  ),
),false)) {
function content_61e803e343bb55_24147437 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>LunaCore - Setup - Routes</title>
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
$_smarty_tpl->_subTemplateRender("file:./sidenav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>


    <div class="main-container">

        <div class="breadcrumb-bar navbar bg-white sticky-top">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/setup/">Setup</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Routes</li>
                </ol>
            </nav>

        </div>
        <div class="row mx-3 mt-3">
            <div class="col-12">
                <h1 class="display-5 mb-0">Routes</h1>
                <p class="lead">Manage your routes for LunaCore.</p>
            </div>
        </div>
        <hr class="my-4">
        <div class="mx-3">
            <div class="row mt-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="card-options">
                                <a class="btn btn-primary btn-sm mr-2" data-toggle="modal" href="#addRouteModal">
                                    Add new route
                                </a>
                                <div class="modal fade" tabindex="-1" role="dialog" id="addRouteModal">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Add new route</h5>
                                                <button type="button" class="close btn btn-round" data-dismiss="modal" aria-label="Close">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form action="/setup/routes/add/" method="post">

                                                    <div class="form-group">
                                                        <label>Route</label>
                                                        <input name="route" type="text" class="form-control" placeholder="/index/">
                                                        <small class="form-text text-muted">You can change the access route here. Use :param: for using it as $_GET['param']</small>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>File Path</label>
                                                        <input name="path" type="text" class="form-control" placeholder="index.php">
                                                        <small class="form-text text-muted">This is the path to the file you want to access.</small>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary mt-2">Save</button>

                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-title pt-3 pl-3">
                                <h5 data-filter-by="text">Active Routes</h5>
                            </div>
                            <table class="table table-responsive-sm m-0">
                                <thead>
                                <tr>
                                    <th class="pl-3" scope="col">Number</th>
                                    <th scope="col">Route</th>
                                    <th scope="col">File Path</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ROUTES']->value, 'row', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['row']->value) {
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>


                                <tr>
                                    <th class="pl-3" scope="row">#<?php ob_start();
echo $_smarty_tpl->tpl_vars['key']->value;
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
</th>
                                    <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['row']->value['route'];
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>
</td>
                                    <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['row']->value['file'];
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
</td>
                                    <td class="text-right pr-3">
                                        <a href="#editModal<?php ob_start();
echo $_smarty_tpl->tpl_vars['key']->value;
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
" class="btn btn-sm btn-primary mr-1" data-toggle="modal">Edit</a>
                                        <a href="#deleteModal<?php ob_start();
echo $_smarty_tpl->tpl_vars['key']->value;
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>
" class="btn btn-sm btn-danger mr-1" data-toggle="modal">Delete</a>
                                    </td>
                                </tr>

                                <div class="modal fade" tabindex="-1" role="dialog" id="editModal<?php ob_start();
echo $_smarty_tpl->tpl_vars['key']->value;
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>
">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit route</h5>
                                                <button type="button" class="close btn btn-round" data-dismiss="modal" aria-label="Close">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form action="/setup/routes/edit/" method="post">

                                                    <input name="number" hidden type="number" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['key']->value;
$_prefixVariable9 = ob_get_clean();
echo $_prefixVariable9;?>
">

                                                    <div class="form-group">
                                                        <label>Route</label>
                                                        <input name="route" type="text" class="form-control" placeholder="/index/" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['row']->value['route'];
$_prefixVariable10 = ob_get_clean();
echo $_prefixVariable10;?>
">
                                                        <small class="form-text text-muted">You can change the access route here. Use :param: for using it as $_GET['param']</small>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>File Path</label>
                                                        <input name="path" type="text" class="form-control" placeholder="index.php" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['row']->value['file'];
$_prefixVariable11 = ob_get_clean();
echo $_prefixVariable11;?>
">
                                                        <small class="form-text text-muted">This is the path to the file you want to access.</small>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary mt-2">Save</button>

                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" tabindex="-1" role="dialog" id="deleteModal<?php ob_start();
echo $_smarty_tpl->tpl_vars['key']->value;
$_prefixVariable12 = ob_get_clean();
echo $_prefixVariable12;?>
">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h5 class="modal-title">Delete route</h5>
                                                <button type="button" class="close btn btn-round" data-dismiss="modal" aria-label="Close">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <p class="lead text-center">Are you sure to delete this route?</p>

                                                <form action="/setup/routes/delete/" method="post">

                                                    <input name="number" hidden type="number" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['key']->value;
$_prefixVariable13 = ob_get_clean();
echo $_prefixVariable13;?>
">
                                                    <input name="route" hidden type="text" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['row']->value['route'];
$_prefixVariable14 = ob_get_clean();
echo $_prefixVariable14;?>
">

                                                    <button type="submit" class="btn btn-danger btn-block mt-2">Delete</button>

                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php ob_start();
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable15 = ob_get_clean();
echo $_prefixVariable15;?>


                                </tbody>
                            </table>
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
