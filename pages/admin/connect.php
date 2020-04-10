<h1 class="titre">ADMIN</h1>
<div class="container admin">
    <div class="row">
        <h1><strong>Liste des connexions </strong></h1>
    </div>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Id connexion</th>
            <th>Utilisateur</th>
            <th>date</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>

        <?php
        require  ROOT.'/config/config.php';
        $q = 'SELECT connexion.id_connexion, DATE_FORMAT(connexion.date,\'%m/%c/%Y\') AS date, user.prenom, user.nom 
            FROM connexion INNER JOIN user ON connexion.id_user=user.id_user';
        $req = $bdd->query($q);
        $results = $req->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <?php foreach ($results as $key => $value) { ?>

            <tr>
                <td> <?php echo $value['id_connexion'] ?> </td>
                <td> <?php echo $value['prenom'] . ' ' . $value['nom'] ?> </td>
                <td> <?php echo $value['date'] ?> </td>


                <td >
                    <?php	echo '<a href="?p=viewConnect&connect=' . $value['id_connexion'] .
                        ' " class="btn btn-defauft"><span class="glyphicon glyphicon-eye-open"></span> Voir</a>'
                    ?>
                </td>
            </tr>
        <?php } ?>


        </tbody>
    </table>
</div>


