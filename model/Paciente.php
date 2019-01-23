<?php
class Paciente{
    private $run_Paciente;
    private $nombres;
    private $apellidoPaterno;
    private $apellidoMaterno;
    private $fechaNacimiento;
    private $sexo;
    private $participacionSocial;
    private $estudio;
    private $actividadLaboral;
    private $direccionParticular;
    private $estadoCivil;
    private $comuna;
    private $estado;

    public function __construct(){
        // por defecto
    }

    public function setRun_Paciente($run_Paciente){
        $this->run_Paciente = $run_Paciente;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setApellidoPaterno($apellidoPaterno){
        $this->apellidoPaterno = $apellidoPaterno;
    }

    public function setApellidoMaterno($apellidoMaterno){
        $this->apellidoMaterno = $apellidoMaterno;
    }

    public function setFechaNacimiento($fechaNacimiento){
        $this->fechaNacimiento = $fechaNacimiento;
    }

    public function setSexo($sexo){
        $this->sexo = $sexo;
    }

    public function setParticipacionSocial($participacionSocial){
        $this->participacionSocial = $participacionSocial;
    }

    public function setEstudio($estudio){
        $this->estudio = $estudio;
    }

    public function setActividadLaboral($actividadLaboral){
        $this->actividadLaboral = $actividadLaboral;
    }

    public function setDireccionParticular($direccionParticular){
        $this->direccionParticular = $direccionParticular;
    }

    public function setEstadoCivil($estadoCivil){
        $this->estadoCivil = $estadoCivil;
    }

    public function setComuna($comuna){
        $this->comuna = $comuna;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }

    public function getRun_Paciente(){
        return $this->run_Paciente;
    }

    public function getNombres(){
        return $this->nombres;
    }

    public function getApellidoPaterno(){
        return $this->apellidoPaterno;
    }

    public function getApellidoMaterno(){
        return $this->apellidoMaterno;
    }

    public function getFechaNacimiento(){
        return $this->fechaNacimiento;
    }

    public function getSexo(){
        return $this->sexo;
    }

    public function getParticipacionSocial(){
        return $this->participacionSocial;
    }

    public function getEstudio(){
        return $this->estudio;
    }

    public function getActividadLaboral(){
        return $this->actividadLaboral;
    }

    public function getDireccionParticular(){
        return $this->direccionParticular;
    }

    public function getEstadoCivil(){
        return $this->estadoCivil;
    }

    public function getComuna(){
        return $this->comuna;
    }

    public function getEstado(){
        return $this->estado;
    }

}
?>