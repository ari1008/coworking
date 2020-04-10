<h1 class="titre">ADMIN</h1>
<div class="container admin">
    <div class="row">
        <div class="col-sm-6">
            <h1><strong>AVIS</strong></h1><br>
            <form>
                <?php
                require ROOT . '/config/config.php';
                $img = '<img  src="../../../coworking/public/image/locaux/ima5.jpg">';

                if(!empty($_GET['avis']))
                {
                    $id = $_GET['avis'];
                }

                $q = 'SELECT avis.id_avis, avis.notation, DATE_FORMAT(avis.date, \'%m/%c/%Y\') AS date, avis.texte, 
                user.prenom, user.nom, local.adresse FROM avis INNER JOIN user ON avis.user=user.id_user 
                INNER JOIN local ON avis.local=local.id_local WHERE id_avis = ?';
                $req = $bdd->prepare($q);
                $req->execute(array($id));
                $results = $req->fetch(PDO::FETCH_ASSOC);
                ?>


                <div class="form-group">
                    <label>Id : </label> <?php echo ' ' . $results['id_avis'] ?>
                </div>
                <div class="form-group">
                    <label>Notation : </label><?php echo ' ' . $results['notation'] ?>
                </div>
                <div class="form-group">
                    <label>Date :</label><?php echo ' ' . $results['date'] ?>
                </div>

                <div class="form-group">
                    <label>avis :</label><?php echo ' ' . $results['texte']?>
                </div>

                <div class="form-group">
                    <label>Adresse :</label><?php echo ' ' . $results['adresse']?>
                </div>

                <div class="form-group">
                    <label>Utilisateur :</label><?php echo ' ' . $results['prenom'] . ', ' . $results['nom'] ?>
                </div>

            </form>
            <div class="form-action">
                <a href="?p=avis" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Retour </a>
                <?php echo '<a href="?p=deleteAvis&avis=' . $id . ' " class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>'
                ?>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="thumbnail">
                <?= $img;?>
            </div>
        </div>
    </div>



</div>

