<?php
$table = App::getInstance()->getTable('User');
if(!empty($_POST)){
    $test = [
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'password' => $_POST['password'],];
    $resultat = App::test($test);
}
$send = 0;
$string = '<div class="alert alert-success">Vous êtes inscrit</div>';
$result = empty($resultat) ? '' : $result = $resultat;
$string === $result ? $test['password']=sha1($test['password'])  :  $send='echec';
$send === 0 ? $test['nom']=ucfirst($test['nom']) : $send='echec';
$send === 0 ? $test['prenom']=ucfirst($test['prenom']) : $send='echec';
$send === 0 ? $send = $table->create($test) : $send='echec';
$form = new Core\HTML\BoostrapForm($_POST);
?>
<h1>Sign in</h1>
<?= $result ?>
<form method="post" class="form-group">
    <?= $form->input('username', 'Pseudo');?>
    <?= $form->input('email', 'Email');?>
    <?= $form->input('nom', 'Nom');?>
    <?= $form->input('prenom', 'Prenom');?>
    <?= $form->input('password', 'Mot de passe', ['type' => 'password']);?>
    <button class="btn btn-primary">Envoyer</button>
</form>