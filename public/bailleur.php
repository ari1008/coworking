<?php
session_start();
var_dump($_SESSION);
define('ROOT', dirname(__DIR__));
require "../Database/Requete.php";


if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 'home';
}
ob_start();
if ($page === 'home') {
    require "../pages/bailleur/acceuilbailleur.php";
}
$content = ob_get_clean();