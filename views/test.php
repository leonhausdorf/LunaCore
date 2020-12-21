<?php

 /*
  * Test file for engine tests
  * this file is only for debug purposes.
  * you can delete this.
  */


$analytics = new Analytics();
$analytics->initializeAnalytics();


if(isset($_GET['test'])) {
    echo('test successful<br>Test-GET: yes<br>GET-WERT: ' . $_GET['test']);
} else {
    echo('test successful<br>Test-GET: no');
}