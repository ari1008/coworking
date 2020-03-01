<?php
namespace Core;


class Config{

    protected $setting= [];
    private static $_instance;

    public static function getInstance($file){
        if(is_null(self::$_instance)){
            return new Config($file);
        }
        return self::$_instance;
    }

    public function  __construct($file){
        $this->setting= require($file);
    }

    public function get($key){
        if(!isset($this->setting[$key])){
            return null;
        }
        return $this->setting[$key];
    }

}