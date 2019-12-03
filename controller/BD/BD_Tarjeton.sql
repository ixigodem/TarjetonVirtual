CREATE DATABASE DB_TarjetonVirtual;

USE DB_TarjetonVirtual;

CREATE TABLE tbl_estado(
    id_Estado INT AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    PRIMARY KEY(id_Estado)
);

CREATE TABLE tbl_estamento(
    id_Estamento INT AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    PRIMARY KEY(id_Estamento)
);

CREATE TABLE tbl_profesional(
    id_Profesional INT AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    id_Estamento INT NOT NULL,
    PRIMARY KEY(id_Profesional),
    FOREIGN KEY(id_Estamento) REFERENCES tbl_estamento(id_Estamento)
);

CREATE TABLE tbl_estadocivil(
    id_EstadoCivil INT AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    PRIMARY KEY(id_EstadoCivil)
);

CREATE TABLE tbl_comuna(
    id_Comuna INT AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    PRIMARY KEY(id_Comuna)
);

CREATE TABLE tbl_paciente(
    id_Paciente INT AUTO_INCREMENT,
    run_Paciente VARCHAR(10) NOT NULL,
    nombres VARCHAR(50) NOT NULL,
    apellidoPaterno VARCHAR(20) NOT NULL,
    apellidoMaterno VARCHAR(20) NOT NULL,
    fechaNacimiento DATE NOT NULL,
    sexo BIT NOT NULL,
    participacionSocial VARCHAR(100) NOT NULL,
    estudio VARCHAR(100) NOT NULL,
    actividadLaboral VARCHAR(100) NOT NULL,
    direccionParticular VARCHAR(100) NOT NULL,
    sector VARCHAR(10) NOT NULL,
    id_EstadoCivil INT NOT NULL,
    id_Estado INT NOT NULL,
    id_Comuna INT NOT NULL,
    PRIMARY KEY(id_Paciente),
    FOREIGN KEY(id_EstadoCivil) REFERENCES tbl_estadocivil(id_EstadoCivil),
    FOREIGN KEY(id_Estado) REFERENCES tbl_estado(id_Estado),
    FOREIGN KEY(id_Comuna) REFERENCES tbl_comuna(id_Comuna)
);

CREATE TABLE tbl_telefono(
    id_Telefono INT AUTO_INCREMENT,
    fono VARCHAR(15) NOT NULL,
    id_Paciente INT NOT NULL,
    PRIMARY KEY(id_Telefono),
    FOREIGN KEY(id_Paciente) REFERENCES tbl_paciente(id_Paciente)
);

CREATE TABLE tbl_patologia(
    id_Patologia INT AUTO_INCREMENT,
    nombre VARCHAR(100),
    PRIMARY KEY(id_Patologia)
    );

CREATE TABLE tbl_complicacion(
    id_Complicacion INT AUTO_INCREMENT,
    nombre VARCHAR(100),
    PRIMARY KEY(id_Complicacion)
);

CREATE TABLE tbl_tarjeton(
    id_Tarjeton INT AUTO_INCREMENT,
    fechaAtencion DATE NOT NULL,
    id_Paciente INT NOT NULL,
    id_Profesional INT NOT NULL,
    id_Estado INT NOT NULL,
    PRIMARY KEY(id_Tarjeton),
    FOREIGN KEY(id_Paciente) REFERENCES tbl_paciente(id_Paciente),
    FOREIGN KEY(id_Profesional) REFERENCES tbl_profesional(id_Profesional),
    FOREIGN KEY(id_Estado) REFERENCES tbl_estado(id_Estado)
);

CREATE TABLE tbl_pacientediabetico(
    id_PacienteDiabetico INT AUTO_INCREMENT,
    fechaEvalPieDiabetico DATE NOT NULL,
    ptjePieDiabetico INT NOT NULL,
    fechaQualidiab DATE NOT NULL,
    qualidiab BIT NOT NULL,
    fechaFondoOjo DATE NOT NULL,
    resultadoFondoOjo BIT NOT NULL,
    enalapril BIT NOT NULL,
    losartan BIT NOT NULL,
    retinopatiaDiabetica BIT NOT NULL,
    amputacion BIT NOT NULL,
    id_Tarjeton INT NOT NULL,
    PRIMARY KEY(id_PacienteDiabetico),
    FOREIGN KEY(id_Tarjeton) REFERENCES tbl_tarjeton(id_Tarjeton)
);

CREATE TABLE tbl_factorderiesgo(
    id_FactorDeRiesgo INT AUTO_INCREMENT,
    insuficienciaRenal BIT NOT NULL,
    IAM BIT NOT NULL,
    ACV BIT NOT NULL,
    id_Tarjeton INT NOT NULL,
    PRIMARY KEY(id_FactorDeRiesgo),
    FOREIGN KEY(id_Tarjeton) REFERENCES tbl_tarjeton(id_Tarjeton)
);

CREATE TABLE tbl_tratamientocardiaco(
    id_TTOCardiaco INT AUTO_INCREMENT,
    estatinas BIT NOT NULL,
    AAS_100 BIT NOT NULL,
    id_Tarjeton INT NOT NULL,
    PRIMARY KEY(id_TTOCardiaco),
    FOREIGN KEY(id_Tarjeton) REFERENCES tbl_tarjeton(id_Tarjeton)
);

CREATE TABLE tbl_usuarioadultomayor(
    id_UsuAdultoMayor INT AUTO_INCREMENT,
    autovalente BIT NOT NULL,
    autovalenteConRiesgo BIT NOT NULL,
    riesgoDependencia BIT NOT NULL,
    dependencia BIT NOT NULL,
    id_Tarjeton INT NOT NULL,
    PRIMARY KEY(id_UsuAdultoMayor),
    FOREIGN KEY(id_Tarjeton) REFERENCES tbl_tarjeton(id_Tarjeton)
);

