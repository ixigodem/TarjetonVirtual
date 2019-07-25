<?php
class Patologia {
    private $id_Patologia;
    private $nombre;

    public function __construct(){
        //Constructor por defecto
    }

    public function setIdPatologia($id_Patologia){
        $this->id_Patologia = $id_Patologia;
    }

    public function setNombrePatologia($nombre){
        $this->nombre = $nombre;
    }

    public function getIdPatologia(){
        return $this->id_Patologia;
    }

    public function getNombrePatologia(){
        return $this->nombre;
    }
}
?>