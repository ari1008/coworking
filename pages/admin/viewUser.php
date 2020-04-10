<h1 class="titre">ADMIN</h1>
<div class="container admin">
    <div class="row">
        <div class="col-md-6">
            <h1><strong>UTILISATEURS</strong></h1><br>
            <form>
                <?php
                require ROOT . '/config/config.php';

                if(!empty($_GET['user']))
                {
                    $id=$_GET['user'];
                }

                $q = 'SELECT user.id_user,categorie_user.type, user.prenom, user.nom, user.email, connexion.date
                        FROM user 
                        INNER JOIN connexion ON user.id_user = connexion.id_user INNER JOIN categorie_user 
                        ON user.categorie_user = categorie_user.id_categorie_user 
                        WHERE user.id_user = ?';
                $req = $bdd->prepare($q);
                $req->execute(array($id));
                $results = $req->fetch(PDO::FETCH_ASSOC);
                ?>


                <div class="form-group">
                    <label>Id_user: </label> <?php echo ' ' . $results['id_user'] ?>
                </div>

                <div class="form-group">
                    <label>Catégorie: </label> <?php echo ' ' . $results['type'] ?>
                </div>

                <div class="form-group">
                    <label>Prenom : </label><?php echo ' ' . $results['prenom'] ?>
                </div>
                <div class="form-group">
                    <label>Nom :</label><?php echo ' ' . $results['nom'] ?>
                </div>

                <div class="form-group">
                    <label>Email :</label><?php echo ' ' . $results['email'] ?>
                </div>

                <div class="form-group">
                    <label>Connexion: </label> <?php echo ' ' . $results['date'] ?>
                </div>

            </form>
            <div class="form-action">
                <a href="user.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Retour </a>
                <?php echo '<a href="?p=deleteUSER&user=' . $id . ' " class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>'
                ?>
            </div>
        </div>

    </div>



</div>