CREATE TABLE tbl_observacion(
    id_Observacion INT AUTO_INCREMENT,
    observacion VARCHAR(200) NOT NULL,
    id_Tarjeton INT NOT NULL,
    PRIMARY KEY(id_Observacion),
    FOREIGN KEY(id_Tarjeton) REFERENCES tbl_tarjeton(id_Tarjeton)
);

CREATE TABLE tbl_patologiaspacientes(
    id_PatPacientes INT AUTO_INCREMENT,
    fechaPatologias DATE NOT NULL,
    id_Patologia INT NOT NULL,
    id_Paciente INT NOT NULL,
    PRIMARY KEY(id_PatPacientes),
    FOREIGN KEY(id_Patologia) REFERENCES tbl_patologia(id_Patologia),
    FOREIGN KEY(id_Paciente) REFERENCES tbl_paciente(id_Paciente)
);

CREATE TABLE tbl_complicacionespacientes(
    id_ComplicacionPac INT AUTO_INCREMENT,
    fechaComplicaciones DATE NOT NULL,
    id_Complicacion INT NOT NULL,
    id_Paciente INT NOT NULL,
    PRIMARY KEY(id_ComplicacionPac),
    FOREIGN KEY(id_Complicacion) REFERENCES tbl_complicacion(id_Complicacion),
    FOREIGN KEY(id_Paciente) REFERENCES tbl_paciente(id_Paciente)
);

CREATE TABLE tbl_listadoexamen(
    id_ListaExamen INT AUTO_INCREMENT,
    nombreExamen VARCHAR(100) NOT NULL,
    PRIMARY KEY(id_ListaExamen)
);

CREATE TABLE tbl_tipoexamenes(
    id_TipoExamenes INT AUTO_INCREMENT,
    fechaExamen DATE NOT NULL,
    valor FLOAT NOT NULL,
    id_ListaExamen INT NOT NULL,
    id_Tarjeton INT NOT NULL,
    PRIMARY KEY(id_TipoExamenes),
    FOREIGN KEY(id_ListaExamen) REFERENCES tbl_listadoexamen(id_ListaExamen),
    FOREIGN KEY(id_Tarjeton) REFERENCES tbl_tarjeton(id_Tarjeton)
);

CREATE TABLE tbl_parametrosclinicos(
    id_ParametrosClinicos INT AUTO_INCREMENT,
    peso FLOAT NOT NULL,
    talla FLOAT NOT NULL,
    IMC FLOAT NOT NULL,
    diagnosticoNutricional INT NOT NULL,
    paSistolica INT NOT NULL,
    paDistolica INT NOT NULL,
    circunferenciaCintura INT NOT NULL,
    id_Tarjeton INT NOT NULL,
    PRIMARY KEY(id_ParametrosClinicos),
    FOREIGN KEY(id_Tarjeton) REFERENCES tbl_tarjeton(id_Tarjeton)
);

CREATE TABLE tbl_Log(
    id_Log INT AUTO_INCREMENT,
    ip VARCHAR(15) NOT NULL,
    nombres VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    nombreUsuario VARCHAR(50) NOT NULL,
    fecha DATE NOT NULL,
    suceso INT NOT NULL,
    PRIMARY KEY(id_Log)
);

INSERT INTO tbl_estado VALUES(NULL,'ACTIVO');
INSERT INTO tbl_estado VALUES(NULL,'PASIVO');

INSERT INTO tbl_complicacion VALUES(NULL,'RETINOPATÍA');
INSERT INTO tbl_complicacion VALUES(NULL,'CEGUERA');
INSERT INTO tbl_complicacion VALUES(NULL,'INSUFICIENCIA RENAL');
INSERT INTO tbl_complicacion VALUES(NULL,'PIE DIABÉTICO');
INSERT INTO tbl_complicacion VALUES(NULL,'AMPUTACIÓN');
INSERT INTO tbl_complicacion VALUES(NULL,'HIPERTROFIA VENTRICULAR IZQUIERDA');
INSERT INTO tbl_complicacion VALUES(NULL,'ENFERMEDAD CEREBROVASCULAR');

INSERT INTO tbl_patologia VALUES(NULL,'DIABETES MELLITUS');
INSERT INTO tbl_patologia VALUES(NULL,'HIPERTENSION ARTERIAL');
INSERT INTO tbl_patologia VALUES(NULL,'DISLIPIDEMIAS');
INSERT INTO tbl_patologia VALUES(NULL,'EPOC');
INSERT INTO tbl_patologia VALUES(NULL,'EPILEPSIA');
INSERT INTO tbl_patologia VALUES(NULL,'HIPOTIROIDISMO');
INSERT INTO tbl_patologia VALUES(NULL,'ARTROSIS DE RODILLAS');
INSERT INTO tbl_patologia VALUES(NULL,'ARTROSIS DE CADERAS');
INSERT INTO tbl_patologia VALUES(NULL,'INTOLERANCIA A LA GLUCOSA');
INSERT INTO tbl_patologia VALUES(NULL,'PARKINSON');

INSERT INTO tbl_estamento VALUES(NULL,'MEDICO');
INSERT INTO tbl_estamento VALUES(NULL,'ENFERMERA');
INSERT INTO tbl_estamento VALUES(NULL,'NUTRICIONISTA');
INSERT INTO tbl_estamento VALUES(NULL,'KINESIOLOGO');

