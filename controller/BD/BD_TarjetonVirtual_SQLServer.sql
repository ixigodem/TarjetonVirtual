CREATE DATABASE bd_tarjetonVirtual;
GO
USE bd_tarjetonVirtual;
GO

CREATE TABLE Complicacion(
    COM_id INT IDENTITY(1,1),
    COM_nombre VARCHAR(50) NOT NULL,
    CONSTRAINT PK_Compilacion PRIMARY KEY(COM_id)
);

CREATE TABLE Parametros_clinicos(
    PARCLI_id INT IDENTITY(1,1),
    PARCLI_peso FLOAT NOT NULL,
    PARCLI_talla FLOAT NOT NULL,
    PARCLI_IMC FLOAT NOT NULL,
    PARCLI_diagNutricional VARCHAR(20) NOT NULL,
    PARCLI_PAsistolica INT NOT NULL,
    PARCLI_PAdistolica INT NOT NULL,
    PARCLI_cicunferenciaCintura FLOAT NOT NULL,
    CONSTRAINT PK_Parametros_clinicos PRIMARY KEY(PARCLI_id)
);

CREATE TABLE Egreso(
    EGR_id INT IDENTITY(1,1),
    EGR_motivo VARCHAR(100) NOT NULL,
    CONSTRAINT PK_Egreso PRIMARY KEY(EGR_id)
);

CREATE TABLE Examenes(
    EXA_id INT IDENTITY(1,1),
    EXA_fechaTomaMuestra DATETIME NOT NULL,
    EXA_HBglicemia INT NULL,
    EXA_glicemia FLOAT NULL,
    EXA_creatinina FLOAT NULL,
    EXA_colesterol INT NULL,
    EXA_HDL INT NULL,
    EXA_LDL INT NULL,
    EXA_trigliceridos INT NULL,
    EXA_MAU_CREA_RAC FLOAT NULL,
    EXA_VFG FLOAT NULL,
    EXA_pautaERC FLOAT null,
    CONSTRAINT PK_Examenes PRIMARY KEY(EXA_id)
);

CREATE TABLE Medicamentos(
    MED_id INT IDENTITY(1,1),
    MED_nombre VARCHAR(50) NOT NULL,
    MED_cantidad INT NOT NULL,
    MED_posologia VARCHAR(100) NOT NULL,
    CONSTRAINT PK_Medicamentos PRIMARY KEY(MED_id)
);

CREATE TABLE Patologias(
    PAT_id INT IDENTITY(1,1),
    PAT_nombre VARCHAR(20) NOT NULL,
    PAT_fechaDiagnostico DATETIME NOT NULL,
    CONSTRAINT PK_Patologias PRIMARY KEY(PAT_id)
);

CREATE TABLE Tratamientos(
    TTO_id INT IDENTITY(1,1),
    TTO_nombre VARCHAR(50) NOT NULL,
    TTO_indicacion VARCHAR(100) NOT NULL,
    TTO_fecha DATETIME NOT NULL,
    EXA_ID INT NOT NULL,
    MED_ID INT NOT NULL,
    CONSTRAINT PK_Tratamientos PRIMARY KEY(TTO_id),
    CONSTRAINT FK_Examenes FOREIGN KEY(EXA_ID) REFERENCES Examenes(EXA_id),
    CONSTRAINT FK_Medicamentos FOREIGN KEY(MED_ID) REFERENCES Medicamentos(MED_id)
);

CREATE TABLE Tarjeton(
    TAR_id INT IDENTITY(1,1),
    TAR_estado BIT NOT NULL,
    TAR_observaciones VARCHAR(100) NOT NULL,
    TTO_ID INT NOT NULL,
    PARCLI_ID INT NOT NULL,
    EGR_ID INT NOT NULL,
    CONSTRAINT PK_Tarjeton PRIMARY KEY(TAR_id),
    CONSTRAINT FK_Tratamiento FOREIGN KEY(TTO_ID) REFERENCES Tratamientos(TTO_id),
    CONSTRAINT FK_Parametros_Clinicos FOREIGN KEY(PARCLI_ID) REFERENCES Parametros_clinicos(PARCLI_id),
    CONSTRAINT FK_Egreso FOREIGN KEY(EGR_ID) REFERENCES Egreso(EGR_id)
);


