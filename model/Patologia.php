<?php
class Patologia {
    private $idPatologia;
    private $nombrePatologia;

    public function __construct(){
        //Constructor por defecto
    }

    public function setIdPatologia($idPatologia){
        $this->id = $idPatologia;
    }

    public function setNombrePatologia($nombrePatologia){
        $this->nombrePatologia = $nombrePatologia;
    }

    public function getIdPatologia(){
        return $this->idPatologia;
    }

    public function getNombrePatologia(){
        return $this->nombrePatologia;
    }
}
?>