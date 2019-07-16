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
    te.fechaExamen,
    le.nombreExamen,
    te.valor,
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
    INNER JOIN tbl_profesional AS pro ON pro.id_Profesional = t.profesional_ID
    LEFT JOIN tbl_tipoexamenes AS te ON te.Tarjeton_ID = t.id_Tarjeton
    LEFT JOIN tbl_listadoexamen AS le ON le.id_ListaExamen = te.id_ListaExamen
    LEFT JOIN tbl_factorderiesgo AS fr ON fr.Tarjeton_ID = t.id_Tarjeton
    LEFT JOIN tbl_observacion AS o ON o.Tarjeton_ID = t.id_Tarjeton
    LEFT JOIN tbl_pacientediabetico AS pd ON pd.Tarjeton_ID = t.id_Tarjeton
    LEFT JOIN tbl_parametrosclinicos AS pc ON pc.Tarjeton_ID = t.id_Tarjeton
    LEFT JOIN tbl_tratamientocardiaco AS tc ON tc.Tarjeton_ID = t.id_Tarjeton
    LEFT JOIN tbl_usuarioadultomayor AS uam ON uam.Tarjeton_ID = t.id_Tarjeton;