INSERT INTO tbl_profesional VALUES
(NULL, 'JORGE VASQUEZ', 1),
(NULL, 'PATRICIA VILLEGAS', 1),
(NULL, 'NORMA RODRIGUEZ', 2);

INSERT INTO tbl_estadocivil VALUES(NULL,'SOLTERO(A)');
INSERT INTO tbl_estadocivil VALUES(NULL,'CASADO(A)');
INSERT INTO tbl_estadocivil VALUES(NULL,'VIUDO(A)');
INSERT INTO tbl_estadocivil VALUES(NULL,'SEPARADO(A)');

INSERT INTO tbl_listadoexamen VALUES(NULL,'HEMOGLOBINA GLICOSILADA');
INSERT INTO tbl_listadoexamen VALUES(NULL,'GLICEMIA');
INSERT INTO tbl_listadoexamen VALUES(NULL,'CREATININEMIA');
INSERT INTO tbl_listadoexamen VALUES(NULL,'COLESTEROL T./HDL');
INSERT INTO tbl_listadoexamen VALUES(NULL,'COLESTEROL HDL');
INSERT INTO tbl_listadoexamen VALUES(NULL,'COLESTEROL LDL');
INSERT INTO tbl_listadoexamen VALUES(NULL,'COLESTEROL VLDL');
INSERT INTO tbl_listadoexamen VALUES(NULL,'TRIGLICÉRIDOS');
INSERT INTO tbl_listadoexamen VALUES(NULL,'MAU/CREAT(RAC)');
INSERT INTO tbl_listadoexamen VALUES(NULL,'VFG');
INSERT INTO tbl_listadoexamen VALUES(NULL,'PAUTA ERC');
INSERT INTO tbl_listadoexamen VALUES(NULL,'HORMONA TIROESTIMULANTE(TSH)');
INSERT INTO tbl_listadoexamen VALUES(NULL,'HORMONA TIROXINA LIBRE(T4L)');
INSERT INTO tbl_listadoexamen VALUES(NULL,'RPR');
INSERT INTO tbl_listadoexamen VALUES(NULL,'HEMOGRAMA');
INSERT INTO tbl_listadoexamen VALUES(NULL,'HEMATOCRITO');
INSERT INTO tbl_listadoexamen VALUES(NULL,'NITRÓGENO UREICO');
INSERT INTO tbl_listadoexamen VALUES(NULL,'ACIDO URICO');
INSERT INTO tbl_listadoexamen VALUES(NULL,'HEMOGLOBINA CORPUSCULAR MEDIA');

