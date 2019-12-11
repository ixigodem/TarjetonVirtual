<?php
class TratamientoCardiaco {
    private $idTTOCardiaco;
    private $estatinas;
    private $AAS_100;

    public function __construct(){
        //Constructor por defecto
    }

    public function setIdTTOCardiaco($idTTOCardiaco){
        $this->idTTOCardiaco = $idTTOCardiaco;
    }

    public function setEstatinas($estatinas){
        $this->estatinas = $estatinas;
    }

    public function setAAS_100($AAS_100){
        $this->AAS_100 = $AAS_100;
    }

    public function getIdTTOCardiaco(){
        return $this->idTTOCardiaco;
    }

    public function getEstatinas(){
        return $this->estatinas;
    }

    public function getAAS_100(){
        return $this->AAS_100;
    }
}