<?php

$tpl = new Smarty();
$tpl->setTemplateDir('templates');
$tpl->setCompileDir('tmp');

$tpl->assign('TEST', '');

if(isset($_GET['test']))
    $tpl->assign('TEST', $_GET['test']);

$tpl->display('test.tpl');