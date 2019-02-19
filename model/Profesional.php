<?php
class Profesional {
    private $id_Profesional;
    private $nombre;
    private $estamento_ID;

    public function __construct(){
        //Constructor por defecto
    }

    public function setIdProfesional($id_Profesional){
        $this->id_Profesional = $id_Profesional;
    }

    public function setNombreProfesional($nombre){
        $this->nombre = $nombre;
    }

    public function setEstamento($estamento_ID){
        $this->estamento_ID = $estamento_ID;
    }

    public function getIdProfesional(){
        return $this->id_Profesional;
    }

    public function getNombreProfesional(){
        return $this->nombre;
    }

    public function getEstamento(){
        return $this->estamento_ID;
    }
}
?>