<?php
class Paciente{
    private $id_Paciente;
    private $run_Paciente;
    private $nombres;
    private $apellidoPaterno;
    private $apellidoMaterno;
    private $fechaNacimiento;
    private $edad;
    private $sexo;
    private $participacionSocial;
    private $estudio;
    private $actividadLaboral;
    private $direccionParticular;
    private $sector;
    private $estadoCivil_ID;
    private $comuna_ID;
    private $estado_ID;    
  

    public function __construct(){
        // por defecto
    }

    public function setId_Paciente($id_Paciente){
        $this->id_Paciente = $id_Paciente;
    }
    public function setRun_Paciente($run_Paciente){
        $this->run_Paciente = $run_Paciente;
    }

    public function setNombres($nombres){
        $this->nombres = $nombres;
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

    public function setEdad($edad){
        $this->edad = $edad;
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

    public function setEstadoCivil($estadoCivil_ID){
        $this->estadoCivil_ID = $estadoCivil_ID;
    }

    public function setComuna($comuna_ID){
        $this->comuna_ID = $comuna_ID;
    }

    public function setEstado($estado_ID){
        $this->estado_ID = $estado_ID;
    }

    public function setSector($sector){
        $this->sector = $sector;
    }

    public function getId_Paciente(){
        return $this->id_Paciente;
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

    public function getEdad(){
        return $this->edad;
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
        return $this->estadoCivil_ID;
    }

    public function getComuna(){
        return $this->comuna_ID;
    }

    public function getEstado(){
        return $this->estado_ID;
    }

    public function getSector(){
        return $this->sector;
    }
}
?>