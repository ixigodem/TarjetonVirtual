CREATE DATABASE DB_TarjetonVirtual2;

USE DB_TarjetonVirtual2;

CREATE TABLE tbl_Estado(
    id_Estado INT AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    PRIMARY KEY(id_Estado)
);

CREATE TABLE tbl_Estamento(
    id_Estamento INT AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    PRIMARY KEY(id_Estamento)
);

CREATE TABLE tbl_Profesional(
    id_Profesional INT AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    estamento_ID INT NOT NULL,
    PRIMARY KEY(id_Profesional),
    FOREIGN KEY(estamento_ID) REFERENCES tbl_Estamento(id_Estamento)
);

CREATE TABLE tbl_Estado_Civil(
    id_EstadoCivil INT AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    PRIMARY KEY(id_EstadoCivil)
);

CREATE TABLE tbl_Comuna(
    id_Comuna INT AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    PRIMARY KEY(id_Comuna)
);

CREATE TABLE tbl_Paciente(
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
    estadoCivil_ID INT NOT NULL,
    comuna_ID INT NOT NULL,
    estado_ID INT NOT NULL,
    PRIMARY KEY(id_Paciente),
    FOREIGN KEY(estadoCivil_ID) REFERENCES tbl_Estado_Civil(id_EstadoCivil),
    FOREIGN KEY(estado_ID) REFERENCES tbl_Estado(id_Estado),
    FOREIGN KEY(comuna_ID) REFERENCES tbl_Comuna(id_Comuna)
);

CREATE TABLE tbl_Telefono(
    id_Telefono INT AUTO_INCREMENT,
    fono VARCHAR(15) NOT NULL,
    id_Paciente INT NOT NULL,
    PRIMARY KEY(id_Telefono),
    FOREIGN KEY(id_Paciente) REFERENCES tbl_Paciente(id_Paciente)
);

CREATE TABLE tbl_Patologia(
    id_Patologia INT AUTO_INCREMENT,
    nombre VARCHAR(100),
    PRIMARY KEY(id_Patologia)
    );

CREATE TABLE tbl_Complicacion(
    id_Complicacion INT AUTO_INCREMENT,
    nombre VARCHAR(100),
    PRIMARY KEY(id_Complicacion)
);

CREATE TABLE tbl_Tarjeton(
    id_Tarjeton INT AUTO_INCREMENT,
    fechaAtencion DATETIME NOT NULL,
    id_Paciente INT NOT NULL,
    profesional_ID INT NOT NULL,
    estado_ID INT NOT NULL,
    PRIMARY KEY(id_Tarjeton),
    FOREIGN KEY(id_Paciente) REFERENCES tbl_Paciente(id_Paciente),
    FOREIGN KEY(estado_ID) REFERENCES tbl_Estado(id_Estado),
    FOREIGN KEY(profesional_ID) REFERENCES tbl_Profesional(id_Profesional)
);

CREATE TABLE tbl_PacienteDiabetico(
    id_PacienteDiabetico INT AUTO_INCREMENT,
    fechaEvalPieDiabetico DATETIME NOT NULL,
    ptjePieDiabetico INT NOT NULL,
    fechaQualidiab DATE NOT NULL,
    qualidiab BIT NOT NULL,
    fechaFondoOjo DATE NOT NULL,
    resultadoFondoOjo BIT NOT NULL,
    enalapril BIT NOT NULL,
    losartan BIT NOT NULL,
    retinopatiaDiabetica BIT NOT NULL,
    amputacion BIT NOT NULL,
    Tarjeton_ID INT NOT NULL,
    PRIMARY KEY(id_PacienteDiabetico),
    FOREIGN KEY(Tarjeton_ID) REFERENCES tbl_Tarjeton(id_Tarjeton)
);

CREATE TABLE tbl_FactorDeRiesgo(
    id_FactorDeRiesgo INT AUTO_INCREMENT,
    insuficienciaRenal INT NOT NULL,
    IAM INT NOT NULL,
    ACV INT NOT NULL,
    Tarjeton_ID INT NOT NULL,
    PRIMARY KEY(id_FactorDeRiesgo),
    FOREIGN KEY(Tarjeton_ID) REFERENCES tbl_Tarjeton(id_Tarjeton)
);

CREATE TABLE tbl_TratamientoCardiaco(
    id_TTOCardiaco INT AUTO_INCREMENT,
    estatinas BIT NOT NULL,
    AAS_100 BIT NOT NULL,
    Tarjeton_ID INT NOT NULL,
    PRIMARY KEY(id_TTOCardiaco),
    FOREIGN KEY(Tarjeton_ID) REFERENCES tbl_Tarjeton(id_Tarjeton)
);

CREATE TABLE tbl_UsuarioAdultoMayor(
    id_UsuAdultoMayor INT AUTO_INCREMENT,
    autovalente BIT NOT NULL,
    autovalenteConRiesgo BIT NOT NULL,
    riesgoDependencia BIT NOT NULL,
    dependencia BIT NOT NULL,
    Tarjeton_ID INT NOT NULL,
    PRIMARY KEY(id_UsuAdultoMayor),
    FOREIGN KEY(Tarjeton_ID) REFERENCES tbl_Tarjeton(id_Tarjeton)
);

