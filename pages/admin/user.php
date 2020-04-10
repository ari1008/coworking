<h1 class="titre">ADMIN</h1>
<div class="container admin">
    <div class="row">
        <h1><strong>Liste des utilisateurs </strong></h1>
    </div>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Catégorie</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Connexion</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>

        <?php
        require ROOT.'/Config/config.php';
        $q = 'SELECT user.id_user,user.categorie_user, user.prenom, user.nom, user.email, connexion.date FROM user INNER JOIN connexion ON user.id_user = connexion.id_user';
        $req = $bdd->query($q);
        $results = $req->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <?php
        foreach ($results as $key => $value) { ?>
            <tr>
                <td> <?php echo $value['id_user'] ?> </td>
                <td> <?php echo $value['categorie_user'] ?> </td>
                <td> <?php echo $value['prenom'] ?> </td>
                <td> <?php echo $value['nom'] ?> </td>
                <td> <?php echo $value['email'] ?> </td>
                <td> <?php echo $value['date'] ?> </td>


                <td width="200">
                    <?php	echo '<a href="?p=viewUser&user=' . $value['id_user'] . ' " class="btn btn-defauft"><span class="glyphicon glyphicon-eye-open"></span> Voir</a>'
                    ?>

                    <?php	echo '<a href="?p=deleteUSER&user=' . $value['id_user'] . ' " class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>'
                    ?>
                </td>
            </tr>
        <?php } ?>


        </tbody>
    </table>
</div>

