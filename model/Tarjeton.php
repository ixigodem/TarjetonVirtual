<?php
class Tarjeton {
    private $idTarjeton;
    private $fechaAtencionTarjeton;

    public function __construct(){
        //Constructor por defecto
    }

    public function setIdTarjeton($idTarjeton){
        $this->id = $idTarjeton;
    }

    public function setFechaAtencionTarjeton($fechaAtencionTarjeton){
        $this->fechaAtencionTarjeton = $fechaAtencionTarjeton;
    }

    public function getIdTarjeton(){
        return $this->idTarjeton;
    }

    public function getFechaAtencionTarjeton(){
        return $this->fechaAtencionTarjeton;
    }
}
?>