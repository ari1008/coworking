<h1 class="titre">ADMIN</h1>
<div class="container admin">
    <div class="row">
        <div class="col-md-6">
            <h1><strong>Connexion</strong></h1><br>
            <form>
                <?php
                require ROOT . '/config/config.php';

                if(!empty($_GET['connect']))
                {
                    $id=$_GET['connect'];
                }

                $q = 'SELECT connexion.id_connexion, DATE_FORMAT(connexion.date,\'%m/%c/%Y\') AS date, user.prenom, 
                        user.nom FROM connexion INNER JOIN user ON connexion.id_user=user.id_user
                        WHERE id_connexion = ?';
                $req = $bdd->prepare($q);
                $req->execute(array($id));
                $results = $req->fetch(PDO::FETCH_ASSOC);

                ?>


                <div class="form-group">
                    <label>Id: </label> <?php echo ' ' . $results['id_connexion'] ?>
                </div>

                <div class="form-group">
                    <label>Utilisateur: </label> <?php echo ' ' . $results['prenom'] . ' ' . $results['nom'] ?>
                </div>

                <div class="form-group">
                    <label>Date : </label><?php echo ' ' . $results['date'] ?>
                </div>

            </form>
            <div class="form-action">
                <a href="?p=connect" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Retour </a>
            </div>
        </div>

    </div>



</div>

