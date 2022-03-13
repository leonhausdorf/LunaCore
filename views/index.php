<?php

$tpl = new Smarty();
$tpl->setTemplateDir('templates');
$tpl->setCompileDir('app/tmp');

$updater = new Updater();

$tpl->assign('VERSION', $updater->getCurrentVersion());

$tpl->display('index.tpl');