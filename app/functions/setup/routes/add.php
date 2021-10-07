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

if(!empty($_POST['route']) && !empty($_POST['path'])) {
    $routes->addRoute($_POST['route'], $_POST['path']);
    $activity->insertActivity( 'The route <code>' . $_POST['route'] . '</code> was added', Activity::TYPE_ROUTE_ADD, 'add', Activity::COLOR_SUCCESS);
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
