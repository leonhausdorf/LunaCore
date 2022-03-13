<?php

session_start();

$_SESSION['root'] = __DIR__ . '/';

require_once ('Engine.php');
$engine = new Engine();

$engine->startup();
$engine->search($_SERVER["REQUEST_URI"]);
$engine->loadSearchResult();