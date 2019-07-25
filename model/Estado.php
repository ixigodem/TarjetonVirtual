<?php
class Estado {
    private $idEstado;
    private $nombreEstado;

    public function __construct(){
        //Constructor por defecto
    }

    public function setIdEstado($idEstado){
        $this->idEstado = $idEstado;
    }

    public function setNombreEstado($nombreEstado){
        $this->nombreEstado = $nombreEstado;
    }

    public function getIdEstado(){
        return $this->idEstado;
    }

    public function getNombreEstado(){
        return $this->nombreEstado;
    }
}
?>