<?php
class Profesional {
    private $idProfesional;
    private $nombreProfesional;

    public function __construct(){
        //Constructor por defecto
    }

    public function setIdProfesional($idProfesional){
        $this->idProfesional = $idProfesional;
    }

    public function setNombreProfesional($nombreProfesional){
        $this->nombreProfesional = $nombreProfesional;
    }

    public function getIdProfesional(){
        return $this->idProfesional;
    }

    public function getNombreProfesional(){
        return $this->nombreProfesional;
    }
}
?>