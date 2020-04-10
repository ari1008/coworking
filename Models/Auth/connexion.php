<?php
function Open($value){
    $tab = ['id_user', 'categorie_user', 'password'];
    $Wheretab = ['username'=>$value['username']];
    $operator = [','];
    $EmailS = Select('user',$tab, 0, $Wheretab, $operator);
    if (password_verify( $value['password'],$EmailS['password'])){
        $date = dateInsert($EmailS['id_user']);
        if($EmailS['categorie_user']== 1){
            $_SESSION['id'] = $EmailS['id_user'];
            header('location: bailleur.php');
            exit();
        }elseif($EmailS['categorie_user']== 2){
            $_SESSION['id'] = $EmailS['id_user'];
            header('location: locataire.php');
            exit();
        }else{
            $_SESSION['id'] = $EmailS['id_user'];
            var_dump($EmailS);
            header('location: admin.php');
            exit();
        }

    }else{
        return '<div class="alert alert-danger"> Identifiant incorrect</div>';
    }
}

function Verif($values){
    //Vérification des entrées du tableau si elle sont vide
    foreach ($values as $key => $value){
        if (empty($value)){
            return $key . ' est vide' ;
        }else{
            trim($value);
            if ($key == 'prenom' OR $key == 'nom'){
               $values[$key]= ucfirst($value);
            }
        }
    }
    // Vérification de l'email si c'est une vraie après une jetable
    $email = array('yopmail.com', 'mailezee.com');
    $emailtest = explode('@', $values['email']);
    if (filter_var($values['email'], FILTER_VALIDATE_EMAIL)){
        if (in_array($emailtest[1], $email)) {
            return 'Cette adresse email est jetable';
        }else{
            $tab = ['username', 'email'];
            $Wheretab = ['username'=>$values['username'],
                'email'=>$values['email']];
            $operator = ['OR'];
            $EmailS = Select('user',$tab, 0, $Wheretab, $operator);
            if (is_array($EmailS) AND ($EmailS[1] OR $EmailS[2])){
                return 'La donné est déjà utilisé';
            }
        }
    }else{
        return 'Ce n\'est pas une adresse email valide';
    }
    // Vérification pour le mot de pass après hash
    $lenght = strlen($values['password']);
    if ($lenght<8){
        return 'La longueur du mot de passe est trop petit';
    }elseif (preg_match("[A-Z]",$values['password'])){
        return 'Il n\'y a pas de majuscule dans le mot de passe';
    }elseif (preg_match("[a-z]",$values['password'])){
        return 'Il n\'y a pas de minuscule dans votre mot de passe';
    }elseif (preg_match("[0-9]",$values['password'])){
        return 'Il n\'y a pas de chiffre dans votre mot de passe';
    }else{
        $values['password']= password_hash($values['password'], PASSWORD_DEFAULT);
    }

    $send = Insert('user', $values);
    header('location: index.php?p=login');
    exit();
}

function Session($tabsession){
    $tab = [ 'categorie_user'];
    $Wheretab = ['id_user'=>$tabsession['id']];
    $EmailS = Select('user',$tab, 0, $Wheretab);

     return  $EmailS['categorie_user'];
}

 function dateInsert($tabsession){
     $day = date('d/m/y');
     $values =['date'=>$day,
         'id_user'=>$tabsession];
     $date = Insert('connexion', $values);
     return $date;
 }
function WHO($tabsession){
    $tab = [ 'prenom, nom'];
    $Wheretab = ['id_user'=>$tabsession];
    $user = Select('user',$tab, 0, $Wheretab);
    return $user;
}