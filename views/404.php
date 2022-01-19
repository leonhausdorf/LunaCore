<?php

$tpl = new Smarty();
$tpl->setTemplateDir('templates');
$tpl->setCompileDir('app/tmp');

$tpl->display('404.tpl');