<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="'<?= ROOT . '/public/css/admin/admin.css';?>'">
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container">

        <div class="navbar-header">
            <a  class="navbar-brand" href="#">Accueil</a>
        </div>

        <div>
            <ul class="nav navbar-nav">
                <li><a href="?p=user">Utilisateur</a></li>
                <li><a href="?p=local">Locaux</a></li>
                <li><a href="?p=reservation">Réservation</a></li>
                <li><a href="?p=avis">Avis</a></li>
                <li><a href="?p=connect">les connexions</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="?p=deco"><span class="glyphicon glyphicon-log-out"></span> Deconnexion</a></li>
            </ul>
        </div>

    </div>
</nav>



<div>
    <?= $content;?>
</div>
