-- Obtener cantidad por patologia
DELIMITER $$
CREATE PROCEDURE sp_getCantidadPorPatologia(IN patologia varchar(50)) 
BEGIN
SELECT
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
where pat.nombre like patologia) as obtencion;
END $$

-- Crear paciente
DELIMITER $$
CREATE PROCEDURE sp_getPaciente (IN run VARCHAR(10), IN id INT)
BEGIN
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
    p.id_Estado = 1 AND p.run_Paciente = run OR p.id_Paciente = id;
END $$

-- Crear atención
DELIMITER $$
CREATE PROCEDURE sp_getTarjeton (in id int)
BEGIN
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
GROUP_CONCAT(te.id_ListaExamen SEPARATOR '\n') as idExamen,
GROUP_CONCAT(le.nombreExamen SEPARATOR '\n') as nombreExamen,
GROUP_CONCAT(CONCAT(FORMAT(te.valor,0)) SEPARATOR '\n') as valor,
t.id_Estado
FROM tbl_tarjeton as t 
INNER JOIN tbl_observacion as o on o.id_Tarjeton = t.id_Tarjeton
INNER JOIN tbl_profesional as pro on pro.id_Profesional = t.id_Profesional
INNER JOIN tbl_parametrosclinicos as pc on pc.id_Tarjeton = t.id_Tarjeton
INNER JOIN tbl_pacientediabetico as pd on pd.id_Tarjeton = t.id_Tarjeton
INNER JOIN tbl_factorderiesgo as fdr on fdr.id_Tarjeton = t.id_Tarjeton
INNER JOIN tbl_tratamientocardiaco as tc on tc.id_Tarjeton = t.id_Tarjeton
INNER JOIN tbl_usuarioadultomayor as uam on uam.id_Tarjeton = t.id_Tarjeton
INNER JOIN tbl_tipoexamenes as te on te.id_Tarjeton = t.id_Tarjeton
INNER JOIN tbl_listadoexamen as le on le.id_ListaExamen = te.id_ListaExamen
WHERE t.id_Paciente = id AND t.id_Estado = 1
GROUP BY o.observacion, te.fechaExamen;
END $$

delimiter $$
create procedure sp_crearAtencion(
in fechaAtencion date,
in idPaciente int,
in idProfesional int,
in idEstado int,
in observacion varchar(200),
in peso float,
in talla float,
in imc float,
in diagnosticoNutricional int,
in paSistolica int,
in paDistolica int,
in circunferenciaCintura int,
in fechaExamen date,
in valor float,
in idListaExamen int,
in fechaEvPieDiabetico date,
in ptjePieDiabetico int,
in fechaQualidiab date,
in qualidiab bit,
in fechaFondoOjo date,
in resultadoFondoOjo bit,
in enalapril bit,
in losartan bit,
in retinopatiaDiabetica bit,
in amputacion bit,
in insuficienciaRenal int,
in iam int,
in acv int,
in estatinas bit,
in aas100 bit,
in autovalente bit,
in autovalenteConRiesgo bit,
in riesgoDependencia bit,
in dependencia bit)
begin
insert into tbl_tarjeton(id_Tarjeton,fechaAtencion,id_Paciente,id_Profesional,id_Estado) values(null,fechaAtencion,idPaciente,idProfesional,1);
select @idTar := max(id_Tarjeton) from tbl_tarjeton;
insert into tbl_parametrosclinicos(
id_ParametrosClinicos,peso,talla,IMC,diagnosticoNutricional,paSistolica,paDistolica,circunferenciaCintura,id_Tarjeton) 
values(null,peso,talla,imc,diagnosticoNutricional,paSistolica,paDistolica,circunferenciaCintura,@idTar);
insert into tbl_tipoexamenes(id_TipoExamenes,fechaExamen,valor,id_ListaExamen,id_Tarjeton) 
values(null,fechaExamen,valor,idListaExamen,@idTar);
insert into tbl_pacientediabetico(
id_PacienteDiabetico,fechaEvalPieDiabetico,ptjePieDiabetico,fechaQualidiab,qualidiab,fechaFondoOjo,resultadoFondoOjo,enalapril,losartan,retinopatiaDiabetica,amputacion,id_Tarjeton) 
values(
null,fechaEvPieDiabetico,ptjePieDiabetico,fechaQualidiab,qualidiab,fechaFondoOjo,resultadoFondoOjo,enalapril,losartan,retinopatiaDiabetica,amputacion,@idTar);
insert into tbl_factorderiesgo(id_FactorDeRiesgo,insuficienciaRenal,IAM,ACV,id_Tarjeton) values(null,insuficienciaRenal,iam,acv,@idTar);
insert into tbl_tratamientocardiaco(id_TTOCardiaco,estatinas,AAS_100,id_Tarjeton) values(null,estatinas,aas100,@idTar);
insert into tbl_usuarioadultomayor(
id_UsuAdultoMayor,autovalente,autovalenteConRiesgo,riesgoDependencia,dependencia,id_Tarjeton) 
values(null,autovalente,autovalenteConRiesgo,riesgoDependencia,dependencia,@idTar);
insert into tbl_observacion(id_Observacion,observacion,id_Tarjeton) values(null,observacion,@idTar);
end; $$