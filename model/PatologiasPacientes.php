<?php
class PatologiasPacientes {
    private $id_PatPacientes;
    private $fechaPatologias;
    private $Patologia_ID;
    private $id_Paciente;

    public function __construct(){
        //Constructor por defecto
    }

    public function setIdPatPacientes($id_PatPacientes){
        $this->id_PatPacientes = $id_PatPacientes;
    }

    public function setFechaPatologias($fechaPatologias){
        $this->fechaPatologias = $fechaPatologias;
    }

    public function setPatologiaID($Patologia_ID){
        $this->Patologia_ID = $Patologia_ID;
    }

    public function setIdPaciente($id_Paciente){
        $this->id_Paciente = $id_Paciente;
    }

    public function getIdPatPacientes(){
        return $this->id_PatPacientes;
    }

    public function getFechaPatologias(){
        return $this->fechaPatologias;
    }

    public function getPatologiaID(){
        return $this->Patologia_ID;
    }

    public function getIdPaciente(){
        return $this->id_Paciente;
    }
}
?>