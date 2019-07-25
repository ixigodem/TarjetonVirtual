<?php
class EstadoCivil {
    private $id_EstadoCivil;
    private $nombreEstadoCivil;

    public function __construct(){
        //Constructor por defecto
    }

    public function setIdEstadoCivil($id_EstadoCivil){
        $this->id_EstadoCivil = $id_EstadoCivil;
    }

    public function setNombreEstadoCivil($nombreEstadoCivil){
        $this->nombreEstadoCivil = $nombreEstadoCivil;
    }

    public function getIdEstadoCivil(){
        return $this->id_EstadoCivil;
    }

    public function getNombreEstadoCivil(){
        return $this->nombreEstadoCivil;
    }
}
?>