<?php
require ROOT . '/Models/Auth/connexion.php';
if(!empty($_POST)) {
    $connexion = ['username' => $_POST['username'],
        'password' => $_POST['password']];
    $test = Open($connexion);
}
empty($test)? $message= '' : $message= $test;
?>

<header style="background-color: #2d2d2d">
    <div class="container">
        <div class="row">
            <i class="icon fa fa-bars fa-2x"></i>
            <div class="col-md-3 col-xs-12">
                <div class="logo">
                    <img src="../public/image/change.jpg" style="height:80px;">
                </div>
            </div>

            <nav class="col-md-9 col-xs-12">
                <ul class="nav-list">
                    <li class="list"><a href="?p=home">Accueil</a></li>
                    <li class="list"><a href="#">Services</a></li>
                    <li class="list"><a href="#">Nos programmes</a></li>
                    <li class="list"><a href="#">Locations</a></li>
                    <li class="list"><a href="#">Avis</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<div class="container" style="padding-left:400px; padding-top:200px; padding-bottom: 400px;">
    <div class="col-md-6" style="background-color: #D3D3D3; padding:100px 30px; padding-left:50px; padding-right:50px;border-radius:5px;">
        <div class="row">
            <h1>Connexion</h1>
            <?= $message; ?>
            <form method="post" class="form-group">
                <div class="col-md-12">
                    <p>Pseudo</p>
                    <input type="text" name="username">
                    <p>Password</p>
                    <input type="Password" name="password">
                    <button class="btn button">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
</div>