<?php

$setup = new Setup();
$activity = new Activity();

if(!$setup->isSetup())
    if(!empty($_POST['username']) && !empty($_POST['password'])) {
        $setup->setAdminCredentials($_POST['username'], $_POST['password']);
        $activity->insertActivity($_POST['username'] . ' was set up', Activity::TYPE_SETUP, 'task_alt', Activity::COLOR_SUCCESS);
        header('Location: /setup/login/');
    } else
        header('Location: /setup/');
else
    header('Location: ' . $_SERVER['HTTP_REFERER']);