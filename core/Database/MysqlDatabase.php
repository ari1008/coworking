<?php
namespace Core\Database;
use \PDO;
class MysqlDatabase extends Database{
    const PORT =3307;
    private $db_name;
    private $db_user;
    private $db_pass;
    private $pdo;

    public function __construct($db_name,$db_user='root',$db_pass='root'){
        $this->db_name=$db_name;
        $this->db_user=$db_user;
        $this->db_pass=$db_pass;
    }

    private function getPDO(){
        if($this->pdo === null){
            $pdo = new PDO('mysql:host=localhost:'. self::PORT.';dbname='. $this->db_name, ''. $this->db_user .'', '' . $this->db_pass .'');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }

    public function query($statement, $class_name=null, $one = false){
        $req = $this->getPDO()->query($statement);
        if(
            strpos($statement, 'UPDATE') === 0 ||
            strpos($statement, 'INSERT') === 0 ||
            strpos($statement, 'DELETE') === 0
        ){
            return $req;
        }
        if ($class_name === null){
            $req->setFetchMode(PDO::FETCH_OBJ);
        }else{
            $req->setFetchMode(PDO::FETCH_CLASS,$class_name);
        }
        if($one){
            $data =$req->fetch();
        }else{
            $data =$req->fetchAll();
        }
        return $data;
    }

    public function prepare($statement, $attributes, $class_name=null, $one =false){
        $req = $this->getPDO()->prepare($statement);
        $res = $req->execute($attributes);
        var_dump($res);
        if(
            strpos($statement, 'UPDATE') === 0 ||
            strpos($statement, 'INSERT') === 0 ||
            strpos($statement, 'DELETE') === 0
        ){
            return $res;
        }
        var_dump($req);
        if ($class_name === null){
            $req->setFetchMode(PDO::FETCH_OBJ);
        }else {
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        if($one){
            $data =$req->fetch();
        }else{
            $data =$req->fetchAll();
        }
        return $data;
    }

    public function lastInsertId(){
        return $this->getPDO()->lastInsertId();
    }
}