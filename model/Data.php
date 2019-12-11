<?php
require_once("Complicacion.php");
require_once("ComplicacionPacientes.php");
require_once("Comuna.php");
require_once("Conexion.php");
require_once("Estado.php");
require_once("EstadoCivil.php");
require_once("Estamento.php");
require_once("FactorDeRiesgo.php");
require_once("ListadoExamen.php");
require_once("Log.php");
require_once("Observacion.php");
require_once("Paciente.php");
require_once("PacienteDiabetico.php");
require_once("ParametrosClinicos.php");
require_once("Patologia.php");
require_once("PatologiasPacientes.php");
require_once("Profesional.php");
require_once("Tarjeton.php");
require_once("Telefono.php");
require_once("TipoExamen.php");
require_once("TratamientoCardiaco.php");
require_once("UsuarioAdultoMayor.php");

class Data{
    private $con;

    public function __construct(){
        $this->con = new Conexion(
            "DB_TarjetonVirtual",
            "root",
            "123456");
    }

//INSERT DE TODAS LAS TABLAS
    public function crearPaciente($paciente){
        $query = "insert into tbl_paciente 
        values(null,
        '".$paciente->getRun_Paciente()."',
        '".$paciente->getNombres()."',
        '".$paciente->getApellidoPaterno()."',
        '".$paciente->getApellidoMaterno()."',
        '".$paciente->getFechaNacimiento()."',
        '".$paciente->getSexo()."',
        '".$paciente->getParticipacionSocial()."',
        '".$paciente->getEstudio()."',
        '".$paciente->getActividadLaboral()."',
        '".$paciente->getDireccionParticular()."',
        '".$paciente->getSector()."',
        '".$paciente->getEstadoCivil()."',
        '".$paciente->getComuna()."',
        ".$paciente->getEstado().")";
        
        $this->con->ejecutar($query);
    }

    public function crearPacienteDiabetico($pacienteDiabetico,$tarjeton){
        $query = "insert into tbl_pacientediabetico
        values(null, '".$pacienteDiabetico->getFechaEvalPieDiabetico()."',
        '".$pacienteDiabetico->getPtjePieDiabetico()."',
        '".$pacienteDiabetico->getFechaQualidiab()."',
        '".$pacienteDiabetico->getQualidiab()."',
        '".$pacienteDiabetico->getFechaFondoOjo()."',
        '".$pacienteDiabetico->getResultadoFondoOjo()."',
        '".$pacienteDiabetico->getEnalapril()."',
        '".$pacienteDiabetico->getLosartan()."',
        '".$pacienteDiabetico->getRetinopatiaDiabetica()."',
        '".$pacienteDiabetico->getAmputacion()."',
        ".$tarjeton->getIdTarjeton().")";
        
        $this->con->ejecutar($query);
    }

    public function crearPatologia($patologia){
        $query = "insert into tbl_patologia values(null, '".$patologia->getNombrePatologia()."')";
        
        $this->con->ejecutar($query);
    }

    public function crearPatologiasPacientes($patologiaPacientes){
        $query = "insert into tbl_patologiaspacientes values(null, 
        '".$patologiaPacientes->getFechaPatologias()."', 
        '".$patologiaPacientes->getPatologiaID()."', 
        ".$patologiaPacientes->getRunPaciente().")";
        
