<main>
    <h1 class="titre">ADMIN</h1>
    <div class="container admin">
        <div class="row">
            <div class="col-sm-6">
                <h1><strong>Vue local</strong></h1><br>
                <form>
                    <?php
                    require ROOT . '/config/config.php';
                    $img = '<img  src="../../../coworking/public/image/locaux/ima5.jpg">';

                    if(!empty($_GET['reserve']))
                    {
                        $id = $_GET['reserve'];
                    }

                    $q = 'SELECT reservation.id_reservation, DATE_FORMAT(reservation.date_debut, \'%m/%c/%Y\') AS date_debut, 
            DATE_FORMAT(reservation.date_fin, \'%m/%c/%Y\') AS date_fin, reservation.heure_debut, reservation.heure_fin,
             reservation.acompte, reservation.solde, user.prenom, user.nom FROM reservation 
             INNER JOIN user ON reservation.user=user.id_user';
                    $req = $bdd->prepare($q);
                    $req->execute(array($id));
                    $results = $req->fetch(PDO::FETCH_ASSOC);
                    ?>


                    <div class="form-group">
                        <label>Id : </label> <?php echo ' ' . $results['id_reservation'] ?>
                    </div>
                    <div class="form-group">
                        <label>Date début : </label><?php echo ' ' . $results['date_debut'] ?>
                    </div>
                    <div class="form-group">
                        <label>Heure début : </label><?php echo ' ' . $results['heure_debut'] ?>
                    </div>
                    <div class="form-group">
                        <label>Date fin : </label><?php echo ' ' . $results['date_fin'] ?>
                    </div>
                    <div class="form-group">
                        <label>Heure fin : </label><?php echo ' ' . $results['heure_fin'] ?>
                    </div>
                    <div class="form-group">
                        <label>acompte :</label><?php echo ' ' . $results['acompte'] . ' €'?>
                    </div>
                    <div class="form-group">
                        <label>Solde :</label><?php echo ' ' . $results['solde'] . ' €'?>
                    </div>
                    <div class="form-group">
                        <label>Client :</label><?php echo ' ' . $results['prenom'] . ' ' . $results['nom'] ?>
                    </div>

                </form>
                <div class="form-action">
                    <a href="?p=reservation" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Retour </a>
                    <?php echo '<a href="?p=deleteReservation&reserve=' . $id . ' " class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>'
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

</main>