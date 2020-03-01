<?php
namespace Core\HTML;
/**
 * Class Personnage
 * Permet de generer un formulaire
 */
class form{
    /**
     * @var array Donné utiliser par le formulaire
     */
    private $data = array();
    /**
     * @var string pour entourer les champs tag
     */
    public $surround = 'p';

    /**
     * form constructor.
     * @param array $data
     */

    public function __construct($data=array())
    {
        $this->data = $data;

    }

    public function getValue($index){
        if (is_object($this->data)){
            return $this->data->$index;
        }
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }

    protected function surround($html){
        return "<{$this->surround}>$html</{$this->surround}>";
    }

    public function input($name, $label, $options=[]){
        $type = isset($options['type']) ? $options['type'] : 'text';
         return $this->surround('<input type="' . $type .'" name="'. $name .'"value="' . $this->getValue($name) . '">');

    }

    public function submit(){
       return  $this->surround('<button type="submit">Envoyer</button>');
    }

}