INSERT INTO tbl_comuna VALUES(NULL,'Alto Bío Bío');
INSERT INTO tbl_comuna VALUES(NULL,'Alto del Carmen');
INSERT INTO tbl_comuna VALUES(NULL,'Algarrobo');
INSERT INTO tbl_comuna VALUES(NULL,'Alhué');
INSERT INTO tbl_comuna VALUES(NULL,'Alto Hospicio');
INSERT INTO tbl_comuna VALUES(NULL,'Ancud');
INSERT INTO tbl_comuna VALUES(NULL,'Andacollo');
INSERT INTO tbl_comuna VALUES(NULL,'Angol');
INSERT INTO tbl_comuna VALUES(NULL,'Antártica');
INSERT INTO tbl_comuna VALUES(NULL,'Antofagasta');
INSERT INTO tbl_comuna VALUES(NULL,'Antuco');
INSERT INTO tbl_comuna VALUES(NULL,'Arauco');
INSERT INTO tbl_comuna VALUES(NULL,'Arica');
INSERT INTO tbl_comuna VALUES(NULL,'Aysén');
INSERT INTO tbl_comuna VALUES(NULL,'Buin');
INSERT INTO tbl_comuna VALUES(NULL,'Bulnes');
INSERT INTO tbl_comuna VALUES(NULL,'Cabildo');
INSERT INTO tbl_comuna VALUES(NULL,'Cabo de Hornos');
INSERT INTO tbl_comuna VALUES(NULL,'Cabrero');
INSERT INTO tbl_comuna VALUES(NULL,'Calama');
INSERT INTO tbl_comuna VALUES(NULL,'Calbuco');
INSERT INTO tbl_comuna VALUES(NULL,'Caldera');
INSERT INTO tbl_comuna VALUES(NULL,'Calera de Tango');
INSERT INTO tbl_comuna VALUES(NULL,'Calle Larga');
INSERT INTO tbl_comuna VALUES(NULL,'Camarones');
INSERT INTO tbl_comuna VALUES(NULL,'Camiña');
INSERT INTO tbl_comuna VALUES(NULL,'Canela');
INSERT INTO tbl_comuna VALUES(NULL,'Cañete');
INSERT INTO tbl_comuna VALUES(NULL,'Carahue');
INSERT INTO tbl_comuna VALUES(NULL,'Cartagena');
INSERT INTO tbl_comuna VALUES(NULL,'Casablanca');
INSERT INTO tbl_comuna VALUES(NULL,'Castro');
INSERT INTO tbl_comuna VALUES(NULL,'Catemu');
INSERT INTO tbl_comuna VALUES(NULL,'Cauquenes');
INSERT INTO tbl_comuna VALUES(NULL,'Cerrillos');
INSERT INTO tbl_comuna VALUES(NULL,'Cerro Navia');
INSERT INTO tbl_comuna VALUES(NULL,'Chaitén');
INSERT INTO tbl_comuna VALUES(NULL,'Chanco');
INSERT INTO tbl_comuna VALUES(NULL,'Chañaral');
INSERT INTO tbl_comuna VALUES(NULL,'Chépica');
INSERT INTO tbl_comuna VALUES(NULL,'Chiguayante');
INSERT INTO tbl_comuna VALUES(NULL,'Chile Chico');
INSERT INTO tbl_comuna VALUES(NULL,'Chillán');
INSERT INTO tbl_comuna VALUES(NULL,'Chillán Viejo');
INSERT INTO tbl_comuna VALUES(NULL,'Chimbarongo');
INSERT INTO tbl_comuna VALUES(NULL,'Chol Chol');
INSERT INTO tbl_comuna VALUES(NULL,'Chonchi');
INSERT INTO tbl_comuna VALUES(NULL,'Cisnes');
INSERT INTO tbl_comuna VALUES(NULL,'Cobquecura');
INSERT INTO tbl_comuna VALUES(NULL,'Cochamó');
INSERT INTO tbl_comuna VALUES(NULL,'Cochrane');
INSERT INTO tbl_comuna VALUES(NULL,'Codegua');
INSERT INTO tbl_comuna VALUES(NULL,'Coelemu');
INSERT INTO tbl_comuna VALUES(NULL,'Coihueco');
INSERT INTO tbl_comuna VALUES(NULL,'Coinco');
INSERT INTO tbl_comuna VALUES(NULL,'Colbún');
INSERT INTO tbl_comuna VALUES(NULL,'Colchane');
INSERT INTO tbl_comuna VALUES(NULL,'Colina');
INSERT INTO tbl_comuna VALUES(NULL,'Collipulli');
INSERT INTO tbl_comuna VALUES(NULL,'Coltauco');
INSERT INTO tbl_comuna VALUES(NULL,'Combarbalá');
INSERT INTO tbl_comuna VALUES(NULL,'Concepción');
INSERT INTO tbl_comuna VALUES(NULL,'Conchalí');
INSERT INTO tbl_comuna VALUES(NULL,'Concón');
INSERT INTO tbl_comuna VALUES(NULL,'Constitución');
INSERT INTO tbl_comuna VALUES(NULL,'Contulmo');
INSERT INTO tbl_comuna VALUES(NULL,'Copiapó');
INSERT INTO tbl_comuna VALUES(NULL,'Coquimbo');
INSERT INTO tbl_comuna VALUES(NULL,'Coronel');
INSERT INTO tbl_comuna VALUES(NULL,'Corral');
INSERT INTO tbl_comuna VALUES(NULL,'Coyhaique');
INSERT INTO tbl_comuna VALUES(NULL,'Cunco');
INSERT INTO tbl_comuna VALUES(NULL,'Curacautín');
INSERT INTO tbl_comuna VALUES(NULL,'Curacaví');
INSERT INTO tbl_comuna VALUES(NULL,'Curaco de Vélez');
INSERT INTO tbl_comuna VALUES(NULL,'Curanilahue');
INSERT INTO tbl_comuna VALUES(NULL,'Curarrehue');
INSERT INTO tbl_comuna VALUES(NULL,'Curepto');
INSERT INTO tbl_comuna VALUES(NULL,'Curicó');
INSERT INTO tbl_comuna VALUES(NULL,'Dalcahue');
INSERT INTO tbl_comuna VALUES(NULL,'Diego de Almagro');
INSERT INTO tbl_comuna VALUES(NULL,'Doñihue');
INSERT INTO tbl_comuna VALUES(NULL,'El Bosque');
INSERT INTO tbl_comuna VALUES(NULL,'El Carmen');
INSERT INTO tbl_comuna VALUES(NULL,'El Monte');
INSERT INTO tbl_comuna VALUES(NULL,'El Quisco');
INSERT INTO tbl_comuna VALUES(NULL,'El Tabo');
INSERT INTO tbl_comuna VALUES(NULL,'Empedrado');
INSERT INTO tbl_comuna VALUES(NULL,'Ercilla');
INSERT INTO tbl_comuna VALUES(NULL,'Estación Central');
INSERT INTO tbl_comuna VALUES(NULL,'Florida');
INSERT INTO tbl_comuna VALUES(NULL,'Freire');
INSERT INTO tbl_comuna VALUES(NULL,'Freirina');
INSERT INTO tbl_comuna VALUES(NULL,'Fresia');
INSERT INTO tbl_comuna VALUES(NULL,'Frutillar');
INSERT INTO tbl_comuna VALUES(NULL,'Futaleufú');
INSERT INTO tbl_comuna VALUES(NULL,'Futrono');
INSERT INTO tbl_comuna VALUES(NULL,'Galvarino');
INSERT INTO tbl_comuna VALUES(NULL,'General Lagos');
INSERT INTO tbl_comuna VALUES(NULL,'Gorbea');
INSERT INTO tbl_comuna VALUES(NULL,'Graneros');
INSERT INTO tbl_comuna VALUES(NULL,'Guaitecas');
INSERT INTO tbl_comuna VALUES(NULL,'Hijuelas');
INSERT INTO tbl_comuna VALUES(NULL,'Hualaihué');
INSERT INTO tbl_comuna VALUES(NULL,'Hualañé');
INSERT INTO tbl_comuna VALUES(NULL,'Hualpén');
INSERT INTO tbl_comuna VALUES(NULL,'Hualqui');
INSERT INTO tbl_comuna VALUES(NULL,'Huara');
INSERT INTO tbl_comuna VALUES(NULL,'Huasco');
INSERT INTO tbl_comuna VALUES(NULL,'Huechuraba');
INSERT INTO tbl_comuna VALUES(NULL,'Illapel');
INSERT INTO tbl_comuna VALUES(NULL,'Independencia');
INSERT INTO tbl_comuna VALUES(NULL,'Iquique');
INSERT INTO tbl_comuna VALUES(NULL,'Isla de Maipo');
INSERT INTO tbl_comuna VALUES(NULL,'Isla de Pascua');
INSERT INTO tbl_comuna VALUES(NULL,'Juan Fernández');
INSERT INTO tbl_comuna VALUES(NULL,'La Calera');
INSERT INTO tbl_comuna VALUES(NULL,'La Cisterna');
INSERT INTO tbl_comuna VALUES(NULL,'La Cruz');
INSERT INTO tbl_comuna VALUES(NULL,'La Estrella');
INSERT INTO tbl_comuna VALUES(NULL,'La Florida');
INSERT INTO tbl_comuna VALUES(NULL,'La Granja');
INSERT INTO tbl_comuna VALUES(NULL,'La Higuera');
INSERT INTO tbl_comuna VALUES(NULL,'La Ligua');
INSERT INTO tbl_comuna VALUES(NULL,'La Pintana');
INSERT INTO tbl_comuna VALUES(NULL,'La Reina');
INSERT INTO tbl_comuna VALUES(NULL,'La Serena');
INSERT INTO tbl_comuna VALUES(NULL,'La Unión');
INSERT INTO tbl_comuna VALUES(NULL,'Lago Ranco');
INSERT INTO tbl_comuna VALUES(NULL,'Lago Verde');
INSERT INTO tbl_comuna VALUES(NULL,'Laguna Blanca');
INSERT INTO tbl_comuna VALUES(NULL,'Laja');
INSERT INTO tbl_comuna VALUES(NULL,'Lampa');
INSERT INTO tbl_comuna VALUES(NULL,'Lanco');
INSERT INTO tbl_comuna VALUES(NULL,'Las Cabras');
INSERT INTO tbl_comuna VALUES(NULL,'Las Condes');
INSERT INTO tbl_comuna VALUES(NULL,'Lautaro');
INSERT INTO tbl_comuna VALUES(NULL,'Lebu');
INSERT INTO tbl_comuna VALUES(NULL,'Licantén');
INSERT INTO tbl_comuna VALUES(NULL,'Limache');
INSERT INTO tbl_comuna VALUES(NULL,'Linares');
INSERT INTO tbl_comuna VALUES(NULL,'Litueche');
INSERT INTO tbl_comuna VALUES(NULL,'Llanquihue');
INSERT INTO tbl_comuna VALUES(NULL,'Llay Llay');
INSERT INTO tbl_comuna VALUES(NULL,'Lo Barnechea');
INSERT INTO tbl_comuna VALUES(NULL,'Lo Espejo');
INSERT INTO tbl_comuna VALUES(NULL,'Lo Prado');
INSERT INTO tbl_comuna VALUES(NULL,'Lolol');
INSERT INTO tbl_comuna VALUES(NULL,'Loncoche');
INSERT INTO tbl_comuna VALUES(NULL,'Longaví');
INSERT INTO tbl_comuna VALUES(NULL,'Lonquimay');
INSERT INTO tbl_comuna VALUES(NULL,'Los Álamos');
INSERT INTO tbl_comuna VALUES(NULL,'Los Andes');
INSERT INTO tbl_comuna VALUES(NULL,'Los Ángeles');
INSERT INTO tbl_comuna VALUES(NULL,'Los Lagos');
INSERT INTO tbl_comuna VALUES(NULL,'Los Muermos');
INSERT INTO tbl_comuna VALUES(NULL,'Los Sauces');
INSERT INTO tbl_comuna VALUES(NULL,'Los Vilos');
INSERT INTO tbl_comuna VALUES(NULL,'Lota');
INSERT INTO tbl_comuna VALUES(NULL,'Lumaco');
INSERT INTO tbl_comuna VALUES(NULL,'Machalí');
INSERT INTO tbl_comuna VALUES(NULL,'Macul');
INSERT INTO tbl_comuna VALUES(NULL,'Máfil');
INSERT INTO tbl_comuna VALUES(NULL,'Maipú');
INSERT INTO tbl_comuna VALUES(NULL,'Malloa');
INSERT INTO tbl_comuna VALUES(NULL,'Marchigüe');
INSERT INTO tbl_comuna VALUES(NULL,'María Elena');
INSERT INTO tbl_comuna VALUES(NULL,'María Pinto');
INSERT INTO tbl_comuna VALUES(NULL,'Mariquina');
INSERT INTO tbl_comuna VALUES(NULL,'Maule');
INSERT INTO tbl_comuna VALUES(NULL,'Maullín');
INSERT INTO tbl_comuna VALUES(NULL,'Mejillones');
INSERT INTO tbl_comuna VALUES(NULL,'Melipeuco');
INSERT INTO tbl_comuna VALUES(NULL,'Melipilla');
INSERT INTO tbl_comuna VALUES(NULL,'Molina');
INSERT INTO tbl_comuna VALUES(NULL,'Monte Patria');
INSERT INTO tbl_comuna VALUES(NULL,'Mostazal');
INSERT INTO tbl_comuna VALUES(NULL,'Mulchén');
INSERT INTO tbl_comuna VALUES(NULL,'Nacimiento');
INSERT INTO tbl_comuna VALUES(NULL,'Nancagua');
INSERT INTO tbl_comuna VALUES(NULL,'Navidad');
INSERT INTO tbl_comuna VALUES(NULL,'Negrete');
INSERT INTO tbl_comuna VALUES(NULL,'Ninhue');
INSERT INTO tbl_comuna VALUES(NULL,'Nogales');
INSERT INTO tbl_comuna VALUES(NULL,'Nueva Imperial');
INSERT INTO tbl_comuna VALUES(NULL,'Ñiquén');
INSERT INTO tbl_comuna VALUES(NULL,'Ñuñoa');
INSERT INTO tbl_comuna VALUES(NULL,'O’Higgins');
INSERT INTO tbl_comuna VALUES(NULL,'Olivar');
INSERT INTO tbl_comuna VALUES(NULL,'Ollagüe');
INSERT INTO tbl_comuna VALUES(NULL,'Olmué');
INSERT INTO tbl_comuna VALUES(NULL,'Osorno');
INSERT INTO tbl_comuna VALUES(NULL,'Ovalle');
INSERT INTO tbl_comuna VALUES(NULL,'Padre Hurtado');
INSERT INTO tbl_comuna VALUES(NULL,'Padre Las Casas');
INSERT INTO tbl_comuna VALUES(NULL,'Paihuano');
INSERT INTO tbl_comuna VALUES(NULL,'Paillaco');
INSERT INTO tbl_comuna VALUES(NULL,'Paine');
INSERT INTO tbl_comuna VALUES(NULL,'Palena');
INSERT INTO tbl_comuna VALUES(NULL,'Palmilla');
INSERT INTO tbl_comuna VALUES(NULL,'Panguipulli');
INSERT INTO tbl_comuna VALUES(NULL,'Panquehue');
INSERT INTO tbl_comuna VALUES(NULL,'Papudo');
INSERT INTO tbl_comuna VALUES(NULL,'Paredones');
INSERT INTO tbl_comuna VALUES(NULL,'Parral');
INSERT INTO tbl_comuna VALUES(NULL,'Pedro Aguirre Cerda');
INSERT INTO tbl_comuna VALUES(NULL,'Pelarco');
INSERT INTO tbl_comuna VALUES(NULL,'Pelluhue');
INSERT INTO tbl_comuna VALUES(NULL,'Pemuco');
INSERT INTO tbl_comuna VALUES(NULL,'Pencahue');
INSERT INTO tbl_comuna VALUES(NULL,'Penco');
INSERT INTO tbl_comuna VALUES(NULL,'Peñaflor');
INSERT INTO tbl_comuna VALUES(NULL,'Peñalolén');
INSERT INTO tbl_comuna VALUES(NULL,'Peralillo');
INSERT INTO tbl_comuna VALUES(NULL,'Perquenco');
INSERT INTO tbl_comuna VALUES(NULL,'Petorca');
INSERT INTO tbl_comuna VALUES(NULL,'Peumo');
INSERT INTO tbl_comuna VALUES(NULL,'Pica');
INSERT INTO tbl_comuna VALUES(NULL,'Pichidegua');
INSERT INTO tbl_comuna VALUES(NULL,'Pichilemu');
INSERT INTO tbl_comuna VALUES(NULL,'Pinto');
INSERT INTO tbl_comuna VALUES(NULL,'Pirque');
INSERT INTO tbl_comuna VALUES(NULL,'Pitrufquén');
INSERT INTO tbl_comuna VALUES(NULL,'Placilla');
INSERT INTO tbl_comuna VALUES(NULL,'Portezuelo');
INSERT INTO tbl_comuna VALUES(NULL,'Porvenir');
INSERT INTO tbl_comuna VALUES(NULL,'Pozo Almonte');
INSERT INTO tbl_comuna VALUES(NULL,'Primavera');
INSERT INTO tbl_comuna VALUES(NULL,'Providencia');
INSERT INTO tbl_comuna VALUES(NULL,'Puchuncaví');
INSERT INTO tbl_comuna VALUES(NULL,'Pucón');
INSERT INTO tbl_comuna VALUES(NULL,'Pudahuel');
INSERT INTO tbl_comuna VALUES(NULL,'Puente Alto');
INSERT INTO tbl_comuna VALUES(NULL,'Puerto Montt');
INSERT INTO tbl_comuna VALUES(NULL,'Puerto Natales');
INSERT INTO tbl_comuna VALUES(NULL,'Puerto Octay');
INSERT INTO tbl_comuna VALUES(NULL,'Puerto Varas');
INSERT INTO tbl_comuna VALUES(NULL,'Pumanque');
INSERT INTO tbl_comuna VALUES(NULL,'Punitaqui');
INSERT INTO tbl_comuna VALUES(NULL,'Punta Arenas');
INSERT INTO tbl_comuna VALUES(NULL,'Puqueldón');
INSERT INTO tbl_comuna VALUES(NULL,'Purén');
INSERT INTO tbl_comuna VALUES(NULL,'Purranque');
INSERT INTO tbl_comuna VALUES(NULL,'Putaendo');
INSERT INTO tbl_comuna VALUES(NULL,'Putre');
INSERT INTO tbl_comuna VALUES(NULL,'Puyehue');
INSERT INTO tbl_comuna VALUES(NULL,'Queilén');
INSERT INTO tbl_comuna VALUES(NULL,'Quellón');
INSERT INTO tbl_comuna VALUES(NULL,'Quemchi');
INSERT INTO tbl_comuna VALUES(NULL,'Quilaco');
INSERT INTO tbl_comuna VALUES(NULL,'Quilicura');
INSERT INTO tbl_comuna VALUES(NULL,'Quilleco');
INSERT INTO tbl_comuna VALUES(NULL,'Quillón');
INSERT INTO tbl_comuna VALUES(NULL,'Quillota');
INSERT INTO tbl_comuna VALUES(NULL,'Quilpué');
INSERT INTO tbl_comuna VALUES(NULL,'Quinchao');
INSERT INTO tbl_comuna VALUES(NULL,'Quinta de Tilcoco');
INSERT INTO tbl_comuna VALUES(NULL,'Quinta Normal');
INSERT INTO tbl_comuna VALUES(NULL,'Quintero');
INSERT INTO tbl_comuna VALUES(NULL,'Quirihue');
INSERT INTO tbl_comuna VALUES(NULL,'Rancagua');
INSERT INTO tbl_comuna VALUES(NULL,'Ránquil');
INSERT INTO tbl_comuna VALUES(NULL,'Rauco');
INSERT INTO tbl_comuna VALUES(NULL,'Recoleta');
INSERT INTO tbl_comuna VALUES(NULL,'Renaico');
INSERT INTO tbl_comuna VALUES(NULL,'Renca');
INSERT INTO tbl_comuna VALUES(NULL,'Rengo');
INSERT INTO tbl_comuna VALUES(NULL,'Requínoa');
INSERT INTO tbl_comuna VALUES(NULL,'Retiro');
INSERT INTO tbl_comuna VALUES(NULL,'Rinconada');
INSERT INTO tbl_comuna VALUES(NULL,'Río Bueno');
INSERT INTO tbl_comuna VALUES(NULL,'Río Claro');
INSERT INTO tbl_comuna VALUES(NULL,'Río Hurtado');
INSERT INTO tbl_comuna VALUES(NULL,'Río Negro');
INSERT INTO tbl_comuna VALUES(NULL,'Río Negro');
INSERT INTO tbl_comuna VALUES(NULL,'Río Verde');
INSERT INTO tbl_comuna VALUES(NULL,'Romeral');
INSERT INTO tbl_comuna VALUES(NULL,'Saavedra');
INSERT INTO tbl_comuna VALUES(NULL,'Sagrada Familia');
INSERT INTO tbl_comuna VALUES(NULL,'Salamanca');
INSERT INTO tbl_comuna VALUES(NULL,'San Antonio');
INSERT INTO tbl_comuna VALUES(NULL,'San Bernardo');
INSERT INTO tbl_comuna VALUES(NULL,'San Carlos');
INSERT INTO tbl_comuna VALUES(NULL,'San Clemente');
INSERT INTO tbl_comuna VALUES(NULL,'San Esteban');
INSERT INTO tbl_comuna VALUES(NULL,'San Fabián');
INSERT INTO tbl_comuna VALUES(NULL,'San Felipe');
INSERT INTO tbl_comuna VALUES(NULL,'San Fernando');
INSERT INTO tbl_comuna VALUES(NULL,'San Gregorio');
INSERT INTO tbl_comuna VALUES(NULL,'San Ignacio');
INSERT INTO tbl_comuna VALUES(NULL,'San Javier');
INSERT INTO tbl_comuna VALUES(NULL,'San Joaquín');
INSERT INTO tbl_comuna VALUES(NULL,'San José de Maipo');
INSERT INTO tbl_comuna VALUES(NULL,'San Juan de la Costa');
INSERT INTO tbl_comuna VALUES(NULL,'San Miguel');
INSERT INTO tbl_comuna VALUES(NULL,'San Nicolás');
INSERT INTO tbl_comuna VALUES(NULL,'San Pablo');
INSERT INTO tbl_comuna VALUES(NULL,'San Pedro');
INSERT INTO tbl_comuna VALUES(NULL,'San Pedro de Atacama');
INSERT INTO tbl_comuna VALUES(NULL,'San Pedro de la Paz');
INSERT INTO tbl_comuna VALUES(NULL,'San Rafael');
INSERT INTO tbl_comuna VALUES(NULL,'San Ramón');
INSERT INTO tbl_comuna VALUES(NULL,'San Rosendo');
INSERT INTO tbl_comuna VALUES(NULL,'San Vicente de Tagua Tagua');
INSERT INTO tbl_comuna VALUES(NULL,'Santa Bárbara');
INSERT INTO tbl_comuna VALUES(NULL,'Santa Cruz');
INSERT INTO tbl_comuna VALUES(NULL,'Santa Juana');
INSERT INTO tbl_comuna VALUES(NULL,'Santa María');
INSERT INTO tbl_comuna VALUES(NULL,'Santiago');
INSERT INTO tbl_comuna VALUES(NULL,'Santo Domingo');
INSERT INTO tbl_comuna VALUES(NULL,'Sierra Gorda');
INSERT INTO tbl_comuna VALUES(NULL,'Talagante');
INSERT INTO tbl_comuna VALUES(NULL,'Talca');
INSERT INTO tbl_comuna VALUES(NULL,'Talcahuano');
INSERT INTO tbl_comuna VALUES(NULL,'Taltal');
INSERT INTO tbl_comuna VALUES(NULL,'Temuco');
INSERT INTO tbl_comuna VALUES(NULL,'Teno');
INSERT INTO tbl_comuna VALUES(NULL,'Teodoro Schmidt');
INSERT INTO tbl_comuna VALUES(NULL,'Tierra Amarilla');
INSERT INTO tbl_comuna VALUES(NULL,'Til Til');
INSERT INTO tbl_comuna VALUES(NULL,'Timaukel');
INSERT INTO tbl_comuna VALUES(NULL,'Tirúa');
INSERT INTO tbl_comuna VALUES(NULL,'Tocopilla');
INSERT INTO tbl_comuna VALUES(NULL,'Toltén');
INSERT INTO tbl_comuna VALUES(NULL,'Tomé');
INSERT INTO tbl_comuna VALUES(NULL,'Torres del Paine');
INSERT INTO tbl_comuna VALUES(NULL,'Tortel');
INSERT INTO tbl_comuna VALUES(NULL,'Traiguén');
INSERT INTO tbl_comuna VALUES(NULL,'Trehuaco');
INSERT INTO tbl_comuna VALUES(NULL,'Tucapel');
INSERT INTO tbl_comuna VALUES(NULL,'Valdivia');
INSERT INTO tbl_comuna VALUES(NULL,'Vallenar');
INSERT INTO tbl_comuna VALUES(NULL,'Valparaíso');
INSERT INTO tbl_comuna VALUES(NULL,'Vichuquén');
INSERT INTO tbl_comuna VALUES(NULL,'Victoria');
INSERT INTO tbl_comuna VALUES(NULL,'Vicuña');
INSERT INTO tbl_comuna VALUES(NULL,'Vilcún');
INSERT INTO tbl_comuna VALUES(NULL,'Villa Alegre');
INSERT INTO tbl_comuna VALUES(NULL,'Villa Alemana');
INSERT INTO tbl_comuna VALUES(NULL,'Villarrica');
INSERT INTO tbl_comuna VALUES(NULL,'Viña del Mar');
INSERT INTO tbl_comuna VALUES(NULL,'Vitacura');
INSERT INTO tbl_comuna VALUES(NULL,'Yerbas Buenas');
INSERT INTO tbl_comuna VALUES(NULL,'Yumbel');
INSERT INTO tbl_comuna VALUES(NULL,'Yungay');
INSERT INTO tbl_comuna VALUES(NULL,'Zapallar');

