<h1 class="titre">ADMIN</h1>
<div class="container admin">
    <div class="row">
        <h1><strong>Liste des locaux</strong></h1>
    </div>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Adresse</th>
            <th>Capacité</th>
            <th>Catégorie</th>
            <th>Prix</th>
            <th>Propriétaire</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>

        <?php
        require ROOT .'/config/config.php';
        $q = 'SELECT local.id_local, local.adresse, local.capacite, local.prix, user.prenom, user.nom, categorie_local.type 
            FROM local INNER JOIN user ON local.user=user.id_user
            INNER JOIN localcategorie ON localcategorie.local=local.id_local INNER JOIN categorie_local
             ON categorie_local.id_categorie_local=localcategorie.categorie_local';
        $req = $bdd->query($q);
        $results = $req->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <?php foreach ($results as $key => $value) { ?>
            <tr>
                <td> <?php echo $value['id_local'] ?> </td>
                <td> <?php echo $value['adresse'] ?> </td>
                <td> <?php echo ($value['capacite'] . ' m²') ?> </td>
                <td> <?php echo $value['type'] ?> </td>
                <td> <?php echo ($value['prix'] . ' €') ?> </td>
                <td> <?php echo $value['nom']. ', ' . $value['prenom'] ?> </td>

                <td width=200>
                    <?php	echo '<a href="?p=viewLocal&local=' . $value['id_local'] . ' " class="btn btn-defauft"><span class="glyphicon glyphicon-eye-open"></span> Voir</a>'?>
                    <?php echo '<a href="?p=deleteLocal&local=' . $value['id_local'] . ' " class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>' ?>
                </td>
            </tr>
        <?php } ?>


        </tbody>
    </table>
</div>

