<?php
class Telefono {
    private $id_Telefono;
    private $fono;

    public function __construct(){
        //Constructor por defecto
    }

    public function setIdTelefono($id_Telefono){
        $this->id_Telefono = $id_Telefono;
    }

    public function setFono($fono){
        $this->fono = $fono;
    }

    public function getIdTelefono(){
        return $this->id_Telefono;
    }

    public function getFono(){
        return $this->fono;
    }
}
?>