CREATE TABLE Ingreso(
    ING_id INT IDENTITY(1,1),
    ING_fecha DATETIME NOT NULL,
    TAR_ID INT NOT NULL,
    CONSTRAINT PK_Ingreso PRIMARY KEY(ING_id),
    CONSTRAINT FK_Tarjeton FOREIGN KEY(TAR_ID) REFERENCES Tarjeton(TAR_id)
);


CREATE TABLE Profesional(
    PRO_id INT IDENTITY(1,1),
    PRO_estamento VARCHAR(20) NOT NULL,
    PRO_nombre VARCHAR(50) NOT NULL,
    ING_ID INT NOT NULL,
    CONSTRAINT PK_Profesional PRIMARY KEY(PRO_id),
    CONSTRAINT FK_Ingreso FOREIGN KEY(ING_ID) REFERENCES Ingreso(ING_id)
);


CREATE TABLE Paciente(
    PAC_id INT IDENTITY(1,1),
    PAC_nombres VARCHAR(50) NOT NULL,
    PAC_apellidoPaterno VARCHAR(20) NOT NULL,
    PAC_apellidoMaterno VARCHAR(20) NOT NULL,
    PAC_fechaNacimiento DATETIME NOT NULL,
    PAC_edad INT NOT NULL,
    PAC_run VARCHAR(10) NOT NULL,
    PAC_sexo BIT NOT NULL,
    PAC_estadoCivil VARCHAR(20) NOT NULL,
    PAC_prevision VARCHAR(10) NOT NULL,
    PAC_participacionSocial VARCHAR(50) NOT NULL,
    PAC_estudio VARCHAR(20) NOT NULL,
    PAC_actividadLaboral VARCHAR(50) NOT NULL,
    PAC_direccionParticular VARCHAR(100) NOT NULL,
    PAC_comuna VARCHAR(20) NOT NULL,
    PAC_telefono1 INT NOT NULL,
    PAC_telefono2 INT NOT NULL,
    PRO_ID INT NOT NULL,
    CONSTRAINT PK_Paciente PRIMARY KEY(PAC_id),
    CONSTRAINT FK_Profesional FOREIGN KEY(PRO_ID) REFERENCES Profesional(PRO_id)
);

CREATE TABLE Programa_Salud(
    PROSA_id INT IDENTITY(1,1),
    PROSA_nombre VARCHAR(50) NOT NULL,
    ING_ID INT NOT NULL,
    CONSTRAINT PK_Programa_Salud PRIMARY KEY(PROSA_id),
    CONSTRAINT FK_Ingresos FOREIGN KEY(ING_ID) REFERENCES Ingreso(ING_id)
);

CREATE TABLE Union_patologia(
    UNP_id INT IDENTITY(1,1),
    PAC_ID INT NOT NULL,
    PAT_ID INT NOT NULL,
    COM_ID INT NOT NULL,
    PROSA_ID INT NOT NULL,
    CONSTRAINT PK_Union_Patologia PRIMARY KEY(UNP_id),
    CONSTRAINT FK_Pacientes FOREIGN KEY(PAC_ID) REFERENCES Paciente(PAC_id),
    CONSTRAINT FK_Patologias FOREIGN KEY(PAT_ID) REFERENCES Patologias(PAT_id),
    CONSTRAINT FK_Complicaciones FOREIGN KEY(COM_ID) REFERENCES Complicacion(COM_id),
    CONSTRAINT FK_Programa_Salud FOREIGN KEY(PROSA_ID) REFERENCES Programa_Salud(PROSA_id)
);

USE master;

DROP DATABASE bd_tarjetonVirtual;

SELECT * FROM Complicacion;
SELECT * FROM Egreso;
SELECT * FROM Examenes;
SELECT * FROM Medicamentos;
SELECT * FROM Programa_Salud;
SELECT * FROM Patologias;
SELECT * FROM Ingreso;
SELECT * FROM Parametros_clinicos;
SELECT * FROM Paciente;
SELECT * FROM Tratamientos;
SELECT * FROM Tarjeton;
SELECT * FROM Profesional;