INSERT INTO tbl_paciente VALUES (NULL, '17504702-6', 'DEMIS ADAMO', 'VIDAL ', 'ARRIAZA', '1990-05-07', '', 'IGLESIA', 'ENSEÑANZA INSTITUTO PROFESIONAL', 'TÉCNICO EN INFORMÁTICA', 'PEDRO PRADO #1046 - SANTA CRUZ DE TRIANA', 'VERDE', 2, 1, 261),
INSERT INTO tbl_paciente VALUES (NULL, '18646752-3', 'MARIA JOSE', 'RUZ', 'VIDELA', '1994-05-20', '\0', 'IGLESIA', 'ENSEÑANZA INSTITUTO PROFESIONAL', 'TÉCNICO EN CONTABILIDAD GENERAL', 'PEDRO PRADO #1046 - SANTA CRUZ DE TRIANA', 'AMARILLO', 2, 1, 261);

INSERT INTO tbl_paciente VALUES(NULL, '12234567-8', 'NO', 'SE', 'LLAMA', '1990-05-20', 1, 'JUNTA DE VECINOS', 'ENSEÑANZA MEDIA', 'NO TRABAJO', 'NO VIVE', 'VERDE', 1, 1, 261);

INSERT INTO tbl_patologiaspacientes VALUES
(NULL, '2008-08-30', 6, 1),
(NULL, '2011-01-02', 2, 1),
(NULL, '2011-06-09', 1, 1),
(NULL, '2007-01-04', 10, 2),
(NULL, '2007-03-22', 9, 2),
(NULL, '2010-08-04', 3, 2);

