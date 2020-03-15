<?php
function Open($value){
    $tab = ['id_user', 'categorie', 'password'];
    $Wheretab = ['username'=>$value['username']];
    $operator = [','];
    $EmailS = Select('user',$tab, 0, $Wheretab, $operator);
    if (password_verify( $value['password'],$EmailS['password'])){
        session_start();
        if($EmailS['categorie']== 1){
            $_SESSION['id'] = $EmailS["1"];
            header('location: bailleur.php');
            exit();
        }elseif($EmailS['categorie']== 2){
            $_SESSION['id'] = $EmailS["1"];
            header('location: locataire.php');
            exit();
        }else{
            $_SESSION['id'] = $EmailS["1"];
            header('location: admin.php');
            exit();
        }

    }else{
        return -1;
    }
}

function Verif($values){
    //Vérification des entrées du tableau si elle sont vide
    foreach ($values as $key => $value){
        if (empty($value)){
            return $key;
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
    return $send;
}

function Session(){
    session_start();

}