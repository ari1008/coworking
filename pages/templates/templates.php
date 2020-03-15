<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../public/css/accueil.css">
</head>
<body>

<!-- Header -->
<header id="tropbo">
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
                    <li class="list"><a href="?p=acceuil">Accueil</a></li>
                    <li class="list"><a href="?p=test">Services</a></li>
                    <li class="list"><a href="?p=login">Nos programmes</a></li>
                    <li class="list"><a href="#">Locations</a></li>
                    <li class="list"><a href="#">Avis</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<div>
    <?= $content;?>
</div>
<footer style="background-color: #2d2d2d">
    <div class="container">
        <div class="row">
            <i class="icon fa fa-bars fa-2x"></i>
            <div class="col-md-3 col-xs-12">
                <div class="logo">
                    <h3 style="color:black;">A propos de nous</h3>
                </div>
            </div>

            <nav class="col-md-9 col-xs-12">
                <ul class="nav-list">
                    <li class="list1"><a href="#">Locations Paris</a></li>
                    <li class="list1"><a href="#">Service</a></li>
                    <li class="list1"><a href="#">Nos programmes</a></li>
                    <li class="list1"><a href="#">Locations</a></li>
                    <li class="list1"><a href="#">Avis</a></li>
                </ul>
            </nav>
        </div>
    </div>
</footer>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>