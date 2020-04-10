<h1 class="titre">ADMIN</h1>
<div class="container admin">
    <div class="row">

        <h1><strong>Ajout Local</strong></h1><br>

        <div class="col-md-12">
            <form>
                <div class="form">
                    <label for="id">Id :</label>
                    <input type="text" class="form-control" id="id" name="id" placeholder="id" >
                </div>
                <div class="form-group">
                    <label for="adresse">Adresse :</label>
                    <input type="text" class="form-control" id="adresse" name="adresse" placeholder="adresse" >
                </div>
                <div class="form-group">
                    <label for="adresse">Capacité :</label>
                    <input type="number" class="form-control" id="capacite" name="capacite" placeholder="capacité" >
                </div>
                <div class="form-group">
                    <label for="categorie">Catégorie :</label>
                    <select class="form-control" id="categorie" name="categorie">
                        <ul>
                            <li>coworking</li>
                            <li>coworking</li>
                            <li>coworking</li>
                        </ul>
                    </select>
                </div>
                <div class="form-group">
                    <label>Prix :</label>
                    <input type="number" class="form-control" id="prix" name="prix" placeholder="prix" >
                </div>

                <div class="form-group">
                    <label for="image">selectionner une image:</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
            </form><br>
            <div class="form-action">
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span>Ajouter</button>
                <a href="admin.html" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
            </div>
        </div>

    </div>



</div>
