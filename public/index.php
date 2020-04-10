<?php
define('ROOT', dirname(__DIR__));
require "../Database/Requete.php";
if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 'home';
}
ob_start();
if ($page === 'home') {
    require "../pages/posts/acceuil.php";
}elseif ($page === 'inscription') {
    require "../pages/posts/inscription.php";
}elseif ($page === 'inscription.admin'){
    require  "../pages/posts/inscriptionA.php";
}elseif ($page === 'login'){
    session_start();
    require  "../pages/posts/connexion.php";
}
$content = ob_get_clean();
require "../pages/templates/post/templates.php";
