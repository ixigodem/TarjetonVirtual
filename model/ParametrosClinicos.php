<?php
class ParametrosClinicos{
    private $idParametrosClinicos;
    private $peso;
    private $talla;
    private $IMC;
    private $diagnosticoNutricional;
    private $paSistolica;
    private $paDistolica;
    private $circunferenciaCintura;


    public function __construct(){
        // por defecto
    }

    public function setIdParametrosClinicos($idParametrosClinicos){
        $this->idParametrosClinicos = $idParametrosClinicos;
    }

    public function setPeso($peso){
        $this->peso = $peso;
    }

    public function setTalla($talla){
        $this->talla = $talla;
    }

    public function setIMC($IMC){
        $this->IMC = $IMC;
    }

    public function setDiagnosticoNutricional($diagnosticoNutricional){
        $this->diagnosticoNutricional = $diagnosticoNutricional;
    }

    public function setPaSistolica($paSistolica){
        $this->paSistolica = $paSistolica;
    }

    public function setPaDistolica($paDistolica){
        $this->paDistolica = $paDistolica;
    }

    public function setCircunferenciaCintura($circunferenciaCintura){
        $this->circunferenciaCintura = $circunferenciaCintura;
    }

    public function getIdParametrosClinicos(){
        return $this->idParametrosClinicos;
    }

    public function getPeso(){
        return $this->peso;
    }

    public function getTalla(){
        return $this->talla;
    }

    public function getIMC(){
        return $this->IMC;
    }

    public function getDiagnosticoNutricional(){
        return $this->diagnosticoNutricional;
    }

    public function getPaSistolica(){
        return $this->paSistolica;
    }

    public function getPaDistolica(){
        return $this->paDistolica;
    }

    public function getCircunferenciaCintura(){
        return $this->circunferenciaCintura;
    }
}
?>