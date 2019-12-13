create view getTarjeton as
SELECT
t.id_Tarjeton,
t.id_Paciente,
t.fechaAtencion,
pro.id_Profesional,
pro.nombre as nombreProfesional,
o.observacion,
pc.peso,
pc.talla,
pc.IMC,
pc.diagnosticoNutricional,
pc.paSistolica,
pc.paDistolica,
pc.circunferenciaCintura,
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
fdr.insuficienciaRenal,
fdr.IAM,
fdr.ACV,
tc.estatinas,
tc.AAS_100,
uam.autovalente,
uam.autovalenteConRiesgo,
uam.riesgoDependencia,
uam.dependencia,
te.fechaExamen as fechaExamen,
GROUP_CONCAT(le.nombreExamen SEPARATOR '\n') as nombreExamen,
GROUP_CONCAT(CONCAT(FORMAT(te.valor,0)) SEPARATOR '\n') as valor,
t.id_Estado
from tbl_tarjeton as t 
inner join tbl_observacion as o on o.id_Tarjeton = t.id_Tarjeton
inner join tbl_profesional as pro on pro.id_Profesional = t.id_Profesional
inner join tbl_parametrosclinicos as pc on pc.id_Tarjeton = t.id_Tarjeton
inner join tbl_pacientediabetico as pd on pd.id_Tarjeton = t.id_Tarjeton
inner join tbl_factorderiesgo as fdr on fdr.id_Tarjeton = t.id_Tarjeton
inner join tbl_tratamientocardiaco as tc on tc.id_Tarjeton = t.id_Tarjeton
inner join tbl_usuarioadultomayor as uam on uam.id_Tarjeton = t.id_Tarjeton
inner join tbl_tipoexamenes as te on te.id_Tarjeton = t.id_Tarjeton
inner join tbl_listadoexamen as le on le.id_ListaExamen = te.id_ListaExamen
where id_Estado = 1
GROUP BY o.observacion, te.fechaExamen;

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
    ec.id_EstadoCivil,
	ec.nombre as estadoCivil,
    c.id_Comuna,
	c.nombre as comuna,
    e.id_Estado,
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
	INNER JOIN tbl_telefono AS t ON t.id_Paciente=p.id_Paciente
	INNER JOIN tbl_complicacionespacientes AS cp ON cp.id_Paciente=p.id_Paciente
	INNER JOIN tbl_complicacion AS com ON com.id_Complicacion=cp.id_Complicacion
WHERE 
    p.id_Estado = 2;

CREATE VIEW getProfesional AS
SELECT
p.id_Profesional,p.nombre,e.nombre AS estamento
FROM 
tbl_profesional AS p
INNER JOIN tbl_estamento AS e ON p.id_Estamento=e.id_Estamento;