        $this->con->ejecutar($query);
    }

    public function crearProfesional($profesional){
        $query = "insert into tbl_profesional 
        values(null, '".$profesional->getNombreProfesional()."', 
        ".$profesional->getEstamento().")";
        
        $this->con->ejecutar($query);
    }

    public function crearTelefono($telefono,$paciente){
        $query = "insert into tbl_telefono 
        values(null, '".$telefono->getFonoTelefono()."', 
        ".$paciente->getRun_Paciente().")";
        
        $this->con->ejecutar($query);
    }

    public function crearTipoExamen($tipoExamen,$listadoExamen,$tarjeton){
        $query = "insert into tbl_tipoexamenes 
        values(null, '".$listadoExamen->getIdListadoExamen()."', 
        '".$tipoExamen->getFechaTipoExamen()."', 
        '".$tipoExamen->getValorTipoExamen()."', 
        ".$tarjeton->getIdTarjeton().")";
        
        $this->con->ejecutar($query);
    }

    public function crearTratamientoCardiaco($ttoCardiaco,$tarjeton){
        $query = "insert into tbl_tratamientocardiaco 
        values(null, '".$ttoCardiaco->getEstatinas()."', 
        '".$ttoCardiaco->getAAS100()."', 
        ".$tarjeton->getIdTarjeton().")";
        
        $this->con->ejecutar($query);
    }

    //LISTAR TODAS LAS TABLAS
    public function getComplicacion(){
        $listComplicacion = array();

        $this->con->conectar();

        $rs = $this->con->ejecutar("SELECT * FROM tbl_complicacion");

        while($obj = $rs->fetch_object()){
            array_push($listComplicacion, $obj);
        }
        $this->con->desconectar();

        return $listComplicacion;
    }

    public function getComuna(){
        $listComuna = array();

        $this->con->conectar();

        $rs = $this->con->ejecutar("SELECT * FROM tbl_comuna");

        while($obj = $rs->fetch_object()){
            array_push($listComuna, $obj);
        }
        $this->con->desconectar();

        return $listComuna;
    }

    public function getEstado(){
        $listEstado = array();

        $this->con->conectar();

        $rs = $this->con->ejecutar("SELECT * FROM tbl_estado");

        while($obj = $rs->fetch_object()){
            array_push($listEstado, $obj);
        }
        $this->con->desconectar();

        return $listEstado;
    }

    public function getEstadoCivil(){
        $lista = array();

        $query = "SELECT * FROM tbl_estadocivil;";

        $this->con->conectar();

        $rs = $this->con->ejecutar($query);
        while($obj = $rs->fetch_object()){
            array_push($lista, $obj);
        }
        
        $this->con->desconectar();
        return $lista;
    }

    public function getListadoExamen(){
        $lista = array();

        $query = "SELECT * FROM `tbl_listadoexamen` ORDER BY `nombreExamen` ASC;";
        $this->con->conectar();
        $rs = $this->con->ejecutar($query);

        while ($obj = $rs->fetch_object()) {
            array_push($lista,$obj);
        }
        $this->con->desconectar();
        return $lista;
    }

    public function getPacienteBusqueda($run){
        $lista = array();

        $query = "SELECT id_Paciente FROM tbl_paciente WHERE run_Paciente = '$run';";

        $p = null;

        $this->con->conectar();

        $rs = $this->con->ejecutar($query);
        if ($obj = $rs->fetch_object()) {
            $p = new Paciente();

            $p->setId_Paciente($obj->id_Paciente);
        }

        $this->con->desconectar();
        return $p;
    }

    public function getPacienteTarjeton($run){
        $lista = array();

        $query = "SELECT * FROM getPaciente WHERE run_Paciente = '$run';";

        $this->con->conectar();

        $rs = $this->con->ejecutar($query);
        while ($obj = $rs->fetch_object()) {
            array_push($lista, $obj);
        }

        $this->con->desconectar();

        return $lista;
    }

    public function getPacientePorFiltro($filtro){
        $lista = array();

        $query = "SELECT * FROM getPaciente
        WHERE (run_Paciente LIKE '$filtro' OR 
        nombres LIKE '%$filtro%' OR 
        apellidoPaterno LIKE '%$filtro%' OR
        apellidoMaterno LIKE '%$filtro%' OR
        sector LIKE '%$filtro%');";

        $this->con->conectar();

        $rs = $this->con->ejecutar($query);
        while($obj = $rs->fetch_object()){
            array_push($lista, $obj);
        }
        
        $this->con->desconectar();
        return $lista;
    }

    public function getPaciente(){
        $lista = array();

        $query = "SELECT * FROM getPaciente;";

        $this->con->conectar();

        $rs = $this->con->ejecutar($query);
        while($obj = $rs->fetch_object()){ 
            array_push($lista, $obj);
        }
        
        $this->con->desconectar();
        return $lista;
    }

    public function getPacientePasivos(){
        $lista = array();

        $query = "SELECT * FROM getPacientePasivo;";

        $this->con->conectar();

        $rs = $this->con->ejecutar($query);
        while($obj = $rs->fetch_object()){
            array_push($lista, $obj);
        }
        
        $this->con->desconectar();
        return $lista;
    }

    public function getPatologia(){
        $lista = array();

        $query = "SELECT * FROM tbl_patologia;";

        $this->con->conectar();

        $rs = $this->con->ejecutar($query);
        while($obj = $rs->fetch_object()){
            array_push($lista, $obj);
        }
        
        $this->con->desconectar();
        return $lista;
    }

    public function getPatologiaPacientes($filtro){
        $lista = array();

        $query = "SELECT pp.fechaPatologias, p.nombre 
        FROM tbl_patologiaspacientes AS pp 
        INNER JOIN tbl_patologia AS p ON p.id_Patologia=pp.Patologia_ID 
        WHERE pp.run_Paciente='$filtro';";

        $this->con->conectar();

        $rs = $this->con->ejecutar($query);
        while($obj = $rs->fetch_object()){
            array_push($lista, $obj);
        }
        
        $this->con->desconectar();
        return $lista;
    }

    public function getProfesional(){
        $lista = array();

        $query = "SELECT * FROM getProfesional";

        $this->con->conectar();

        $rs = $this->con->ejecutar($query);
        while($obj = $rs->fetch_object()){
            array_push($lista, $obj);
        }
        
        $this->con->desconectar();
        return $lista;
    }

    public function getEstamento(){
        $listEstado = array();

        $this->con->conectar();

        $rs = $this->con->ejecutar("SELECT * FROM tbl_estamento");

        while($obj = $rs->fetch_object()){
            array_push($listEstado, $obj);
        }
        $this->con->desconectar();

        return $listEstado;
    }

    public function getProfesionalPorFiltro($filtro){
        $lista = array();

        $query = "SELECT * FROM getProfesional AS pro
        WHERE nombre LIKE '%$filtro%' OR estamento LIKE '%$filtro%'";

        $this->con->conectar();

        $rs = $this->con->ejecutar($query);
        while($obj = $rs->fetch_object()){
            array_push($lista, $obj);
        }

        $this->con->desconectar();
        return $lista;
    }

    public function getCantidadPacientesPorDiagnostico($filtro){
        $lista = array();

        $query = "SELECT
        SUM(IF(edad BETWEEN 0 and 4,1,0)) as 'cero',
        SUM(IF(edad BETWEEN 5 and 9,1,0)) as 'cinco',
        SUM(IF(edad BETWEEN 10 and 19,1,0)) as 'diez',
        SUM(IF(edad BETWEEN 20 and 29,1,0)) as 'veinte',
        SUM(IF(edad BETWEEN 30 and 39,1,0)) as 'treinta',
        SUM(IF(edad BETWEEN 40 and 49,1,0)) as 'cuarenta',
        SUM(IF(edad BETWEEN 50 and 59,1,0)) as 'cincuenta',
        SUM(IF(edad BETWEEN 60 and 69,1,0)) as 'sesenta',
        SUM(IF(edad BETWEEN 70 and 79,1,0)) as 'setenta',
        SUM(IF(edad >=80, 1, 0)) as 'ochenta'
        FROM (select timestampdiff(year,fechaNacimiento,curdate()) as edad
        from tbl_paciente as p
        inner join tbl_patologiaspacientes as pp on pp.id_Paciente = p.id_Paciente
        inner join tbl_patologia as pat on pat.id_Patologia = pp.id_Patologia
        where pat.nombre like '%$filtro%') as obtencion";

        $this->con->conectar();

        $rs = $this->con->ejecutar($query);
        while($obj = $rs->fetch_object()){
            array_push($lista, $obj);
        }

        $this->con->desconectar();
        return $lista;
    }

    public function getTarjeton($id){
        $lista = array();

        $query = "select * from getTarjeton where id_Paciente = $id";

        $this->con->conectar();

        $rs = $this->con->ejecutar($query);

        while($obj = $rs->fetch_object()){
            array_push($lista, $obj);
        }

        $this->con->desconectar();

        // var_dump(json_decode($lista,true));
        return $lista;
        
     }

    public function getCantidadAtenciones($fechaInicial,$fechaTermino){
        $lista = array();

        $query = "SELECT COUNT(id_Tarjeton) FROM tbl_tarjeton WHERE fechaAtencion BETWEEN '$fechaInicial' AND '$fechaTermino';;";

        $this->con->conectar();

        $rs = $this->con->ejecutar($query);

        while ($obj = $rs->fetch_object()) {
            array_push($lista,$obj);
        }

        $this->con->desconectar();

        return $lista;
    }

