<?php
class FactorDeRiesgo{
    private $idFactorDeRiesgo;
    private $insuficienciaRenal;
    private $iam;
    private $acv;
    
    public function __construct(){
        //Constructor por defecto
    }

    public function setIdFactorDeRiesgo($idFactorDeRiesgo){
        $this->idFactorDeRiesgo = $idFactorDeRiesgo;
    }
    public function setInsuficienciaRenal($insuficienciaRenal){
        $this->insuficienciaRenal = $insuficienciaRenal;
    }

    public function setIam($iam){
        $this->iam = $iam;
    }

    public function setAcv($acv){
        $this->acv = $acv;
    }

    public function getIdFactorDeRiesgo(){
        return $this->idFactorDeRiesgo;
    }

    public function getInsuficienciaRenal(){
        return $this->insuficienciaRenal;
    }

    public function getIam(){
        return $this->iam;
    }

    public function getAcv(){
        return $this->acv;
    }
}
?>