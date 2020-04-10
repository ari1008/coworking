<h1 class="titre">ADMIN</h1>
<div class="container admin">
    <div class="row">
        <div class="col-sm-6">
            <h1><strong>Vue local</strong></h1><br>
            <form>
                <?php
                require ROOT .'/config/config.php';

                $img = '<img  src="../../../coworking/public/image/locaux/ima5.jpg">';

                if(!empty($_GET['local']))
                {
                    $id = $_GET['local'];
                }

                $q = 'SELECT * FROM local WHERE id_local = ?';
                $req = $bdd->prepare($q);
                $req->execute(array($id));
                $results = $req->fetch(PDO::FETCH_ASSOC);

                ?>


                <div class="form-group">
                    <label>Id : </label> <?php echo ' ' . $results['id_local'] ?>
                </div>
                <div class="form-group">
                    <label>Adresse : </label><?php echo ' ' . $results['adresse'] ?>
                </div>
                <div class="form-group">
                    <label>Capacité :</label><?php echo ' ' . $results['capacite'] ?>
                </div>

                <div class="form-group">
                    <label>Prix :</label><?php echo ' ' . $results['prix'] . ' €'?>
                </div>

            </form>
            <div class="form-action">
                <a href="?p=local" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Retour </a>
                <?php echo '<a href="?p=deleteLocal&local=' . $id . ' " class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>'
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
