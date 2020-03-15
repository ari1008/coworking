<?php
$test = 'password';
$test2 =password_hash($test, PASSWORD_DEFAULT);
$test3 =password_verify($test, $test2);
var_dump($test2);
var_dump($test3);