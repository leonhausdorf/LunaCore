<?php

ini_set('display_errors', 1);

session_start();

require_once ('Engine.php');
$engine = new Engine();

$engine->startup();
$engine->search($_SERVER["REQUEST_URI"]);
$engine->loadSearchResult();