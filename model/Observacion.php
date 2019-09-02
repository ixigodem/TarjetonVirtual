<?php
class Observacion {
    private $idObservacion;
    private $observacion;

    public function __construct(){
        //Constructor por defecto
    }

    public function setIdObservacion($idObservacion){
        $this->idObservacion = $idObservacion;
    }

    public function setObservacion($observacion){
        $this->observacion = $observacion;
    }

    public function getIdObservacion(){
        return $this->idObservacion;
    }

    public function getObservacion(){
        return $this->observacion;
    }
}
?>