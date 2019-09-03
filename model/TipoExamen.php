<?php
class TipoExamen {
    private $idTipoExamen;
    private $fechaExamen;
    private $valor;
    private $idListaExamen;

    public function __construct(){
        //Constructor por defecto
    }

    public function setIdTipoExamen($idTipoExamen){
        $this->idTipoExamen = $idTipoExamen;
    }

    public function setFechaExamen($fechaExamen){
        $this->fechaExamen = $fechaExamen;
    }

    public function setValorExamen($valor){
        $this->valor = $valor;
    }

    public function setIdListaExamen($idListaExamen){
        $this->idListaExamen = $idListaExamen;
    }

    public function getIdTipoExamen(){
        return $this->idTipoExamen;
    }

    public function getFechaExamen(){
        return $this->fechaExamen;
    }

    public function getValorExamen(){
        return $this->valor;
    }

    public function getIdListaExamen(){
        return $this->idListaExamen;
    }
}