CREATE TABLE tbl_Observacion(
    id_Observacion INT AUTO_INCREMENT,
    observacion VARCHAR(200) NOT NULL,
    Tarjeton_ID INT NOT NULL,
    PRIMARY KEY(id_Observacion),
    FOREIGN KEY(Tarjeton_ID) REFERENCES tbl_Tarjeton(id_Tarjeton)
);

CREATE TABLE tbl_PatologiasPacientes(
    id_PatPacientes INT AUTO_INCREMENT,
    fechaPatologias DATE NOT NULL,
    Patologia_ID INT NOT NULL,
    id_Paciente INT NOT NULL,
    PRIMARY KEY(id_PatPacientes),
    FOREIGN KEY(Patologia_ID) REFERENCES tbl_Patologia(id_Patologia),
    FOREIGN KEY(id_Paciente) REFERENCES tbl_Paciente(id_Paciente)
);

CREATE TABLE tbl_ComplicacionesPacientes(
    id_ComplicacionPac INT AUTO_INCREMENT,
    fechaComplicaciones DATE NOT NULL,
    Complicacion_ID INT NOT NULL,
    id_Paciente INT NOT NULL,
    PRIMARY KEY(id_ComplicacionPac),
    FOREIGN KEY(Complicacion_ID) REFERENCES tbl_Complicacion(id_Complicacion),
    FOREIGN KEY(id_Paciente) REFERENCES tbl_Paciente(id_Paciente)
);

CREATE TABLE tbl_ListadoExamen(
    id_ListaExamen INT AUTO_INCREMENT,
    nombreExamen VARCHAR(100) NOT NULL,
    PRIMARY KEY(id_ListaExamen)
);

CREATE TABLE tbl_TipoExamenes(
    id_TipoExamenes INT AUTO_INCREMENT,
    ListaExamen_ID INT NOT NULL,
    fechaExamen DATE NOT NULL,
    valor FLOAT NOT NULL,
    Tarjeton_ID INT NOT NULL,
    PRIMARY KEY(id_TipoExamenes),
    FOREIGN KEY(ListaExamen_ID) REFERENCES tbl_ListadoExamen(id_ListaExamen),
    FOREIGN KEY(Tarjeton_ID) REFERENCES tbl_Tarjeton(id_Tarjeton)
);

