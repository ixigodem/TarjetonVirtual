<?php
class Observacion {
    private $idObservacion;
    private $nombreObservacion;

    public function __construct(){
        //Constructor por defecto
    }

    public function setIdObservacion($idObservacion){
        $this->idObservacion = $idObservacion;
    }

    public function setObservacion($nombreObservacion){
        $this->nombreObservacion = $nombreObservacion;
    }

    public function getIdObservacion(){
        return $this->idObservacion;
    }

    public function getObservacion(){
        return $this->nombreObservacion;
    }
}
?>