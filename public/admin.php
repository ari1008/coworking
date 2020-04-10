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
}elseif ($page === 'user') {
require "../pages/admin/user.php";
}elseif ($page === 'deleteUSER') {
    require ROOT . '/pages/admin/deleteUSER.php';
}elseif ($page === 'viewUser') {
    require ROOT . '/pages/admin/viewUser.php';
}elseif ($page === 'local') {
    require ROOT . '/pages/admin/local.php';
}elseif ($page === 'viewLocal') {
    require ROOT . '/pages/admin/viewLocal.php';
}elseif ($page === 'deleteLocal') {
    require ROOT . '/pages/admin/deleteLocal.php';
}elseif ($page === 'reservation') {
    require ROOT . '/pages/admin/reservation.php';
}elseif ($page === 'deleteReservation') {
    require ROOT . '/pages/admin/deleteReservation.php';
}elseif ($page === 'viewReservation') {
    require ROOT . '/pages/admin/viewReservation.php';
}elseif ($page === 'avis') {
    require ROOT . '/pages/admin/avis.php';
}elseif ($page === 'viewAvis') {
    require ROOT . '/pages/admin/viewAvis.php';
}elseif ($page === 'deleteAvis') {
    require ROOT . '/pages/admin/deleteAvis.php';
}elseif ($page === 'connect') {
    require ROOT . '/pages/admin/connect.php';
}elseif ($page === 'viewConnect') {
    require ROOT . '/pages/admin/viewConnect.php';
}elseif ($page === 'deco') {
    require ROOT . '/pages/posts/deco.php';
}
$content = ob_get_clean();
require ROOT . '/pages/templates/admin/templateadmin.php';