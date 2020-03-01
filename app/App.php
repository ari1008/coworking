<?php

use Core\Config;
use Core\Database\MysqlDatabase;
use Core\Validate\ValidateSign;

class App{

    public  $title="Mon Blog";
    private $db_instance;
    private static $_instance;

    public static function load(){
        session_start();
        require ROOT . '/app/Autoloader.php';
        App\Autoloader::register();
        require ROOT . '/core/Autoloader.php';
        Core\Autoloader::register();

    }

    public static function getInstance(){
        if(is_null(self::$_instance)){
            self::$_instance = new App();
        }
        return self::$_instance;
    }
    public function getTable($name){
        $class_name = '\\APP\\Table\\' . ucfirst($name) . 'Table';
        return new $class_name($this->getDb());

    }
    public  function getDb(){
        $config = Config::getInstance(ROOT . '/config/config.php');
        if(is_null($this->db_instance)){
            $this->db_instance = new  MysqlDatabase($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host')) ;
        }
        return $this->db_instance;
    }

    public function forbidden(){
        header('HTTP/1.0 403 Forbidden');
        die('acces Interdit');
    }
    public function notFound(){
        header('HTTP/1.0 404 Not Found');
        die('Page Introuvable');
    }
    public static function test($test){
        foreach ($test as $key=>$value){
            var_dump($key);
            if(empty($value)) {

                return '<div class="alert alert-danger"> Vous n\' avez pas mis ' . $key . '</div>';
            }
            if($key === 'email'){
                $email = ValidateSign::validemail($value) ;
                if($email != 1){
                    return  '<div class="alert alert-danger">' . $email .  '</div>';
                }
            }elseif ($key == 'nom'){
                $username = ValidateSign::Name($value);
                if ($username != 1){
                    return '<div class="alert alert-danger">' . $username .  '</div>';
                }
            }elseif ($key == 'password'){
                $password = ValidateSign::password($value);
                if ($password != 1){
                    return '<div class="alert alert-danger">' . $password .  '</div>';
                }
            }elseif ($key == 'prenom') {
                $prenom = ValidateSign::Name($value);
                if ($prenom != 1) {
                    return '<div class="alert alert-danger">' . $prenom . '</div>';
                }
            }elseif ($key == 'username'){
                $pseudo = ValidateSign::pseudo($value);
                return '<div class="alert alert-danger">' . $pseudo . '</div>';
            }
        }
        return '<div class="alert alert-success">Vous êtes inscrit</div>';
    }


}