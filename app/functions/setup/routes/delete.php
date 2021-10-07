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

if(!empty($_POST['number'])) {
    $routes->deleteRoute($_POST['number']);
    $activity->insertActivity( 'The route <code>' . $_POST['route'] . '</code> was deleted', Activity::TYPE_ROUTE_REMOVE, 'delete', Activity::COLOR_DANGER);
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
