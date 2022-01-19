<?php

$routes = new Routes();
$setup = new Setup();
$activity = new Activity();

if(!$setup->isSetup()) {
    header('Location: /setup/');
    die();
}
if(!$setup->isLoggedIn()) {
    header('Location: /setup/login/');
    die();
}

if(!empty($_POST['number']) && !empty($_POST['route']) && !empty($_POST['path'])) {
    $routes->editRoute($_POST['number'], $_POST['route'], $_POST['path']);
    $activity->insertActivity( 'The route <code>' . $_POST['route'] . '</code> was edited', Activity::TYPE_ROUTE_EDIT, 'edit', Activity::COLOR_WARNING);
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