CREATE TABLE tbl_ParametrosClinicos(
    id_ParametrosClinicos INT AUTO_INCREMENT,
    peso FLOAT NOT NULL,
    talla FLOAT NOT NULL,
    IMC FLOAT NOT NULL,
    diagnosticoNutricional INT NOT NULL,
    paSistolica INT NOT NULL,
    paDistolica INT NOT NULL,
    circunferenciaCintura INT NOT NULL,
    Tarjeton_ID INT NOT NULL,
    PRIMARY KEY(id_ParametrosClinicos),
    FOREIGN KEY(Tarjeton_ID) REFERENCES tbl_Tarjeton(id_Tarjeton)
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

INSERT INTO tbl_Estado VALUES(NULL,'ACTIVO');
INSERT INTO tbl_Estado VALUES(NULL,'PASIVO');

INSERT INTO tbl_Complicacion VALUES(NULL,'RETINOPATÍA');
INSERT INTO tbl_Complicacion VALUES(NULL,'CEGUERA');
INSERT INTO tbl_Complicacion VALUES(NULL,'INSUFICIENCIA RENAL');
INSERT INTO tbl_Complicacion VALUES(NULL,'PIE DIABÉTICO');
INSERT INTO tbl_Complicacion VALUES(NULL,'AMPUTACIÓN');
INSERT INTO tbl_Complicacion VALUES(NULL,'HIPERTROFIA VENTRICULAR IZQUIERDA');
INSERT INTO tbl_Complicacion VALUES(NULL,'ENFERMEDAD CEREBROVASCULAR');

INSERT INTO tbl_Patologia VALUES(NULL,'DIABETES MELLITUS');
INSERT INTO tbl_Patologia VALUES(NULL,'HIPERTENSION ARTERIAL');
INSERT INTO tbl_Patologia VALUES(NULL,'DISLIPIDEMIAS');
INSERT INTO tbl_Patologia VALUES(NULL,'EPOC');
INSERT INTO tbl_Patologia VALUES(NULL,'EPILEPSIA');
INSERT INTO tbl_Patologia VALUES(NULL,'HIPOTIROIDISMO');
INSERT INTO tbl_Patologia VALUES(NULL,'ARTROSIS DE RODILLAS');
INSERT INTO tbl_Patologia VALUES(NULL,'ARTROSIS DE CADERAS');
INSERT INTO tbl_Patologia VALUES(NULL,'INTOLERANCIA A LA GLUCOSA');
INSERT INTO tbl_Patologia VALUES(NULL,'PARKINSON');

INSERT INTO tbl_Estamento VALUES(NULL,'MEDICO');
INSERT INTO tbl_Estamento VALUES(NULL,'ENFERMERA');
INSERT INTO tbl_Estamento VALUES(NULL,'NUTRICIONISTA');
INSERT INTO tbl_Estamento VALUES(NULL,'KINESIOLOGO');

INSERT INTO tbl_Estado_Civil VALUES(NULL,'SOLTERO(A)');
INSERT INTO tbl_Estado_Civil VALUES(NULL,'CASADO(A)');
INSERT INTO tbl_Estado_Civil VALUES(NULL,'VIUDO(A)');
INSERT INTO tbl_Estado_Civil VALUES(NULL,'SEPARADO(A)');

INSERT INTO tbl_ListadoExamen VALUES(NULL,'HEMOGLOBINA GLICOSILADA');
INSERT INTO tbl_ListadoExamen VALUES(NULL,'GLICEMIA');
INSERT INTO tbl_ListadoExamen VALUES(NULL,'CREATININEMIA');
INSERT INTO tbl_ListadoExamen VALUES(NULL,'COLESTEROL T./HDL');
INSERT INTO tbl_ListadoExamen VALUES(NULL,'COLESTEROL HDL');
INSERT INTO tbl_ListadoExamen VALUES(NULL,'COLESTEROL LDL');
INSERT INTO tbl_ListadoExamen VALUES(NULL,'COLESTEROL VLDL');
INSERT INTO tbl_ListadoExamen VALUES(NULL,'TRIGLICÉRIDOS');
INSERT INTO tbl_ListadoExamen VALUES(NULL,'MAU/CREAT(RAC)');
INSERT INTO tbl_ListadoExamen VALUES(NULL,'VFG');
INSERT INTO tbl_ListadoExamen VALUES(NULL,'PAUTA ERC');
INSERT INTO tbl_ListadoExamen VALUES(NULL,'HORMONA TIROESTIMULANTE(TSH)');
INSERT INTO tbl_ListadoExamen VALUES(NULL,'HORMONA TIROXINA LIBRE(T4L)');
INSERT INTO tbl_ListadoExamen VALUES(NULL,'RPR');
INSERT INTO tbl_ListadoExamen VALUES(NULL,'HEMOGRAMA');
INSERT INTO tbl_ListadoExamen VALUES(NULL,'HEMATOCRITO');
INSERT INTO tbl_ListadoExamen VALUES(NULL,'NITRÓGENO UREICO');
INSERT INTO tbl_ListadoExamen VALUES(NULL,'ACIDO URICO');
INSERT INTO tbl_ListadoExamen VALUES(NULL,'HEMOGLOBINA CORPUSCULAR MEDIA');

INSERT INTO tbl_Comuna VALUES(NULL,'Algarrobo');
INSERT INTO tbl_Comuna VALUES(NULL,'Alhué');
INSERT INTO tbl_Comuna VALUES(NULL,'Alto Bío Bío');
INSERT INTO tbl_Comuna VALUES(NULL,'Alto del Carmen');
INSERT INTO tbl_Comuna VALUES(NULL,'Alto Hospicio');
INSERT INTO tbl_Comuna VALUES(NULL,'Ancud');
INSERT INTO tbl_Comuna VALUES(NULL,'Andacollo');
INSERT INTO tbl_Comuna VALUES(NULL,'Angol');
INSERT INTO tbl_Comuna VALUES(NULL,'Antártica');
INSERT INTO tbl_Comuna VALUES(NULL,'Antofagasta');
INSERT INTO tbl_Comuna VALUES(NULL,'Antuco');
INSERT INTO tbl_Comuna VALUES(NULL,'Arauco');
INSERT INTO tbl_Comuna VALUES(NULL,'Arica');
INSERT INTO tbl_Comuna VALUES(NULL,'Aysén');
INSERT INTO tbl_Comuna VALUES(NULL,'Buin');
INSERT INTO tbl_Comuna VALUES(NULL,'Bulnes');
INSERT INTO tbl_Comuna VALUES(NULL,'Cabildo');
INSERT INTO tbl_Comuna VALUES(NULL,'Cabo de Hornos');
INSERT INTO tbl_Comuna VALUES(NULL,'Cabrero');
INSERT INTO tbl_Comuna VALUES(NULL,'Calama');
INSERT INTO tbl_Comuna VALUES(NULL,'Calbuco');
INSERT INTO tbl_Comuna VALUES(NULL,'Caldera');
INSERT INTO tbl_Comuna VALUES(NULL,'Calera de Tango');
INSERT INTO tbl_Comuna VALUES(NULL,'Calle Larga');
INSERT INTO tbl_Comuna VALUES(NULL,'Camarones');
INSERT INTO tbl_Comuna VALUES(NULL,'Camiña');
INSERT INTO tbl_Comuna VALUES(NULL,'Canela');
INSERT INTO tbl_Comuna VALUES(NULL,'Cañete');
INSERT INTO tbl_Comuna VALUES(NULL,'Carahue');
INSERT INTO tbl_Comuna VALUES(NULL,'Cartagena');
INSERT INTO tbl_Comuna VALUES(NULL,'Casablanca');
INSERT INTO tbl_Comuna VALUES(NULL,'Castro');
INSERT INTO tbl_Comuna VALUES(NULL,'Catemu');
INSERT INTO tbl_Comuna VALUES(NULL,'Cauquenes');
INSERT INTO tbl_Comuna VALUES(NULL,'Cerrillos');
INSERT INTO tbl_Comuna VALUES(NULL,'Cerro Navia');
INSERT INTO tbl_Comuna VALUES(NULL,'Chaitén');
INSERT INTO tbl_Comuna VALUES(NULL,'Chanco');
INSERT INTO tbl_Comuna VALUES(NULL,'Chañaral');
INSERT INTO tbl_Comuna VALUES(NULL,'Chépica');
INSERT INTO tbl_Comuna VALUES(NULL,'Chiguayante');
INSERT INTO tbl_Comuna VALUES(NULL,'Chile Chico');
INSERT INTO tbl_Comuna VALUES(NULL,'Chillán');
INSERT INTO tbl_Comuna VALUES(NULL,'Chillán Viejo');
INSERT INTO tbl_Comuna VALUES(NULL,'Chimbarongo');
INSERT INTO tbl_Comuna VALUES(NULL,'Chol Chol');
INSERT INTO tbl_Comuna VALUES(NULL,'Chonchi');
INSERT INTO tbl_Comuna VALUES(NULL,'Cisnes');
INSERT INTO tbl_Comuna VALUES(NULL,'Cobquecura');
INSERT INTO tbl_Comuna VALUES(NULL,'Cochamó');
INSERT INTO tbl_Comuna VALUES(NULL,'Cochrane');
INSERT INTO tbl_Comuna VALUES(NULL,'Codegua');
INSERT INTO tbl_Comuna VALUES(NULL,'Coelemu');
INSERT INTO tbl_Comuna VALUES(NULL,'Coihueco');
INSERT INTO tbl_Comuna VALUES(NULL,'Coinco');
INSERT INTO tbl_Comuna VALUES(NULL,'Colbún');
INSERT INTO tbl_Comuna VALUES(NULL,'Colchane');
INSERT INTO tbl_Comuna VALUES(NULL,'Colina');
INSERT INTO tbl_Comuna VALUES(NULL,'Collipulli');
INSERT INTO tbl_Comuna VALUES(NULL,'Coltauco');
INSERT INTO tbl_Comuna VALUES(NULL,'Combarbalá');
INSERT INTO tbl_Comuna VALUES(NULL,'Concepción');
INSERT INTO tbl_Comuna VALUES(NULL,'Conchalí');
INSERT INTO tbl_Comuna VALUES(NULL,'Concón');
INSERT INTO tbl_Comuna VALUES(NULL,'Constitución');
INSERT INTO tbl_Comuna VALUES(NULL,'Contulmo');
INSERT INTO tbl_Comuna VALUES(NULL,'Copiapó');
INSERT INTO tbl_Comuna VALUES(NULL,'Coquimbo');
INSERT INTO tbl_Comuna VALUES(NULL,'Coronel');
INSERT INTO tbl_Comuna VALUES(NULL,'Corral');
INSERT INTO tbl_Comuna VALUES(NULL,'Coyhaique');
INSERT INTO tbl_Comuna VALUES(NULL,'Cunco');
INSERT INTO tbl_Comuna VALUES(NULL,'Curacautín');
INSERT INTO tbl_Comuna VALUES(NULL,'Curacaví');
INSERT INTO tbl_Comuna VALUES(NULL,'Curaco de Vélez');
INSERT INTO tbl_Comuna VALUES(NULL,'Curanilahue');
INSERT INTO tbl_Comuna VALUES(NULL,'Curarrehue');
INSERT INTO tbl_Comuna VALUES(NULL,'Curepto');
INSERT INTO tbl_Comuna VALUES(NULL,'Curicó');
INSERT INTO tbl_Comuna VALUES(NULL,'Dalcahue');
INSERT INTO tbl_Comuna VALUES(NULL,'Diego de Almagro');
INSERT INTO tbl_Comuna VALUES(NULL,'Doñihue');
INSERT INTO tbl_Comuna VALUES(NULL,'El Bosque');
INSERT INTO tbl_Comuna VALUES(NULL,'El Carmen');
INSERT INTO tbl_Comuna VALUES(NULL,'El Monte');
INSERT INTO tbl_Comuna VALUES(NULL,'El Quisco');
INSERT INTO tbl_Comuna VALUES(NULL,'El Tabo');
INSERT INTO tbl_Comuna VALUES(NULL,'Empedrado');
INSERT INTO tbl_Comuna VALUES(NULL,'Ercilla');
INSERT INTO tbl_Comuna VALUES(NULL,'Estación Central');
INSERT INTO tbl_Comuna VALUES(NULL,'Florida');
INSERT INTO tbl_Comuna VALUES(NULL,'Freire');
INSERT INTO tbl_Comuna VALUES(NULL,'Freirina');
INSERT INTO tbl_Comuna VALUES(NULL,'Fresia');
INSERT INTO tbl_Comuna VALUES(NULL,'Frutillar');
INSERT INTO tbl_Comuna VALUES(NULL,'Futaleufú');
INSERT INTO tbl_Comuna VALUES(NULL,'Futrono');
INSERT INTO tbl_Comuna VALUES(NULL,'Galvarino');
INSERT INTO tbl_Comuna VALUES(NULL,'General Lagos');
INSERT INTO tbl_Comuna VALUES(NULL,'Gorbea');
INSERT INTO tbl_Comuna VALUES(NULL,'Graneros');
INSERT INTO tbl_Comuna VALUES(NULL,'Guaitecas');
INSERT INTO tbl_Comuna VALUES(NULL,'Hijuelas');
INSERT INTO tbl_Comuna VALUES(NULL,'Hualaihué');
INSERT INTO tbl_Comuna VALUES(NULL,'Hualañé');
INSERT INTO tbl_Comuna VALUES(NULL,'Hualpén');
INSERT INTO tbl_Comuna VALUES(NULL,'Hualqui');
INSERT INTO tbl_Comuna VALUES(NULL,'Huara');
INSERT INTO tbl_Comuna VALUES(NULL,'Huasco');
INSERT INTO tbl_Comuna VALUES(NULL,'Huechuraba');
INSERT INTO tbl_Comuna VALUES(NULL,'Illapel');
INSERT INTO tbl_Comuna VALUES(NULL,'Independencia');
INSERT INTO tbl_Comuna VALUES(NULL,'Iquique');
INSERT INTO tbl_Comuna VALUES(NULL,'Isla de Maipo');
INSERT INTO tbl_Comuna VALUES(NULL,'Isla de Pascua');
INSERT INTO tbl_Comuna VALUES(NULL,'Juan Fernández');
INSERT INTO tbl_Comuna VALUES(NULL,'La Calera');
INSERT INTO tbl_Comuna VALUES(NULL,'La Cisterna');
INSERT INTO tbl_Comuna VALUES(NULL,'La Cruz');
INSERT INTO tbl_Comuna VALUES(NULL,'La Estrella');
INSERT INTO tbl_Comuna VALUES(NULL,'La Florida');
INSERT INTO tbl_Comuna VALUES(NULL,'La Granja');
INSERT INTO tbl_Comuna VALUES(NULL,'La Higuera');
INSERT INTO tbl_Comuna VALUES(NULL,'La Ligua');
INSERT INTO tbl_Comuna VALUES(NULL,'La Pintana');
INSERT INTO tbl_Comuna VALUES(NULL,'La Reina');
INSERT INTO tbl_Comuna VALUES(NULL,'La Serena');
INSERT INTO tbl_Comuna VALUES(NULL,'La Unión');
INSERT INTO tbl_Comuna VALUES(NULL,'Lago Ranco');
INSERT INTO tbl_Comuna VALUES(NULL,'Lago Verde');
INSERT INTO tbl_Comuna VALUES(NULL,'Laguna Blanca');
INSERT INTO tbl_Comuna VALUES(NULL,'Laja');
INSERT INTO tbl_Comuna VALUES(NULL,'Lampa');
INSERT INTO tbl_Comuna VALUES(NULL,'Lanco');
INSERT INTO tbl_Comuna VALUES(NULL,'Las Cabras');
INSERT INTO tbl_Comuna VALUES(NULL,'Las Condes');
INSERT INTO tbl_Comuna VALUES(NULL,'Lautaro');
INSERT INTO tbl_Comuna VALUES(NULL,'Lebu');
INSERT INTO tbl_Comuna VALUES(NULL,'Licantén');
INSERT INTO tbl_Comuna VALUES(NULL,'Limache');
INSERT INTO tbl_Comuna VALUES(NULL,'Linares');
INSERT INTO tbl_Comuna VALUES(NULL,'Litueche');
INSERT INTO tbl_Comuna VALUES(NULL,'Llanquihue');
INSERT INTO tbl_Comuna VALUES(NULL,'Llay Llay');
INSERT INTO tbl_Comuna VALUES(NULL,'Lo Barnechea');
INSERT INTO tbl_Comuna VALUES(NULL,'Lo Espejo');
INSERT INTO tbl_Comuna VALUES(NULL,'Lo Prado');
INSERT INTO tbl_Comuna VALUES(NULL,'Lolol');
INSERT INTO tbl_Comuna VALUES(NULL,'Loncoche');
INSERT INTO tbl_Comuna VALUES(NULL,'Longaví');
INSERT INTO tbl_Comuna VALUES(NULL,'Lonquimay');
INSERT INTO tbl_Comuna VALUES(NULL,'Los Álamos');
INSERT INTO tbl_Comuna VALUES(NULL,'Los Andes');
INSERT INTO tbl_Comuna VALUES(NULL,'Los Ángeles');
INSERT INTO tbl_Comuna VALUES(NULL,'Los Lagos');
INSERT INTO tbl_Comuna VALUES(NULL,'Los Muermos');
INSERT INTO tbl_Comuna VALUES(NULL,'Los Sauces');
INSERT INTO tbl_Comuna VALUES(NULL,'Los Vilos');
INSERT INTO tbl_Comuna VALUES(NULL,'Lota');
INSERT INTO tbl_Comuna VALUES(NULL,'Lumaco');
INSERT INTO tbl_Comuna VALUES(NULL,'Machalí');
INSERT INTO tbl_Comuna VALUES(NULL,'Macul');
INSERT INTO tbl_Comuna VALUES(NULL,'Máfil');
INSERT INTO tbl_Comuna VALUES(NULL,'Maipú');
INSERT INTO tbl_Comuna VALUES(NULL,'Malloa');
INSERT INTO tbl_Comuna VALUES(NULL,'Marchigüe');
INSERT INTO tbl_Comuna VALUES(NULL,'María Elena');
INSERT INTO tbl_Comuna VALUES(NULL,'María Pinto');
INSERT INTO tbl_Comuna VALUES(NULL,'Mariquina');
INSERT INTO tbl_Comuna VALUES(NULL,'Maule');
INSERT INTO tbl_Comuna VALUES(NULL,'Maullín');
INSERT INTO tbl_Comuna VALUES(NULL,'Mejillones');
INSERT INTO tbl_Comuna VALUES(NULL,'Melipeuco');
INSERT INTO tbl_Comuna VALUES(NULL,'Melipilla');
INSERT INTO tbl_Comuna VALUES(NULL,'Molina');
INSERT INTO tbl_Comuna VALUES(NULL,'Monte Patria');
INSERT INTO tbl_Comuna VALUES(NULL,'Mostazal');
INSERT INTO tbl_Comuna VALUES(NULL,'Mulchén');
INSERT INTO tbl_Comuna VALUES(NULL,'Nacimiento');
INSERT INTO tbl_Comuna VALUES(NULL,'Nancagua');
INSERT INTO tbl_Comuna VALUES(NULL,'Navidad');
INSERT INTO tbl_Comuna VALUES(NULL,'Negrete');
INSERT INTO tbl_Comuna VALUES(NULL,'Ninhue');
INSERT INTO tbl_Comuna VALUES(NULL,'Nogales');
INSERT INTO tbl_Comuna VALUES(NULL,'Nueva Imperial');
INSERT INTO tbl_Comuna VALUES(NULL,'Ñiquén');
INSERT INTO tbl_Comuna VALUES(NULL,'Ñuñoa');
INSERT INTO tbl_Comuna VALUES(NULL,'O’Higgins');
INSERT INTO tbl_Comuna VALUES(NULL,'Olivar');
INSERT INTO tbl_Comuna VALUES(NULL,'Ollagüe');
INSERT INTO tbl_Comuna VALUES(NULL,'Olmué');
INSERT INTO tbl_Comuna VALUES(NULL,'Osorno');
INSERT INTO tbl_Comuna VALUES(NULL,'Ovalle');
INSERT INTO tbl_Comuna VALUES(NULL,'Padre Hurtado');
INSERT INTO tbl_Comuna VALUES(NULL,'Padre Las Casas');
INSERT INTO tbl_Comuna VALUES(NULL,'Paihuano');
INSERT INTO tbl_Comuna VALUES(NULL,'Paillaco');
INSERT INTO tbl_Comuna VALUES(NULL,'Paine');
INSERT INTO tbl_Comuna VALUES(NULL,'Palena');
INSERT INTO tbl_Comuna VALUES(NULL,'Palmilla');
INSERT INTO tbl_Comuna VALUES(NULL,'Panguipulli');
INSERT INTO tbl_Comuna VALUES(NULL,'Panquehue');
INSERT INTO tbl_Comuna VALUES(NULL,'Papudo');
INSERT INTO tbl_Comuna VALUES(NULL,'Paredones');
INSERT INTO tbl_Comuna VALUES(NULL,'Parral');
INSERT INTO tbl_Comuna VALUES(NULL,'Pedro Aguirre Cerda');
INSERT INTO tbl_Comuna VALUES(NULL,'Pelarco');
INSERT INTO tbl_Comuna VALUES(NULL,'Pelluhue');
INSERT INTO tbl_Comuna VALUES(NULL,'Pemuco');
INSERT INTO tbl_Comuna VALUES(NULL,'Pencahue');
INSERT INTO tbl_Comuna VALUES(NULL,'Penco');
INSERT INTO tbl_Comuna VALUES(NULL,'Peñaflor');
INSERT INTO tbl_Comuna VALUES(NULL,'Peñalolén');
INSERT INTO tbl_Comuna VALUES(NULL,'Peralillo');
INSERT INTO tbl_Comuna VALUES(NULL,'Perquenco');
INSERT INTO tbl_Comuna VALUES(NULL,'Petorca');
INSERT INTO tbl_Comuna VALUES(NULL,'Peumo');
INSERT INTO tbl_Comuna VALUES(NULL,'Pica');
INSERT INTO tbl_Comuna VALUES(NULL,'Pichidegua');
INSERT INTO tbl_Comuna VALUES(NULL,'Pichilemu');
INSERT INTO tbl_Comuna VALUES(NULL,'Pinto');
INSERT INTO tbl_Comuna VALUES(NULL,'Pirque');
INSERT INTO tbl_Comuna VALUES(NULL,'Pitrufquén');
INSERT INTO tbl_Comuna VALUES(NULL,'Placilla');
INSERT INTO tbl_Comuna VALUES(NULL,'Portezuelo');
INSERT INTO tbl_Comuna VALUES(NULL,'Porvenir');
INSERT INTO tbl_Comuna VALUES(NULL,'Pozo Almonte');
INSERT INTO tbl_Comuna VALUES(NULL,'Primavera');
INSERT INTO tbl_Comuna VALUES(NULL,'Providencia');
INSERT INTO tbl_Comuna VALUES(NULL,'Puchuncaví');
INSERT INTO tbl_Comuna VALUES(NULL,'Pucón');
INSERT INTO tbl_Comuna VALUES(NULL,'Pudahuel');
INSERT INTO tbl_Comuna VALUES(NULL,'Puente Alto');
INSERT INTO tbl_Comuna VALUES(NULL,'Puerto Montt');
INSERT INTO tbl_Comuna VALUES(NULL,'Puerto Natales');
INSERT INTO tbl_Comuna VALUES(NULL,'Puerto Octay');
INSERT INTO tbl_Comuna VALUES(NULL,'Puerto Varas');
INSERT INTO tbl_Comuna VALUES(NULL,'Pumanque');
INSERT INTO tbl_Comuna VALUES(NULL,'Punitaqui');
INSERT INTO tbl_Comuna VALUES(NULL,'Punta Arenas');
INSERT INTO tbl_Comuna VALUES(NULL,'Puqueldón');
INSERT INTO tbl_Comuna VALUES(NULL,'Purén');
INSERT INTO tbl_Comuna VALUES(NULL,'Purranque');
INSERT INTO tbl_Comuna VALUES(NULL,'Putaendo');
INSERT INTO tbl_Comuna VALUES(NULL,'Putre');
INSERT INTO tbl_Comuna VALUES(NULL,'Puyehue');
INSERT INTO tbl_Comuna VALUES(NULL,'Queilén');
INSERT INTO tbl_Comuna VALUES(NULL,'Quellón');
INSERT INTO tbl_Comuna VALUES(NULL,'Quemchi');
INSERT INTO tbl_Comuna VALUES(NULL,'Quilaco');
INSERT INTO tbl_Comuna VALUES(NULL,'Quilicura');
INSERT INTO tbl_Comuna VALUES(NULL,'Quilleco');
INSERT INTO tbl_Comuna VALUES(NULL,'Quillón');
INSERT INTO tbl_Comuna VALUES(NULL,'Quillota');
INSERT INTO tbl_Comuna VALUES(NULL,'Quilpué');
INSERT INTO tbl_Comuna VALUES(NULL,'Quinchao');
INSERT INTO tbl_Comuna VALUES(NULL,'Quinta de Tilcoco');
INSERT INTO tbl_Comuna VALUES(NULL,'Quinta Normal');
INSERT INTO tbl_Comuna VALUES(NULL,'Quintero');
INSERT INTO tbl_Comuna VALUES(NULL,'Quirihue');
INSERT INTO tbl_Comuna VALUES(NULL,'Rancagua');
INSERT INTO tbl_Comuna VALUES(NULL,'Ránquil');
INSERT INTO tbl_Comuna VALUES(NULL,'Rauco');
INSERT INTO tbl_Comuna VALUES(NULL,'Recoleta');
INSERT INTO tbl_Comuna VALUES(NULL,'Renaico');
INSERT INTO tbl_Comuna VALUES(NULL,'Renca');
INSERT INTO tbl_Comuna VALUES(NULL,'Rengo');
INSERT INTO tbl_Comuna VALUES(NULL,'Requínoa');
INSERT INTO tbl_Comuna VALUES(NULL,'Retiro');
INSERT INTO tbl_Comuna VALUES(NULL,'Rinconada');
INSERT INTO tbl_Comuna VALUES(NULL,'Río Bueno');
INSERT INTO tbl_Comuna VALUES(NULL,'Río Claro');
INSERT INTO tbl_Comuna VALUES(NULL,'Río Hurtado');
INSERT INTO tbl_Comuna VALUES(NULL,'Río Negro');
INSERT INTO tbl_Comuna VALUES(NULL,'Río Negro');
INSERT INTO tbl_Comuna VALUES(NULL,'Río Verde');
INSERT INTO tbl_Comuna VALUES(NULL,'Romeral');
INSERT INTO tbl_Comuna VALUES(NULL,'Saavedra');
INSERT INTO tbl_Comuna VALUES(NULL,'Sagrada Familia');
INSERT INTO tbl_Comuna VALUES(NULL,'Salamanca');
INSERT INTO tbl_Comuna VALUES(NULL,'San Antonio');
INSERT INTO tbl_Comuna VALUES(NULL,'San Bernardo');
INSERT INTO tbl_Comuna VALUES(NULL,'San Carlos');
INSERT INTO tbl_Comuna VALUES(NULL,'San Clemente');
INSERT INTO tbl_Comuna VALUES(NULL,'San Esteban');
INSERT INTO tbl_Comuna VALUES(NULL,'San Fabián');
INSERT INTO tbl_Comuna VALUES(NULL,'San Felipe');
INSERT INTO tbl_Comuna VALUES(NULL,'San Fernando');
INSERT INTO tbl_Comuna VALUES(NULL,'San Gregorio');
INSERT INTO tbl_Comuna VALUES(NULL,'San Ignacio');
INSERT INTO tbl_Comuna VALUES(NULL,'San Javier');
INSERT INTO tbl_Comuna VALUES(NULL,'San Joaquín');
INSERT INTO tbl_Comuna VALUES(NULL,'San José de Maipo');
INSERT INTO tbl_Comuna VALUES(NULL,'San Juan de la Costa');
INSERT INTO tbl_Comuna VALUES(NULL,'San Miguel');
INSERT INTO tbl_Comuna VALUES(NULL,'San Nicolás');
INSERT INTO tbl_Comuna VALUES(NULL,'San Pablo');
INSERT INTO tbl_Comuna VALUES(NULL,'San Pedro');
INSERT INTO tbl_Comuna VALUES(NULL,'San Pedro de Atacama');
INSERT INTO tbl_Comuna VALUES(NULL,'San Pedro de la Paz');
INSERT INTO tbl_Comuna VALUES(NULL,'San Rafael');
INSERT INTO tbl_Comuna VALUES(NULL,'San Ramón');
INSERT INTO tbl_Comuna VALUES(NULL,'San Rosendo');
INSERT INTO tbl_Comuna VALUES(NULL,'San Vicente de Tagua Tagua');
INSERT INTO tbl_Comuna VALUES(NULL,'Santa Bárbara');
INSERT INTO tbl_Comuna VALUES(NULL,'Santa Cruz');
INSERT INTO tbl_Comuna VALUES(NULL,'Santa Juana');
INSERT INTO tbl_Comuna VALUES(NULL,'Santa María');
INSERT INTO tbl_Comuna VALUES(NULL,'Santiago');
INSERT INTO tbl_Comuna VALUES(NULL,'Santo Domingo');
INSERT INTO tbl_Comuna VALUES(NULL,'Sierra Gorda');
INSERT INTO tbl_Comuna VALUES(NULL,'Talagante');
INSERT INTO tbl_Comuna VALUES(NULL,'Talca');
INSERT INTO tbl_Comuna VALUES(NULL,'Talcahuano');
INSERT INTO tbl_Comuna VALUES(NULL,'Taltal');
INSERT INTO tbl_Comuna VALUES(NULL,'Temuco');
INSERT INTO tbl_Comuna VALUES(NULL,'Teno');
INSERT INTO tbl_Comuna VALUES(NULL,'Teodoro Schmidt');
INSERT INTO tbl_Comuna VALUES(NULL,'Tierra Amarilla');
INSERT INTO tbl_Comuna VALUES(NULL,'Til Til');
INSERT INTO tbl_Comuna VALUES(NULL,'Timaukel');
INSERT INTO tbl_Comuna VALUES(NULL,'Tirúa');
INSERT INTO tbl_Comuna VALUES(NULL,'Tocopilla');
INSERT INTO tbl_Comuna VALUES(NULL,'Toltén');
INSERT INTO tbl_Comuna VALUES(NULL,'Tomé');
INSERT INTO tbl_Comuna VALUES(NULL,'Torres del Paine');
INSERT INTO tbl_Comuna VALUES(NULL,'Tortel');
INSERT INTO tbl_Comuna VALUES(NULL,'Traiguén');
INSERT INTO tbl_Comuna VALUES(NULL,'Trehuaco');
INSERT INTO tbl_Comuna VALUES(NULL,'Tucapel');
INSERT INTO tbl_Comuna VALUES(NULL,'Valdivia');
INSERT INTO tbl_Comuna VALUES(NULL,'Vallenar');
INSERT INTO tbl_Comuna VALUES(NULL,'Valparaíso');
INSERT INTO tbl_Comuna VALUES(NULL,'Vichuquén');
INSERT INTO tbl_Comuna VALUES(NULL,'Victoria');
INSERT INTO tbl_Comuna VALUES(NULL,'Vicuña');
INSERT INTO tbl_Comuna VALUES(NULL,'Vilcún');
INSERT INTO tbl_Comuna VALUES(NULL,'Villa Alegre');
INSERT INTO tbl_Comuna VALUES(NULL,'Villa Alemana');
INSERT INTO tbl_Comuna VALUES(NULL,'Villarrica');
INSERT INTO tbl_Comuna VALUES(NULL,'Viña del Mar');
INSERT INTO tbl_Comuna VALUES(NULL,'Vitacura');
INSERT INTO tbl_Comuna VALUES(NULL,'Yerbas Buenas');
INSERT INTO tbl_Comuna VALUES(NULL,'Yumbel');
INSERT INTO tbl_Comuna VALUES(NULL,'Yungay');
INSERT INTO tbl_Comuna VALUES(NULL,'Zapallar');

INSERT INTO tbl_Paciente VALUES(NULL,'12234567-8','NO','SE','LLAMA','1990-05-20',1,'JUNTA DE VECINOS','ENSEÑANZA MEDIA','NO TRABAJO','NO VIVE','VERDE',1,261,1);


SELECT * FROM tbl_Complicacion;
SELECT * FROM tbl_ComplicacionesPacientes;
SELECT * FROM tbl_Comuna;
SELECT * FROM tbl_Estado_Civil;
SELECT * FROM tbl_Estamento;
SELECT * FROM tbl_TipoExamenes;
SELECT * FROM tbl_ListadoExamen;
SELECT * FROM tbl_FactorDeRiesgo;
SELECT * FROM tbl_Observacion;
SELECT * FROM tbl_Paciente;
SELECT * FROM tbl_PacienteDiabetico;
SELECT * FROM tbl_Patologia;
SELECT * FROM tbl_PatologiasPacientes;
SELECT * FROM tbl_Profesional;
SELECT * FROM tbl_Tarjeton;
SELECT * FROM tbl_Telefono;
SELECT * FROM tbl_TratamientoCardiaco;
SELECT * FROM tbl_UsuarioAdultoMayor;
SELECT * FROM tbl_ParametrosClinicos;

DROP DATABASE DB_TarjetonVirtual;