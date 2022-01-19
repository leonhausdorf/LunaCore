<?php

$tpl = new Smarty();
$tpl->setTemplateDir('templates');
$tpl->setCompileDir('app/tmp');

$setup = new Setup();
if($setup->isSetup())
    header('Location: /setup/overview/');



$tpl->display('setup/setup.tpl');