<?php

$tpl = new Smarty();
$tpl->setTemplateDir('templates');
$tpl->setCompileDir('app/tmp');


$setup = new Setup();
$routes = new Routes();

if(!$setup->isSetup())
    header('Location: /setup/');
if(!$setup->isLoggedIn())
    header('Location: /setup/login/');

$routeData = [];
$rowCount = 0;

foreach ($routes->getRawRoutes() as $key => $row) {
    $routeData[++$rowCount] = [
        'route' => $key,
        'file' => $row
    ];
}

$tpl->assign('ROUTES', $routeData);

$tpl->display('setup/routes.tpl');