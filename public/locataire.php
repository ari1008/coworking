<?php
session_start();
define('ROOT', dirname(__DIR__));
require "../Database/Requete.php";
require_once ROOT .  '/Models/Auth/connexion.php';
if (!empty($_SESSION['id'])) {
    $test = Session($_SESSION);
    if ($test != 2) {
        var_dump($_SESSION);
        echo "1";
    }
}else{
    echo "1";
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
    require "../pages/locataire/acceuillocataire.php";
}
$content = ob_get_clean();
require ROOT . '/pages/templates/locataire/templateslocataire.php';