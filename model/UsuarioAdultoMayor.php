<?php
class UsuarioAdultoMayor {
    private $idUsuAdultoMayor;
    private $autovalente;
    private $autovalenteConRiesgo;
    private $riesgoDependencia;
    private $dependencia;

    public function __construct(){
        //Constructor por defecto
    }

    public function setIdUsuAdultoMayor($idUsuAdultoMayor){
        $this->idUsuAdultoMayor = $idUsuAdultoMayor;
    }

    public function setAutovalente($autovalente){
        $this->autovalente = $autovalente;
    }

    public function setAutovalenteConRiesgo($autovalenteConRiesgo){
        $this->autovalenteConRiesgo = $autovalenteConRiesgo;
    }

    public function setRiesgoDependencia($riesgoDependencia){
        $this->riesgoDependencia = $riesgoDependencia;
    }

    public function setDependencia($dependencia){
        $this->dependencia = $dependencia;
    }

    public function getIdUsuAdultoMayor(){
        return $this->idUsuAdultoMayor;
    }

    public function getAutovalente(){
        return $this->autovalente;
    }

    public function getAutovalenteConRiesgo(){
        return $this->autovalenteConRiesgo;
    }

    public function getRiesgoDependencia(){
        return $this->riesgoDependencia;
    }

    public function getDependencia(){
        return $this->dependencia;
    }
}