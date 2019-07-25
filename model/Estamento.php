<?php
class Estamento {
    private $id_Estamento;
    private $nombreEstamento;

    public function __construct(){
        //Constructor por defecto
    }

    public function setIdEstamento($id_Estamento){
        $this->id_Estamento = $id_Estamento;
    }

    public function setNombreEstamento($nombreEstamento){
        $this->nombreEstamento = $nombreEstamento;
    }

    public function getIdEstamento(){
        return $this->id_Estamento;
    }

    public function getNombreEstamento(){
        return $this->nombreEstamento;
    }
}
?>