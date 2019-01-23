<?php
class Telefono {
    private $idTelefono;
    private $fonoTelefono;

    public function __construct(){
        //Constructor por defecto
    }

    public function setIdTelefono($idTelefono){
        $this->idTelefono = $idTelefono;
    }

    public function setFonoTelefono($fonoTelefono){
        $this->fonoTelefono = $fonoTelefono;
    }

    public function getIdTelefono(){
        return $this->idTelefono;
    }

    public function getFonoTelefono(){
        return $this->fonoTelefono;
    }
}
?>