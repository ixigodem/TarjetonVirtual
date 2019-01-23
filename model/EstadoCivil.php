<?php
class EstadoCivil {
    private $idEstadoCivil;
    private $nombreEstadoCivil;

    public function __construct(){
        //Constructor por defecto
    }

    public function setIdEstadoCivil($idEstadoCivil){
        $this->idEstadoCivil = $idEstadoCivil;
    }

    public function setNombreEstadoCivil($nombreEstadoCivil){
        $this->nombreEstadoCivil = $nombreEstadoCivil;
    }

    public function getIdEstadoCivil(){
        return $this->idEstadoCivil;
    }

    public function getNombreEstadoCivil(){
        return $this->nombreEstadoCivil;
    }
}
?>