<?php
class PatologiasPacientes {
    private $idPatPacientes;
    private $fechaPatPacientes;

    public function __construct(){
        //Constructor por defecto
    }

    public function setIdPatPacientes($idPatPacientes){
        $this->id = $idPatPacientes;
    }

    public function setFechaPatPacientes($fechaPatPacientes){
        $this->fechaPatPacientes = $fechaPatPacientes;
    }

    public function getIdPatPacientes(){
        return $this->idPatPacientes;
    }

    public function getFechaPatPacientes(){
        return $this->fechaPatPacientes;
    }
}
?>