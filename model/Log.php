<?php
class Log{
    private $idLog;
    private $ipLog;
    private $nombresLog;
    private $apellidosLog;
    private $nombreUsuarioLog;
    private $fechaLog;
    private $sucesoLog;
    
    public function __construct(){
        //Constructor por defecto
    }

    public function setIdLog($idLog){
        $this->idLog = $idLog;
    }
    public function setIpLog($ipLog){
        $this->ipLog = $ipLog;
    }

    public function setNombresLog($nombresLog){
        $this->nombresLog = $nombresLog;
    }

    public function setApellidosLog($apellidosLog){
        $this->apellidosLog = $apellidosLog;
    }

    public function setNombreUsuarioLog($nombreUsuarioLog){
        $this->nombreUsuarioLog = $nombreUsuarioLog;
    }

    public function setFechaLog($fechaLog){
        $this->fechaLog = $fechaLog;
    }

    public function setSucesoLog($sucesoLog){
        $this->sucesoLog = $sucesoLog;
    }

    public function getIdLog(){
        return $this->idLog;
    }

    public function getIpLog(){
        return $this->ipLog;
    }

    public function getNombresLog(){
        return $this->nombresLog;
    }

    public function getApellidosLog(){
        return $this->apellidosLog;
    }

    public function getNombreUsuarioLog(){
        return $this->nombreUsuarioLog;
    }

    public function getFechaLog(){
        return $this->fechaLog;
    }

    public function getSucesoLog(){
        return $this->sucesoLog;
    }
}
?>