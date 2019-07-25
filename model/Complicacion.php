<?php
class Complicacion {
    private $idComplicacion;
    private $nombreComplicacion;

    public function __construct(){
        //Constructor por defecto
    }

    public function setIdComplicacion($idComplicacion){
        $this->id = $idComplicacion;
    }

    public function setNombreComplicacion($nombreComplicacion){
        $this->nombreComplicacion = $nombreComplicacion;
    }

    public function getIdComplicacion(){
        return $this->id;
    }

    public function getNombreComplicacion(){
        return $this->nombreComplicacion;
    }
}
?>