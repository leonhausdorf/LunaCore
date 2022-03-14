<?php

/*
 * This file was created by Leon Hausdorf
 * Original Filename: documentation.php
 * Project: LunaCore
 * Date: 13.03.22
 */

$tpl = new Smarty();
$tpl->setTemplateDir('templates');
$tpl->setCompileDir('tmp');

$tpl->setLeftDelimiter('{{');
$tpl->setRightDelimiter('}}');

$tpl->display('setup/documentation.tpl');

 
 