INSERT INTO tbl_tarjeton VALUES
(NULL, '2019-05-06', 1, 1, 1),
(NULL, '2019-06-03', 1, 3, 1);

INSERT INTO tbl_telefono VALUES
(NULL, '+56954199353', 1),
(NULL, '+56981668348', 2);
    
INSERT INTO tbl_tipoexamenes VALUES
(NULL,'2016-07-01',  9, 1,1),
(NULL,'2016-07-01',  1, 3,1), 
(NULL,'2016-07-01',137, 4,1),
(NULL,'2016-07-01', 47, 5,1),
(NULL,'2016-07-01',156, 6,1),
(NULL,'2016-07-01',156, 8,1),
(NULL,'2016-07-01',  1, 9,1),
(NULL,'2016-07-01', 78,10,1),
(NULL,'2016-07-01',  2,11,1);

INSERT INTO tbl_parametrosclinicos VALUES (NULL, 83, 1, 28, 6, 130, 64, 102, 1);

INSERT INTO tbl_usuarioadultomayor VALUES (NULL, '\0', '', '\0', '\0', 1);

INSERT INTO tbl_factorderiesgo VALUES (NULL, 2, 2, 2, 1);

INSERT INTO tbl_observacion VALUES (NULL, 'Este es un paciente prueba', 1);

