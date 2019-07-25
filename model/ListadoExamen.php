<?php
class ListadoExamen {
    private $idListadoExamen;
    private $nombreListadoExamen;

    public function __construct(){
        //Constructor por defecto
    }

    public function setIdListadoExamen($idListadoExamen){
        $this->idListadoExamen = $idListadoExamen;
    }

    public function setNombreListadoExamen($nombreListadoExamen){
        $this->nombreListadoExamen = $nombreListadoExamen;
    }

    public function getIdListadoExamen(){
        return $this->idListadoExamen;
    }

    public function getNombreListadoExamen(){
        return $this->nombreListadoExamen;
    }
}
?>