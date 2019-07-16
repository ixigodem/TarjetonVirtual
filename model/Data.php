<?php
require_once("Complicacion.php");
require_once("ComplicacionPacientes.php");
require_once("Comuna.php");
require_once("Conexion.php");
require_once("Connection.php");
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
    private $con2;

    public function __construct(){
        $this->con = new Conexion(
            "db_tarjetonvirtual2",
            "root",
            "");

        $this->con2 = new Connection();
    }

//INSERT DE TODAS LAS TABLAS
    public function crearcomplicacion($complicacion){
        $query = "insert into complicacion values(null, '".$complicacion->getNombreComplicacion()."')";
        
        $this->ejecutar($query);
    }

    public function crearComplicacionPacientes($complicacionPacientes,$complicacion,$paciente){
        $query = "insert into tbl_complicacionespacientes 
        values(null, '".$complicacionPacientes->getFechaComplicacionPac()."',
        '".$complicacion->getIdComplicacion()."', 
        ".$paciente->getRun_Paciente().")";

        $this->ejecutar($query);
    }

    public function crearComuna($comuna){
        $query = "insert into tbl_comuna values(null, '".$comuna->getNombreComuna()."')";
        
        $this->ejecutar($query);
    }

    public function crearEstadoCivil($estadoCivil){
        $query = "insert into tbl_estado_civil values(null, '".$estadoCivil->getNombreEstadoCivil()."')";
        
        $this->ejecutar($query);
    }

    public function crearEstamento($estamento){
        $query = "insert into tbl_estamento values(null, '".$estamento->getNombreEstamento()."')";
        
        $this->ejecutar($query);
    }

    public function crearFactorDeRiesgo($factorDeRiesgo,$tarjeton){
        $query = "insert into tbl_factorderiesgo 
        values(null, '".$factorDeRiesgo->getInsuficienciaRenal()."',
        '".$factorDeRiesgo->getIam()."',
        '".$factorDeRiesgo->getAcv()."',
        ".$tarjeton->getIdTarjeton().")";
        
        $this->ejecutar($query);
    }

    public function crearListadoExamen($listadoExamen){
        $query = "insert into tbl_listadoexamen values(null, '".$listadoExamen->getNombreListadoExamen()."')";
        
        $this->c->ejecutar($query);
    }

    public function crearObservacion($observacion,$tarjeton){
        $query = "insert into tbl_observacion 
        values(null, '".$observacion->getObservacion()."',
        ".$tarjeton->getIdTarjeton().")";
        
        $this->ejecutar($query);
    }

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
        
        $this->ejecutar($query);
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
        
        $this->ejecutar($query);
    }

    public function crearParametrosClinicos($parametrosClinicos,$tarjeton){
        $query = "insert into tbl_pacientediabetico
        values(null, '".$parametrosClinicos->getPeso()."',
        '".$parametrosClinicos->getTalla()."',
        '".$parametrosClinicos->getIMC()."',
        '".$parametrosClinicos->getDiagnosticoNutricional()."',
        '".$parametrosClinicos->getPaSistolica()."',
        '".$parametrosClinicos->getPaDistolica()."',
        '".$parametrosClinicos->getCircunferenciaCintura()."',
        ".$tarjeton->getIdTarjeton().")";
        
        $this->ejecutar($query);
    }

    public function crearPatologia($patologia){
        $query = "insert into tbl_patologia values(null, '".$patologia->getNombrePatologia()."')";
        
        $this->ejecutar($query);
    }

    public function crearPatologiasPacientes($patologiaPacientes){
        $query = "insert into tbl_patologiaspacientes values(null, 
        '".$patologiaPacientes->getFechaPatologias()."', 
        '".$patologiaPacientes->getPatologiaID()."', 
        ".$patologiaPacientes->getRunPaciente().")";
        
        $this->ejecutar($query);
    }

    public function crearProfesional($profesional){
        $query = "insert into tbl_profesional 
        values(null, '".$profesional->getNombreProfesional()."', 
        ".$profesional->getEstamento().")";
        
        $this->ejecutar($query);
    }

    public function crearTarjeton($tarjeton,$paciente,$profesional,$estado){
        $query = "insert into tbl_tarjeton 
        values(null, '".$tarjeton->getFechaAtencionTarjeton()."', 
        '".$paciente->getRun_Paciente()."',
        '".$profesional->getIdProfesional()."', 
        ".$estado->getIdEstado().")";
        
        $this->ejecutar($query);
    }

    public function crearTelefono($telefono,$paciente){
        $query = "insert into tbl_telefono 
        values(null, '".$telefono->getFonoTelefono()."', 
        ".$paciente->getRun_Paciente().")";
        
        $this->ejecutar($query);
    }

    public function crearTipoExamen($tipoExamen,$listadoExamen,$tarjeton){
        $query = "insert into tbl_tipoexamenes 
        values(null, '".$listadoExamen->getIdListadoExamen()."', 
        '".$tipoExamen->getFechaTipoExamen()."', 
        '".$tipoExamen->getValorTipoExamen()."', 
        ".$tarjeton->getIdTarjeton().")";
        
        $this->ejecutar($query);
    }

    public function crearTratamientoCardiaco($ttoCardiaco,$tarjeton){
        $query = "insert into tbl_tratamientocardiaco 
        values(null, '".$ttoCardiaco->getEstatinas()."', 
        '".$ttoCardiaco->getAAS100()."', 
        ".$tarjeton->getIdTarjeton().")";
        
        $this->ejecutar($query);
    }

    public function crearUsuarioAdultoMayor($usuarioAM,$tarjeton){
        $query = "insert into tbl_usuarioadultomayor
        values(null, '".$usuarioAM->getAutovalente()."',
        '".$usuarioAM->getAutovalenteConRiesgo()."',
        '".$usuarioAM->getRiesgoDependencia()."',
        '".$usuarioAM->getDependencia()."', 
        ".$tarjeton->getIdTarjeton().")";
        
        $this->ejecutar($query);
    }

    //LISTAR TODAS LAS TABLAS
    public function getComplicacion(){
        $lista = array();

        $query = "SELECT * FROM tbl_complicacion;";

        $u = null;

        $this->c->conectar();

        $rs = $this->c->ejecutar($query);
        if ($obj = $rs->fetch_object()) {
            $u = new Complicacion();

            $u->setIdComplicacion($obj->idComplicacion);
            $u->setNombreComplicacion($obj->nombreComplicacion);
        }

        $this->c->desconectar();
        return $u;
    }

    public function getComplicacionPaciente(){
        $lista = array();

        $query = "SELECT * FROM tbl_complicacionespacientes;";

        $cp = null;

        $this->c->conectar();

        $rs = $this->c->ejecutar($query);
        if ($obj = $rs->fetch_object()) {
            $u = new ComplicacionPacientes();

            $cp->setIdComplicacionPac($obj->idComplicacion);
            $cp->setFechaComplicacionPac($obj->nombreComplicacion);
            $cp->setIdComplicacion($obj->complicacionID);
            $cp->setRun_Paciente($obj->pacienteID);
        }

        $this->c->desconectar();
        return $cp;
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

        $query = "SELECT * FROM tbl_estado_civil;";

        $this->con->conectar();

        $rs = $this->con->ejecutar($query);
        while($obj = $rs->fetch_object()){
            array_push($lista, $obj);
        }
        
        $this->con->desconectar();
        return $lista;
    }

    public function getFactorDeRiesgo(){
        $lista = array();

        $select = "SELECT * FROM tbl_factorderiesgo;";

        $u = null;

        $this->c->conectar();

        $rs = $this->c->ejecutar($select);
        while($obj = $rs->fetch_object()){
            array_push($lista, $obj);
        }

        $this->c->desconectar();
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

        $query = "SELECT id_Paciente,run_Paciente,nombres,apellidoPaterno,apellidoMaterno,DATE_FORMAT(fechaNacimiento, '%d/%m/%Y') as fechaNacimiento,
        sexo,participacionSocial,estudio,actividadLaboral,direccionParticular,sector,
        t.fono as fono, ec.nombre as estadoCivil, c.nombre as comuna, e.nombre as estado
        FROM tbl_paciente AS p
        INNER JOIN tbl_estado_civil AS ec ON ec.id_EstadoCivil=p.estadoCivil_ID
        INNER JOIN tbl_comuna AS c ON c.id_Comuna=p.comuna_ID
        INNER JOIN tbl_estado AS e ON e.id_Estado=p.estado_ID
        INNER JOIN tbl_telefono AS t ON t.Paciente_ID=p.id_Paciente
        WHERE run_Paciente = '$run' 
        AND estado_ID = 1;";

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

        $query = "SELECT id_Paciente,run_Paciente,nombres,apellidoPaterno,apellidoMaterno,
        DATE_FORMAT(fechaNacimiento, '%d/%m/%Y') as fechaNacimiento,
        sexo,participacionSocial,estudio,actividadLaboral,direccionParticular,sector,
        t.fono as fono, ec.nombre as estadoCivil, c.nombre as comuna, e.nombre as estado
        FROM tbl_paciente AS p
        INNER JOIN tbl_estado_civil AS ec ON ec.id_EstadoCivil=p.estadoCivil_ID
        INNER JOIN tbl_comuna AS c ON c.id_Comuna=p.comuna_ID
        INNER JOIN tbl_estado AS e ON e.id_Estado=p.estado_ID
        INNER JOIN tbl_Telefono AS t ON t.Paciente_ID=p.id_Paciente
        WHERE (run_Paciente LIKE '$filtro' OR 
        nombres LIKE '%$filtro%' OR 
        apellidoPaterno LIKE '%$filtro%' OR
        apellidoMaterno LIKE '%$filtro%' OR
        sector LIKE '%$filtro%') 
        AND estado_ID = 1
        ORDER BY 'nombres' ASC;";

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

        $query = "SELECT id_Paciente,run_Paciente,nombres,apellidoPaterno,apellidoMaterno,DATE_FORMAT(fechaNacimiento, '%d/%m/%Y') as fechaNacimiento,
        sexo,participacionSocial,estudio,actividadLaboral,direccionParticular,sector,
        t.fono as fono, ec.nombre as estadoCivil, c.nombre as comuna, e.nombre as estado
        FROM tbl_paciente AS p
        INNER JOIN tbl_estado_civil AS ec ON ec.id_EstadoCivil=p.estadoCivil_ID
        INNER JOIN tbl_comuna AS c ON c.id_Comuna=p.comuna_ID
        INNER JOIN tbl_estado AS e ON e.id_Estado=p.estado_ID
        INNER JOIN tbl_Telefono AS t ON t.Paciente_ID=p.id_Paciente
        WHERE estado_ID = 1;";

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

        $query = "SELECT id_Paciente,run_Paciente,nombres,apellidoPaterno,apellidoMaterno,DATE_FORMAT(fechaNacimiento, '%d/%m/%Y') as fechaNacimiento,
        sexo,participacionSocial,estudio,actividadLaboral,direccionParticular,sector,
        t.fono as fono, ec.nombre as estadoCivil, c.nombre as comuna, e.nombre as estado
        FROM tbl_paciente AS p
        INNER JOIN tbl_estado_civil AS ec ON ec.id_EstadoCivil=p.estadoCivil_ID
        INNER JOIN tbl_comuna AS c ON c.id_Comuna=p.comuna_ID
        INNER JOIN tbl_estado AS e ON e.id_Estado=p.estado_ID
        INNER JOIN tbl_Telefono AS t ON t.Paciente_ID=p.id_Paciente
        WHERE estado_ID = 2;";

        $this->con->conectar();

        $rs = $this->con->ejecutar($query);
        while($obj = $rs->fetch_object()){
            array_push($lista, $obj);
        }
        
        $this->con->desconectar();
        return $lista;
    }

    public function getParametrosClinicos(){
        $lista = array();

        $query = "SELECT * FROM tbl_parametrosclinicos;";

        $u = null;

        $this->c->conectar();

        $rs = $this->c->ejecutar($query);
        if ($obj = $rs->fetch_object()) {
            $u = new ParametrosClinicos();

            $u->setIdParametrosClinicos($obj->idParametrosClinicos);
            $u->setPeso($obj->peso);
            $u->setTalla($obj->talla);
            $u->setIMC($obj->IMC);
            $u->setDiagnosticoNutricional($obj->diagnosticoNutricional);
            $u->setPaSistolica($obj->paSistolica);
            $u->setPaDistolica($obj->paDistolica);
            $u->setCircunferenciaCintura($obj->circunferenciaCintura);
        }

        $this->c->desconectar();
        return $u;
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

        $query = "SELECT id_Profesional,pro.nombre,es.nombre AS estamento_ID
        FROM tbl_profesional AS pro
        INNER JOIN tbl_estamento as es ON es.id_Estamento=pro.estamento_ID";

        $this->con->conectar();

        $rs = $this->con->ejecutar($query);
        while($obj = $rs->fetch_object()){
            array_push($lista, $obj);
        }
        
        $this->con->desconectar();
        return $lista;
    }


    public function getProfesionalPorFiltro($filtro){
        $lista = array();

        $query = "SELECT id_Profesional, pro.nombre, es.nombre AS estamento_ID
        FROM tbl_profesional AS pro
        INNER JOIN tbl_estamento AS es ON es.id_Estamento = pro.estamento_ID
        WHERE pro.nombre LIKE '%$filtro%' OR es.nombre LIKE '%$filtro%'";

        $this->con->conectar();

        $rs = $this->con->ejecutar($query);
        while($obj = $rs->fetch_object()){
            array_push($lista, $obj);
        }

        $this->con->desconectar();
        return $lista;
    }

    public function getProfesionalBusqueda($nombre){
        $query = "SELECT nombre FROM tbl_profesional WHERE nombre = '$nombre'";

        $pro = null;

        $this->con->conectar();

        $rs = $this->con->ejecutar($query);
        if ($obj = $rs->fetch_object()) {
            $pro = new Profesional();

            $pro->setNombreProfesional($obj->nombreProfesional);
        }

        $this->con->desconectar();
        return $pro;
    }

    public function prueba(){
        $lista = array();

        $query = "SELECT 
t.fechaAtencion,
t.id_Paciente,
t.profesional_ID,
pro.nombre,
te.fechaExamen,
te.valor,
te.Tarjeton_ID
FROM tbl_tarjeton AS t
LEFT JOIN tbl_profesional AS pro ON t.profesional_ID = pro.id_Profesional
LEFT JOIN tbl_tipoexamenes AS te ON t.id_Tarjeton = te.Tarjeton_ID";

        $this->con->conectar();
        $rs = $this->con->ejecutar($query);

        while ($obj = mysqli_fetch_array($rs)) {
            array_push($lista,$obj);
        }

        $this->con->desconectar();
        return $lista;
    }

    public function getTarjeton($id){
        $lista = array();

        $query = "SELECT * FROM getTarjeton WHERE id_Paciente = $id";

        $rs = $this->con2->execute($query);

        while($obj = $rs->fetch_object()){
            array_push($lista, $obj);
        }

        return $lista;
     }

    public function getTelefono(){
        $lista = array();

        $query = "SELECT * FROM tbl_telefono;";

        $u = null;

        $this->c->conectar();

        $rs = $this->c->ejecutar($query);
        if ($obj = mysqli_fetch_object($rs)) {
            $u = new Telefono();

            $u->setIdTelefono($obj->idTelefono);
            $u->setFonoTelefono($obj->fonoTelefono);
            $u->setRun_Paciente($obj->run_Paciente);
        }

        $this->c->desconectar();
        return $u;
    }

    public function getTipoExamenes(){
        $lista = array();

        $query = "SELECT * FROM tbl_tipoexamenes;";

        $u = null;

        $this->c->conectar();

        $rs = $this->c->ejecutar($query);
        if ($obj = $rs->fetch_object()) {
            $u = new TipoExamen();

            $u->setIdTipoExamen($obj->idTelefono);
            $u->setIdListadoExamen($obj->idListadoExamen);
            $u->setFechaTipoExamen($obj->fonoTelefono);
            $u->setValorTipoExamen($obj->valorTipoExamen);
            $u->setIdTarjeton($obj->idTarjeton);
        }

        $this->c->desconectar();
        return $u;
    }

    public function getTratamientoCardiaco(){
        $lista = array();

        $query = "SELECT * FROM tbl_tratamientocardiaco;";

        $u = null;

        $this->c->conectar();

        $rs = $this->c->ejecutar($query);
        if ($obj = $rs->fetch_object()) {
            $u = new TratamientoCardiaco();

            $u->setIdTTOCardiaco($obj->idTTOCardiaco);
            $u->setEstaninas($obj->estatinas);
            $u->setAAS100($obj->AAS100);
            $u->setIdTarjeton($obj->idTarjeton);
        }

        $this->c->desconectar();
        return $u;
    }

    public function getUsuarioAdultoMayor(){
        $lista = array();

        $query = "SELECT * FROM tbl_usuarioadultomayor;";

        $u = null;

        $this->c->conectar();

        $rs = $this->c->ejecutar($query);
        if ($obj = $rs->fetch_object()) {
            $u = new UsuarioAdultoMayor();

            $u->setIdUsuAdultoMayor($obj->idUsuAdultoMayor);
            $u->setAutovalente($obj->autovalente);
            $u->setAutovalenteConRiesgo($obj->autovalenteConRiesgo);
            $u->setRiesgoDependencia($obj->riesgoDependencia);
            $u->setDependencia($obj->dependencia);
            $u->setIdTarjeton($obj->idTarjeton);
        }

        $this->c->desconectar();
        return $u;
    }

