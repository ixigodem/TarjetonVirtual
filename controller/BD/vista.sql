/*
CREATE VIEW getTarjeton AS
SELECT
	t.id_Tarjeton,
    t.fechaAtencion,
    t.id_Paciente,
    pro.nombre AS nombreProfesional,
    o.observacion,
    pc.peso,
    pc.talla,
    pc.IMC,
    pc.diagnosticoNutricional,
    pc.paSistolica,
    pc.paDistolica,
    pc.circunferenciaCintura,
    group_concat(te.fechaExamen, ' - ',le.nombreExamen,' - ',te.valor separator ' \n ') as examenes,
    fr.insuficienciaRenal,
    fr.IAM,
    fr.ACV,
    pd.fechaEvalPieDiabetico,
    pd.ptjePieDiabetico,
    pd.fechaQualidiab,
    pd.qualidiab,
    pd.fechaFondoOjo,
    pd.resultadoFondoOjo,
    pd.enalapril,
    pd.losartan,
    pd.retinopatiaDiabetica,
    pd.amputacion,
    tc.estatinas,
    tc.AAS_100,
    uam.autovalente,
    uam.autovalenteConRiesgo,
    uam.riesgoDependencia,
    uam.dependencia
FROM
    tbl_tarjeton AS t
    INNER JOIN tbl_profesional AS pro ON pro.id_Profesional = t.id_Profesional
    LEFT JOIN tbl_tipoexamenes AS te ON te.id_Tarjeton = t.id_Tarjeton
    LEFT JOIN tbl_listadoexamen AS le ON le.id_ListaExamen = te.id_ListaExamen
    LEFT JOIN tbl_factorderiesgo AS fr ON fr.id_Tarjeton = t.id_Tarjeton
    LEFT JOIN tbl_observacion AS o ON o.id_Tarjeton = t.id_Tarjeton
    LEFT JOIN tbl_pacientediabetico AS pd ON pd.id_Tarjeton = t.id_Tarjeton
    LEFT JOIN tbl_parametrosclinicos AS pc ON pc.id_Tarjeton = t.id_Tarjeton
    LEFT JOIN tbl_tratamientocardiaco AS tc ON tc.id_Tarjeton = t.id_Tarjeton
    LEFT JOIN tbl_usuarioadultomayor AS uam ON uam.id_Tarjeton = t.id_Tarjeton;

CREATE VIEW getPaciente AS
SELECT 
	p.id_Paciente,
	p.run_Paciente,
	p.nombres,
	p.apellidoPaterno,
	p.apellidoMaterno,
	DATE_FORMAT(p.fechaNacimiento, '%d/%m/%Y') as fechaNacimiento,
	p.sexo,p.participacionSocial,
	p.estudio,
	p.actividadLaboral,
	p.direccionParticular,
	p.sector,
	t.fono as fono,
	cp.fechaComplicaciones,
	com.nombre AS nombreComplicaciones,
	ec.nombre as estadoCivil,
	c.nombre as comuna,
	e.nombre as estado
FROM 
    tbl_paciente AS p
	INNER JOIN tbl_estadocivil AS ec ON ec.id_EstadoCivil=p.id_EstadoCivil
	INNER JOIN tbl_comuna AS c ON c.id_Comuna=p.id_Comuna
	INNER JOIN tbl_estado AS e ON e.id_Estado=p.id_Estado
	LEFT JOIN tbl_telefono AS t ON t.id_Paciente=p.id_Paciente
	LEFT JOIN tbl_complicacionespacientes AS cp ON cp.id_Paciente=p.id_Paciente
	LEFT JOIN tbl_complicacion AS com ON com.id_Complicacion=cp.id_Complicacion
WHERE 
    p.id_Estado = 1;

CREATE VIEW getPacientePasivo AS
SELECT 
	p.id_Paciente,
	p.run_Paciente,
	p.nombres,
	p.apellidoPaterno,
	p.apellidoMaterno,
	DATE_FORMAT(p.fechaNacimiento, '%d/%m/%Y') as fechaNacimiento,
	p.sexo,p.participacionSocial,
	p.estudio,
	p.actividadLaboral,
	p.direccionParticular,
	p.sector,
	t.fono as fono,
	cp.fechaComplicaciones,
	com.nombre AS nombreComplicaciones,
	ec.nombre as estadoCivil,
	c.nombre as comuna,
	e.nombre as estado
FROM
    tbl_paciente AS p
	INNER JOIN tbl_estadocivil AS ec ON ec.id_EstadoCivil=p.id_EstadoCivil
	INNER JOIN tbl_comuna AS c ON c.id_Comuna=p.id_Comuna
	INNER JOIN tbl_estado AS e ON e.id_Estado=p.id_Estado
	LEFT JOIN tbl_telefono AS t ON t.id_Paciente=p.id_Paciente
	LEFT JOIN tbl_complicacionespacientes AS cp ON cp.id_Paciente=p.id_Paciente
	LEFT JOIN tbl_complicacion AS com ON com.id_Complicacion=cp.id_Complicacion
WHERE 
    p.id_Estado = 2;
        

select 
p.id_Paciente,
p.run_Paciente,
p.nombres,
p.apellidoPaterno,
p.apellidoMaterno,
DATE_FORMAT(p.fechaNacimiento, '%d/%m/%Y') as fechaNacimiento,
p.sexo,p.participacionSocial,
p.estudio,
p.actividadLaboral,
p.direccionParticular,
p.sector,
c.nombre as comuna,
ec.nombre as estadoCivil,
e.nombre as estado,
t.fono,
cp.fechaComplicaciones,
com.nombre 
from 
tbl_paciente as p
inner join tbl_comuna as c on p.id_Comuna=c.id_Comuna
inner join tbl_estadocivil as ec on p.id_EstadoCivil=ec.id_EstadoCivil
inner join tbl_estado as e on p.id_Estado=e.id_Estado
left join tbl_telefono as t on p.id_Paciente=t.id_Paciente
left join tbl_complicacionespacientes as cp on p.id_Paciente=cp.id_Paciente
left join tbl_complicacion as com on cp.id_Complicacion=com.id_Complicacion
where 
p.id_Estado = 1;

CREATE VIEW getProfesional AS
SELECT
p.id_Profesional,p.nombre,e.nombre AS estamento
FROM 
tbl_profesional AS p
INNER JOIN tbl_estamento AS e ON p.id_Estamento=e.id_Estamento;

*/