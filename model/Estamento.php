<?php
class Estamento {
    private $idEstamento;
    private $nombreEstamento;

    public function __construct(){
        //Constructor por defecto
    }

    public function setIdEstamento($idEstamento){
        $this->idEstamento = $idEstamento;
    }

    public function setNombreEstamento($nombreEstamento){
        $this->nombreEstamento = $nombreEstamento;
    }

    public function getIdEstamento(){
        return $this->idEstamento;
    }

    public function getNombreEstamento(){
        return $this->nombreEstamento;
    }
}
?>