<?php
class TipoExamen {
    private $idTipoExamen;
    private $fechaTipoExamen;
    private $valorTipoExamen;

    public function __construct(){
        //Constructor por defecto
    }

    public function setIdTipoExamen($idTipoExamen){
        $this->idTipoExamen = $idTipoExamen;
    }

    public function setFechaTipoExamen($fechaTipoExamen){
        $this->fechaTipoExamen = $fechaTipoExamen;
    }

    public function setValorTipoExamen($valorTipoExamen){
        $this->valorTipoExamen = $valorTipoExamen;
    }

    public function getIdTipoExamen(){
        return $this->idTipoExamen;
    }

    public function getFechaTipoExamen(){
        return $this->fechaTipoExamen;
    }

    public function getValorTipoExamen(){
        return $this->valorTipoExamen;
    }
}