/*ACTUALIZAR TABLAS
    public function actualizarParametrosClinicos($ParametrosClinicos){
        $update = "UPDATE tbl_parametrosclinicos SET peso='', talla='', IMC,='', diagnosticoNutricional=''";
    }
    */

//ELIMINAR/ACTIVAR TABLAS
/*Estados: 1 Activo - 2 Pasivo*/

    public function eliminarPaciente($runPaciente){
        $delete = "update tbl_paciente set estado_ID = 2 where run_Paciente = '$runPaciente'";
        
        $this->con->conectar();
        $this->con->ejecutar($delete);
        $this->con->desconectar();
    }

    public function eliminarTarjeton($id){
        $delete = "update tbl_tarjeton set estado = 2 where id = $id";

        $this->con->conectar();
        $this->con->ejecutar($delete);
        $this->con->desconectar();
    }

    public function activarPaciente($runPaciente){
        $activar = "update tbl_paciente set estado_ID = 1 where run_Paciente = '$runPaciente'";
        
        $this->con->conectar();
        $this->con->ejecutar($activar);
        $this->con->desconectar();
    }

    public function activarTarjeton($id){
        $activar = "update tbl_tarjeton set estado = 1 where id = $id";

        $this->c->conectar();
        $this->c->ejecutar($activar);
        $this->c->desconectar();
    }

// Función que me permite crear paciente obteniendo un objeto de paciente y telefono 
// un array de las patologias y leyendolo con un foreach
    public function crearPacienteTelPat($paciente,$listPatologia,$telefono){
        //creo el paciente
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

        $this->ejecutar($query);

        //Obtengo el último paciente (id)
        $this->con->conectar();

        $query = "SELECT MAX(id_Paciente) AS id FROM tbl_paciente";
        
        $rs = $this->con->ejecutar($query);

        
        $idUltimoPaciente = 0;
        while ($reg = $rs->fetch_object()) {
            $idUltimoPaciente = $reg->id;
        }

        $this->con->desconectar();

        foreach ($listPatologia as $ct) {
            $query = "INSERT INTO tbl_patologiaspacientes 
            VALUES (null,
            '".$ct["fecha"]."',
            ".$ct["id"].",
            ". $idUltimoPaciente.")";
            $this->ejecutar($query);
        }
        $query = "INSERT INTO tbl_telefono VALUES (null,'".$telefono->getFono()."',". $idUltimoPaciente.")";

        $this->ejecutar($query);
    }
}