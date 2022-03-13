<?php

$tpl = new Smarty();
$tpl->setTemplateDir('templates');
$tpl->setCompileDir('app/tmp');

$setup = new Setup();
$routes = new Routes();
$activity = new Activity();
$update = new Updater();

if(!$setup->isSetup())
    header('Location: /setup/');
if(!$setup->isLoggedIn())
    header('Location: /setup/login/');

$tpl->assign('ACTIVITY', $activity->getLastActivities(7));
$tpl->assign('COUNTROUTES', $routes->countRoutes());
$tpl->assign('COUNTACTIVITY', $activity->countActivities());
$tpl->assign('WANTUPDATE', $update->isNewVersionAvailable());
$tpl->assign('UPDATEVERSION', $update->getRemoteVersion());

$tpl->display('setup/overview.tpl');