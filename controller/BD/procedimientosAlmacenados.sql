-- Crear atención
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