/*ACTUALIZAR TABLAS*/

    public function updateTarjeton($tarjeton,$factorDeRiesgo,$parametrosClinicos,$tratamientoCardiaco,$usuarioAdultoMayor,$obser){
        $updateTarjeton = "update tbl_tarjeton set 
        fechaAtencion = '".$tarjeton->getFechaAtencion()."', 
        id_Paciente = '".$tarjeton->getIdPaciente()."',
        id_Profesional = '".$tarjeton->getIdProfesional()."'
        where id_Tarjeton = '".$tarjeton->getIdTarjeton()."'";

        $this->con->conectar();
        $this->con->ejecutar($updateTarjeton);

        $updateFactor = "update tbl_factorderiesgo set 
        insuficienciaRenal = ".$factorDeRiesgo->getInsuficienciaRenal().",
        IAM = ".$factorDeRiesgo->getIam().",
        ACV = ".$factorDeRiesgo->getAcv()."
        where id_Tarjeton = '".$tarjeton->getIdTarjeton()."'";

        $this->con->conectar();
        $this->con->ejecutar($updateFactor);

        $updateParametros = "update tbl_parametrosclinicos set 
        peso = '".$parametrosClinicos->getPeso()."',
        talla = '".$parametrosClinicos->getTalla()."',
        IMC = '".$parametrosClinicos->getIMC()."',
        diagnosticoNutricional = '".$parametrosClinicos->getDiagnosticoNutricional()."',
        paSistolica = '".$parametrosClinicos->getPaSistolica()."',
        paDistolica = '".$parametrosClinicos->getPaDistolica()."',
        circunferenciaCintura = '".$parametrosClinicos->getCircunferenciaCintura()."'
        where id_Tarjeton = '".$tarjeton->getIdTarjeton()."'";

        $this->con->conectar();
        $this->con->ejecutar($updateParametros);

        $updateTratamiento = "update tbl_tratamientocardiaco set 
        estatinas = ".$tratamientoCardiaco->getEstatinas().",
        AAS_100 = ".$tratamientoCardiaco->getAAS_100()."
        where id_Tarjeton = '".$tarjeton->getIdTarjeton()."'";

        $this->con->conectar();
        $this->con->ejecutar($updateTratamiento);

        $updateUsuario = "update tbl_usuarioadultomayor set 
        autovalente = ".$usuarioAdultoMayor->getAutovalente().",
        autovalenteConRiesgo = ".$usuarioAdultoMayor->getAutovalenteConRiesgo().",
        riesgoDependencia = ".$usuarioAdultoMayor->getRiesgoDependencia().",
        dependencia = ".$usuarioAdultoMayor->getDependencia()."
        where id_Tarjeton = '".$tarjeton->getIdTarjeton()."'";

        $this->con->conectar();
        $this->con->ejecutar($updateUsuario);

        $updateObservacion = "update tbl_observacion set 
        observacion = '".$obser->getObservacion()."'
        where id_Tarjeton = '".$tarjeton->getIdTarjeton()."'";

        $this->con->conectar();
        $this->con->ejecutar($updateObservacion);
        $this->con->desconectar();
    }

