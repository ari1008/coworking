<?php
$host = 'localhost';
$port = '3307';
$dbname = 'bdd_pa_2020';
$pseudo = 'root';
$mp = 'root';
$bdd = new PDO('mysql:host='.$host.':'.$port.';dbname='.$dbname .'', ''.$pseudo.'', ''.$mp.'', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
?>