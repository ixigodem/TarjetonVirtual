<?php
class PacienteDiabetico{
    private $id_PacienteDiabetico;
    private $fechaEvalPieDiabetico;
    private $ptjePieDiabetico;
    private $fechaQualidiab;
    private $qualidiab;
    private $fechaFondoOjo;
    private $resultadoFondoOjo;
    private $enalapril;
    private $losartan;
    private $retinopatiaDiabetica;
    private $amputacion;

    public function __construct(){
        // por defecto
    }

    public function setId_PacienteDiabetico($id_PacienteDiabetico){
        $this->id_PacienteDiabetico = $id_PacienteDiabetico;
    }

    public function setFechaEvalPieDiabetico($fechaEvalPieDiabetico){
        $this->fechaEvalPieDiabetico = $fechaEvalPieDiabetico;
    }

    public function setPtjePieDiabetico($ptjePieDiabetico){
        $this->ptjePieDiabetico = $ptjePieDiabetico;
    }

    public function setFechaQualidiab($fechaQualidiab){
        $this->fechaQualidiab = $fechaQualidiab;
    }

    public function setQualidiab($qualidiab){
        $this->qualidiab = $qualidiab;
    }

    public function setFechaFondoOjo($fechaFondoOjo){
        $this->fechaFondoOjo = $fechaFondoOjo;
    }

    public function setResultadoFondoOjo($resultadoFondoOjo){
        $this->resultadoFondoOjo = $resultadoFondoOjo;
    }

    public function setEnalapril($enalapril){
        $this->enalapril = $enalapril;
    }

    public function setLosartan($losartan){
        $this->losartan = $losartan;
    }

    public function setRetinopatiaDiabetica($retinopatiaDiabetica){
        $this->retinopatiaDiabetica = $retinopatiaDiabetica;
    }

    public function setAmputacion($amputacion){
        $this->amputacion = $amputacion;
    }

    public function getId_PacienteDiabetico(){
        return $this->id_PacienteDiabetico;
    }

    public function getFechaEvalPieDiabetico(){
        return $this->fechaEvalPieDiabetico;
    }

    public function getPtjePieDiabetico(){
        return $this->ptjePieDiabetico;
    }

    public function getFechaQualidiab(){
        return $this->fechaQualidiab;
    }

    public function getQualidiab(){
        return $this->qualidiab;
    }

    public function getFechaFondoOjo(){
        return $this->fechaFondoOjo;
    }

    public function getResultadoFondoOjo(){
        return $this->resultadoFondoOjo;
    }

    public function getEnalapril(){
        return $this->enalapril;
    }

    public function getLosartan(){
        return $this->losartan;
    }

    public function getRetinopatiaDiabetica(){
        return $this->retinopatiaDiabetica;
    }

    public function getAmputacion(){
        return $this->amputacion;
    }
}
?>