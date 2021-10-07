<?php

$setup = new Setup();
$activity = new Activity();

if($setup->isSetup()) {
    $setup->logout();
    $activity->insertActivity('Logged out', Activity::TYPE_LOGOUT, 'logout', Activity::COLOR_INFO);
} else
    header('Location: /setup/');