<?php
class ComplicacionPacientes{
    private $idComplicacionPac;
    private $fechaComplicacionPac;
    
    public function __construct(){
        //Constructor por defecto
    }

    public function setIdComplicacionPac($idComplicacionPac){
        $this->idComplicacionPac = $idComplicacionPac;
    }

    public function setFechaComplicacionPac($fechaComplicacionPac){
        $this->fechaComplicacionPac = $fechaComplicacionPac;
    }

    public function getIdComplicacionPac(){
        return $this->idComplicacionPac;
    }

    public function getFechaComplicacionPac(){
        return $this->fechaComplicacionPac;
    }
}
?>