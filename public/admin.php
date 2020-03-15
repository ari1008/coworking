<?php
session_start();
define('ROOT', dirname(__DIR__));
require "../Database/Requete.php";
require_once ROOT .  '/Models/Auth/connexion.php';
if (!empty($_SESSION['id'])) {
    $test = Session($_SESSION);
    if ($test != 3) {
        header("location: out.php");
        exit();
    }
}else{
    header("location: index.php");
    exit();
}

if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 'home';
}
ob_start();
if ($page === 'home') {
    require ROOT . "/pages/admin/acceuilA.php";
}
$content = ob_get_clean();
require  ROOT . '/pages/templates/templates.php';