//ELIMINAR/ACTIVAR TABLAS
/*Estados: 1 Activo - 2 Pasivo*/

    public function eliminarPaciente($runPaciente){
        $delete = "update tbl_paciente set id_Estado = 2 where run_Paciente = '$runPaciente'";
        
        $this->con->conectar();
        $this->con->ejecutar($delete);
        $this->con->desconectar();
    }

    public function eliminarTarjeton($id){
        $delete = "update tbl_tarjeton set id_Estado = 2 where id_Tarjeton = $id";

        $this->con->conectar();
        $this->con->ejecutar($delete);
        $this->con->desconectar();
    }

    public function activarPaciente($runPaciente){
        $activar = "update tbl_paciente set id_Estado = 1 where run_Paciente = '$runPaciente'";
        
        $this->con->conectar();
        $this->con->ejecutar($activar);
        $this->con->desconectar();
    }

    public function activarTarjeton($id){
        $activar = "update tbl_tarjeton set id_Estado = 1 where id_Tarjeton = $id";

        $this->con->conectar();
        $this->con->ejecutar($activar);
        $this->con->desconectar();
    }

// Función que me permite crear paciente obteniendo un objeto de paciente y telefono 
// un array de las patologias y leyendolo con un foreach
    public function crearPacienteTelPat($paciente,$listPatologia,$listComplicaciones,$telefono){
        //creo el paciente
        $queryPaciente = "insert into tbl_paciente 
        values(null,
        '".$paciente->getRun_Paciente()."',
        '".$paciente->getNombres()."',
        '".$paciente->getApellidoPaterno()."',
        '".$paciente->getApellidoMaterno()."',
        '".$paciente->getFechaNacimiento()."',
        ".$paciente->getSexo().",
        '".$paciente->getParticipacionSocial()."',
        '".$paciente->getEstudio()."',
        '".$paciente->getActividadLaboral()."',
        '".$paciente->getDireccionParticular()."',
        '".$paciente->getSector()."',
        '".$paciente->getEstadoCivil()."',
        ".$paciente->getEstado().",
        '".$paciente->getComuna()."')";

        $this->con->ejecutar($queryPaciente);

        //Obtengo el último paciente (id)
        $this->con->conectar();

        $queryUltimo = "SELECT MAX(id_Paciente) AS id FROM tbl_paciente";
        
        $rs = $this->con->ejecutar($queryUltimo);

        $idUltimoPaciente = 0;
        while ($reg = $rs->fetch_object()) {
            $idUltimoPaciente = $reg->id;
        }

        $this->con->desconectar();

        foreach ($listPatologia as $lp) {
            $query = "INSERT INTO tbl_patologiaspacientes 
            VALUES (null,
            '".$lp["fecha"]."',
            ".$lp["id"].",
            ". $idUltimoPaciente.")";
            $this->con->ejecutar($query);
        }

        foreach ($listComplicaciones as $lc) {
            $query = "INSERT INTO tbl_complicacionespacientes 
            VALUES (null,
            '".$lc["fecha"]."',
            ".$lc["id"].",
            ". $idUltimoPaciente.")";
            $this->con->ejecutar($query);
        }

        $queryTelefono = "INSERT INTO tbl_telefono VALUES (null,'".$telefono->getFono()."',". $idUltimoPaciente.")";

        $this->con->ejecutar($queryTelefono);
    }

    public function crearAtencion($tarjeton,$observacion,$parametrosClinicos,$pacienteDiabetico,$factorDeRiesgo,$tratamientoCardiaco,$usuarioAdultoMayor,$listaExamen){
        //Creo el tarjeton
        $queryTarjeton = "insert into tbl_tarjeton values(
            null,
            '".$tarjeton->getFechaAtencion()."',
            '".$tarjeton->getIdPaciente()."',
            '".$tarjeton->getIdProfesional()."',
            1);";

        $this->con->ejecutar($queryTarjeton);

        //Obtengo el ultimo ID del tarjeton
        $this->con->conectar();

        $query = "SELECT MAX(id_Tarjeton) AS id FROM tbl_tarjeton";
        
        $rs = $this->con->ejecutar($query);

        
        $idUltimoTarjeton = 0;
        while ($reg = $rs->fetch_object()) {
            $idUltimoTarjeton = $reg->id;
        }

        //Creo los parametros clinicos
        $queryParametrosClinicos = "insert into tbl_parametrosclinicos values(
            null,
            '".$parametrosClinicos->getPeso()."',
            '".$parametrosClinicos->getTalla()."',
            '".$parametrosClinicos->getIMC()."',
            '".$parametrosClinicos->getDiagnosticoNutricional()."',
            '".$parametrosClinicos->getPaSistolica()."',
            '".$parametrosClinicos->getPaDistolica()."',
            '".$parametrosClinicos->getCircunferenciaCintura()."',
            '".$idUltimoTarjeton."');";

            $this->con->ejecutar($queryParametrosClinicos);

        //Creo los tipo de examenes desde el Array
        foreach ($listaExamen as $l) {
            $queryTipoExamenes = "insert into tbl_tipoexamenes VALUES (
            null,
            '".$l["fecha"]."',
            '".$l["valor"]."',
            '".$l["id"]."',
            ". $idUltimoTarjeton.")";

            $this->con->ejecutar($queryTipoExamenes);
        }

        //Creo el paciente diabetico
        $queryPacienteDiabetico = "insert into tbl_pacientediabetico values(
            null,
            '".$pacienteDiabetico->getFechaEvalPieDiabetico()."'
            '".$pacienteDiabetico->getPtjePieDiabetico()."'
            '".$pacienteDiabetico->getFechaQualidiab()."'
            '".$pacienteDiabetico->getQualidiab()."'
            '".$pacienteDiabetico->getFechaFondoOjo()."'
            '".$pacienteDiabetico->getResultadoFondoOjo()."'
            '".$pacienteDiabetico->getEnalapril()."'
            '".$pacienteDiabetico->getLosartan()."'
            '".$pacienteDiabetico->getRetinopatiaDiabetica()."'
            '".$pacienteDiabetico->getAmputacion()."'
            '".$idUltimoTarjeton."'";

        $this->con->ejecutar($queryPacienteDiabetico);

        //Creo los factores de riesgo
        $queryFactoDeRiesgo = "insert into tbl_factorderiesgo values(
            NULL,
            '".$factorDeRiesgo->getInsuficienciaRenal()."',
            '".$factorDeRiesgo->getIam()."',
            '".$factorDeRiesgo->getAcv()."',
            '".$idUltimoTarjeton."';";

        $this->con->ejecutar($queryFactoDeRiesgo);

        //Creo el tratamiento cardiaco
        $queryTratamientoCardiaco = "insert into tbl_tratamientocardiaco values(
            NULL,
            '".$tratamientoCardiaco->getEstatinas()."',
            '".$tratamientoCardiaco->getAAS_100()."',
            '".$idUltimoTarjeton."';";

        $this->con->ejecutar($queryTratamientoCardiaco);

        //Creo el usuario adulto mayor
        $queryUsuarioAdultoMayor = "insert into tbl_usuarioadultomayor values(
            NULL,
            '".$usuarioAdultoMayor->getAutovalente()."',
            '".$usuarioAdultoMayor->getAutovalenteConRiesgo()."',
            '".$usuarioAdultoMayor->getRiesgoDependencia()."',
            '".$usuarioAdultoMayor->getDependencia()."',
            '".$idUltimoTarjeton."';";
        
        $this->con->ejecutar($queryUsuarioAdultoMayor);

        //Creo la observación
        $queryObservacion = "insert into tbl_observacion values(
            NULL,
            '".$observacion->getObservacion()."',
            '".$idUltimoTarjeton."';";
        
        $this->con->ejecutar($queryObservacion);

        $this->con->desconectar();
    }
}