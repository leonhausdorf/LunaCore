<?php

$setup = new Setup();

if($setup->isSetup())
    if(!empty($_POST['username']) && !empty($_POST['password'])) {
        $setup->logIn($_POST['username'], $_POST['password']);
    } else
        header('Location: /setup/login/');
else
    header('Location: /setup/');