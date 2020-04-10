<h1 class="titre">ADMIN</h1>
<div class="container admin">
    <div class="row">
        <h1><strong>Tous les avis</strong></h1>
    </div>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Notation</th>
            <th>Data</th>
            <th>texte</th>
            <th>local</th>
            <th>user</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>

        <?php
        require  ROOT . '/config/config.php';
        $q = 'SELECT avis.id_avis, avis.notation, DATE_FORMAT(avis.date, \'%m/%c/%Y\') AS date, avis.texte, 
                user.prenom, user.nom, local.adresse FROM avis INNER JOIN user ON avis.user=user.id_user 
                INNER JOIN local ON avis.local=local.id_local';
        $req = $bdd->query($q);
        $results = $req->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <?php foreach ($results as $key => $value) { ?>
            <tr>
                <td> <?php echo $value['id_avis'] ?> </td>
                <td> <?php echo $value['notation'] ?> </td>
                <td> <?php echo ($value['date']) ?> </td>
                <td> <?php echo $value['texte'] ?> </td>
                <td> <?php echo ($value['adresse']) ?> </td>
                <td> <?php echo $value['nom'].', '.$value['prenom'] ?> </td>

                <td width=200>
                    <?php	echo '<a href="?p=viewAvis&avis=' . $value['id_avis'] . ' "
                    class="btn btn-defauft"><span class="glyphicon glyphicon-eye-open"></span> Voir</a>'?>
                    <?php echo '<a href="?p=deleteAvis&avis=' . $value['id_avis'] . ' "
                    class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>' ?>
                </td>
            </tr>
        <?php } ?>


        </tbody>
    </table>
</div>