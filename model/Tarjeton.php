<?php
    class Tarjeton {
        private $id_Tarjeton;
        private $fechaAtencion;
        private $id_Paciente;
        private $id_Profesional;
        private $id_Estado;
    
        public function __construct(){
            //Constructor por defecto
        }

        public function setIdTarjeton($id_Tarjeton){
            $this->id_Tarjeton = $id_Tarjeton;
        }
        
        public function setFechaAtencion($fechaAtencion){
            $this->fechaAtencion = $fechaAtencion;
        }
        public function setIdPaciente($id_Paciente){
            $this->id_Paciente = $id_Paciente;
        }
        public function setIdProfesional($id_Profesional){
            $this->id_Profesional = $id_Profesional;
        }
        public function setIdEstado($id_Estado){
            $this->id_Estado = $id_Estado;
        }

        public function getIdTarjeton(){
            return $this->id_Tarjeton;
        }

        public function getFechaAtencion(){
            return $this->fechaAtencion;
        }

        public function getIdPaciente(){
            return $this->id_Paciente;
        }

        public function getIdProfesional(){
            return $this->id_Profesional;
        }

        public function getIdEstado(){
            return $this->id_Estado;
        }
    }
?>