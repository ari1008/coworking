<?php
namespace Core\Validate;
use App;
use APP\Table\UserTable;

class ValidateSign{
    public static $jetables = array('yopmail.com', 'jetable.org');


    public static function validemail($email){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $domain = explode('@', $email);
            $jetable = self::$jetables;
            if (in_array($domain[1],$jetable)) {
                return "L'adresse email " . $email . " est considérée comme jetable.";
            }else{
                return 1;
            }

        } else {
            return "L'adresse email " . $email . " est considérée comme invalide.";
        }
    }


    public static function Name($name){
        $long = strlen($name);
        if($long<=2 OR $long>=30) {
            return "Le nom " . $name . " considérer comme invalide";
        }
        return 1;
    }

    public static function password($password){
        $long = strlen($password);
        $majuscule = preg_match("#[A-Z ]#",$password);
        $caractere = preg_match("#[!./&')$]#",$password);
        if($long<8){
            return "Votre mot de passe doit faire  au moins 8 caractère";
        }else if($majuscule == 0){
            return "il n'y a pas de majuscule dans votre mot de passe";
        }else if($caractere == 0){
            return "Il n'y a pas de caractère spéciaux telle que !./&')$  dans votre mot de passe";
        }
        return 1;
    }

    public static  function pseudo($pseudo){
        $findpseudo = App::getInstance()->getTable('User')->duplicat($pseudo);
        var_dump($findpseudo);
        return $findpseudo;
    }

}
