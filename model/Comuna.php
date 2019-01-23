<?php
class Comuna {
    private $idComuna;
    private $nombreComuna;

    public function __construct(){
        //Constructor por defecto
    }

    public function setIdComuna($idComuna){
        $this->idComuna = $idComuna;
    }

    public function setNombreComuna($nombreComuna){
        $this->nombreComuna = $nombreComuna;
    }

    public function getIdComuna(){
        return $this->idComuna;
    }

    public function getNombreComuna(){
        return $this->nombreComuna;
    }
}
?>