INSERT INTO tbl_complicacionespacientes VALUES (NULL, '2019-06-02', 6, 1);

INSERT INTO tbl_pacientediabetico
VALUES (NULL, '2016-03-01', 1, '2015-11-01', '\0', '2016-01-03', '\0', '\0', '', '', '', 1);

insert into tbl_tratamientocardiaco values(null,1,1,1);

SELECT * FROM tbl_complicacion;
SELECT * FROM tbl_complicacionespacientes;
SELECT * FROM tbl_comuna;
SELECT * FROM tbl_estadocivil;
SELECT * FROM tbl_estamento;
SELECT * FROM tbl_tipoexamenes;
SELECT * FROM tbl_listadoexamen;
SELECT * FROM tbl_factorderiesgo;
SELECT * FROM tbl_observacion;
SELECT * FROM tbl_paciente;
SELECT * FROM tbl_pacientediabetico;
SELECT * FROM tbl_patologia;
SELECT * FROM tbl_patologiaspacientes;
SELECT * FROM tbl_profesional;
SELECT * FROM tbl_tarjeton;
SELECT * FROM tbl_telefono;
SELECT * FROM tbl_tratamientocardiaco;
SELECT * FROM tbl_usuarioadultomayor;
SELECT * FROM tbl_parametrosclinicos;

DROP DATABASE DB_TarjetonVirtual;