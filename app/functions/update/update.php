<?php

/*
 * This file was created by Leon Hausdorf
 * Original Filename: update.php
 * Project: LunaCore
 * Date: 13.03.22
 */

$setup = new Setup();
$update = new Updater();

if(!$setup->isSetup()) {
    header('Location: /setup/');
    die();
}
if(!$setup->isLoggedIn()) {
    header('Location: /setup/login/');
    die();
}

$update->createBackup();
$update->installFiles();
$update->updateVersion();

header('Location: ' . $_SERVER['HTTP_REFERER']);