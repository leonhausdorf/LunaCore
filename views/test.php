<?php

if(isset($_GET['test'])) {
    echo('test successful<br>Test-GET: yes<br>GET-WERT: ' . $_GET['test']);
} else {
    echo('test successful<br>Test-GET: no');
}