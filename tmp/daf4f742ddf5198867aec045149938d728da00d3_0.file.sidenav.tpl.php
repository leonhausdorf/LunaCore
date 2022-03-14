<?php
/* Smarty version 3.1.34-dev-7, created on 2022-03-14 17:19:16
  from '/Applications/XAMPP/xamppfiles/htdocs/templates/setup/sidenav.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_622f6b0441f6b2_65389466',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'daf4f742ddf5198867aec045149938d728da00d3' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/templates/setup/sidenav.tpl',
      1 => 1647274753,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_622f6b0441f6b2_65389466 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">
    <a class="navbar-brand" href="index-2.html">
        <img class="avatar mr-1" style="background: transparent" alt="Pipeline" src="/app/modules/assets/img/lunalogo.png" /> LunaCore
    </a>
    <div class="d-flex align-items-center">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="collapse navbar-collapse flex-column" id="navbar-collapse">
        <ul class="navbar-nav d-lg-block">
            <li class="nav-item">
                <a class="nav-link" href="/setup/overview/">Overview</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/setup/routes/">Routes</a>
            </li>
            <li class="nav-item">
                <a href="/setup/documentation/" class="nav-link">Documentation</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/setup/login/logout/">Logout</a>
            </li>
        </ul>
        <hr>
        <div class="d-lg-block w-100">
            <span class="text-small text-muted">Quick Links</span>
            <ul class="nav nav-small flex-column mt-2">
                <li class="nav-item">
                    <a href="https://lunacore.eu" class="nav-link">LunaCore Website</a>
                </li>
                <li class="nav-item">
                    <a href="https://docs.lunacore.eu/changelog/" class="nav-link">Changelog</a>
                </li>
            </ul>
        </div>
    </div>
</div><?php }
}
