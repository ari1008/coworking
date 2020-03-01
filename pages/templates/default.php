<!DOCTYPE html>
<html>
<head>
    <title>projet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="CSS1/annuel.css">
</head>
<body class="connexion+6">
<nav class="navbar navbar-inverse">

    <!--<div class="cont">-->
    <div class="navbar-header" id="block2" class="col-sm-6 col-md-4 col-lg-3">
        <button type="button" class="navbar-toggle" date-toggle="collapse" data-target="#monMenu"></button>
        <a href="#" class="navbar-brand">Heading</a>

    </div>


    <ul class="nav navbar-nav navbar-left">
        <li><button class="btn btn-default btn-sm" type="button" style="margin-top:10px;"><span class="glyphicon glyphicon-search"></span>Search</button></li>
    </ul>

    <div class="abc" style="float: right;">
        <ul class="nav navbar-nav">
            <li class="navbar-brand">connexion</li>
            <li class="navbar-brand">inscription</li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="starter-template" style="padding-top: 10px">
        <?= $content; ?>
    </div>

</div>


<footer style="color:grey; margin-top:10px; background-size:contain;">
    <nav class="navbar navbar-inverse">

        <div class="container1" id="block13">

        </div>
        <ul class="nav navbar-nav">
            <li class="navbar-brand">Actualité</li>
            <li class="navbar-brand">Location</li>
            <li class="navbar-brand">Exclusivités</li>
            <li class="navbar-brand">Agences</li>
        </ul>
</footer>
</nav>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>