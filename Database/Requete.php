<?php
function Insert($table, $tab){
    $lenght = count($tab);
    $tabkey =array_keys($tab);
    $bdd = new PDO ('mysql:host=localhost:3307;dbname=coworkingpa', 'root', 'root');
    $q = "INSERT INTO " . $table. "(";
    for($x=0;$x<$lenght-1;$x++){
        $q.= $tabkey[$x] . ",";

    }
    $q .=$tabkey[$x] .") VALUES('";
    $virgule = implode("','", $tab);
    $q.= $virgule . "')";
    $send = $bdd->query($q);
    $data= $send->fetch();
    return $data;
}

function Select($table, $tab, $everything=0, $whereTab=null,$operator=null,$one = null){
    $lengthTab= count($tab);
    $pdo = new PDO ('mysql:host=localhost:3307;dbname=coworkingpa', 'root', 'root');
    if(1==$everything){
        $q = 'SELECT * FROM ' . $table;
    }else{
        $q = 'SELECT ';
        for ($x=0;$x<$lengthTab-1;$x++){
            $q .= $tab[$x] . ', ';
        }
        $q.= $tab[$x] . ' FROM ' . $table;
        if (!is_null($whereTab)){
            $lenghtWhere = count($whereTab);
            $keyWhere = array_keys($whereTab);
            $where = ' WHERE ';
            for ($x=0;$x<$lenghtWhere-1;$x++){
                $where .= $keyWhere[$x] . "=:" . $keyWhere[$x] . ' ' . $operator[$x] . ' ';
            }
            $where .= $keyWhere[$x] . "=:" . $keyWhere[$x] . ' ';
            $q .= $where;
            $stmt= $pdo->prepare($q);
            $stmt->execute($whereTab);
            if (!is_null($one)){
                $data = $stmt->fetchAll();
                return $data;
            }else{
                $data = $stmt->fetch();
                return $data;
            }
        }
    }
    $stmt = $pdo->query($q);
    if (!is_null($one)){
        $data = $stmt->fetchAll();
        return $data;
    }else{
        $data = $stmt->fetch();
        return $data;
    }
}

function Delete($table, $one=0,$where=null){
    $bdd = new PDO ('mysql:host=localhost:3307;dbname=coworkingpa', 'root', 'root');
    $q = "DELETE FROM " . $table;
    if(!is_null($where)){
        $q .= " WHERE ";
        $lenght = count($where);
        $key = array_keys($where);
        for ($x=0; $x<$lenght-1;$x++){
            $q .= $key[$x] . "=:" . $key[$x] . ',';
        }
        $q .= $key[$x] . "=:" . $key[$x];
        $stmt= $bdd->prepare($q);
        $stmt->execute($where);
        if (!is_null($one)){
            $data = $stmt->fetchAll();
            return $data;
        }else{
            $data = $stmt->fetch();
            return $data;
        }
    }
}

function Update($table, $set, $where, $operator){
    $bdd = new PDO ('mysql:host=localhost:3307;dbname=coworkingpa', 'root', 'root');
    $key = array_keys($set);
    $lenghtTab = count($set);
    $countO = count($operator);
    if (!is_null($where)){
        $q ='Update ' . $table . ' SET ';
        for ($x=0;$x<=$where-2;$x++){
            $q .= $key[$x]. '=:' . $key[$x] . ', ';
        }
        $q .= $key[$x]. '=:' . $key[$x] . ' ';
        $lenght = $lenghtTab - $where;
        $q .= ' Where ';
        for ($x=$lenght;$x<$lenghtTab-1;$x++){
            $verif = explode('2',$key[$x] );
            $q .= $verif[0] . '=:' . $key[$x] . '  ';
            for ($y=0;$y<$countO;$y++){
                $q .= $operator[$y] . ' ';
            }
        }
        $verif = explode('2',$key[$x] );
        $q .= $verif[0] . '=:' . $key[$x];
    }
    $stmt =$bdd->prepare($q);
    $data =$stmt->execute($set);
    return $data;
}