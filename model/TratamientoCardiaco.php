<?php
class TratamientoCardiaco {
    private $idTTOCardiaco;
    private $estatinas;
    private $AAS_100;

    public function __construct(){
        //Constructor por defecto
    }

    public function setIdTTOCardiaco($idTTOCardiaco){
        $this->id = $idTTOCardiaco;
    }

    public function setEstaninas($estatinas){
        $this->estatinas = $estatinas;
    }

    public function setAAS100($AAS_100){
        $this->AAS_100 = $AAS_100;
    }

    public function getIdTTOCardiaco(){
        return $this->id;
    }

    public function getEstatinas(){
        return $this->estatinas;
    }

    public function getAAS_100(){
        return $this->AAS_100;
    }
}