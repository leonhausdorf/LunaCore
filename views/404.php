<?php

$tpl = new Smarty();
$tpl->setTemplateDir('templates');
$tpl->setCompileDir('tmp');

$tpl->display('404.tpl');