<?php
namespace Core\Entity;
class Entity{

    public function __get($key){
       $method =  'get' . ucfirst($key);
       $this->$key = $this->$method();
       var_dump($this->$key);
       return $this->$key;
    }


}