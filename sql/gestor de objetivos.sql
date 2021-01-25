CREATE DATABASE GESTOR_OBJETIVOS;
USE GESTOR_OBJETIVOS;

CREATE TABLE IF NOT EXISTS USUARIOS(
	COD			INTEGER AUTO_INCREMENT,
    NOMBRE		VARCHAR(50)	NOT NULL,
    
    PRIMARY KEY(COD)
);

TRUNCATE USUARIOS;
DROP TABLE USUARIOS;

CREATE TABLE IF NOT EXISTS TAREAS(
	COD			INTEGER AUTO_INCREMENT,
    DESCRIP		VARCHAR(100) NOT NULL,
    PUNTOS		INTEGER NOT NULL,
    TIPO		SET(
					"DEPORTE",
                    "OBLIGACION",
                    "DISCIPLINA"
                ),
    
    PRIMARY KEY(COD)
);

TRUNCATE TAREAS;
DROP TABLE TAREAS;

CREATE TABLE IF NOT EXISTS PREMIOS(
	COD			INTEGER AUTO_INCREMENT,
    DESCRIP		VARCHAR(100) NOT NULL,
    PUNTOS		INTEGER NOT NULL,
    TIPO		SET(
					"COMIDA",
                    "OCIO",
                    "DESCONEXION"
				),
    
    PRIMARY KEY(COD)
);

TRUNCATE PREMIOS;
DROP TABLE PREMIOS;

CREATE TABLE IF NOT EXISTS OBJETIVOS(
	COD			INTEGER AUTO_INCREMENT,
    CODUSU		INTEGER DEFAULT 1,
    CODTAR		INTEGER NOT NULL,
    FECINI		TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FECFIN		DATE NOT NULL,
    META		VARCHAR(50) NOT NULL,
    ACTIVO		BOOLEAN DEFAULT TRUE,
    
    PRIMARY KEY(COD),
	CONSTRAINT TAREA_OBJETIVO FOREIGN KEY(CODTAR) REFERENCES TAREAS(COD),
	CONSTRAINT USURARIO_OBJETIVO FOREIGN KEY(CODUSU) REFERENCES USUARIOS(COD)
);

TRUNCATE OBJETIVOS;
DROP TABLE OBJETIVOS;

CREATE TABLE IF NOT EXISTS TRANSACCIONES(
	REF_OBJETIVO		INTEGER,
    REF_PREMIO			INTEGER,
    FECHA				DATE,
    CUMPLIDO			BOOLEAN,
    
    CONSTRAINT OBJETIVO_TRANSACCION FOREIGN KEY (REF_OBJETIVO) REFERENCES OBJETIVOS(COD),
    CONSTRAINT PREMIO_TRANSACCION FOREIGN KEY (REF_PREMIO) REFERENCES PREMIOS(COD)
);

TRUNCATE TRANSACCIONES;
DROP TABLE TRANSACCIONES;

INSERT INTO USUARIOS(NOMBRE) VALUES
("Sergio");

INSERT INTO TAREAS(DESCRIP, PUNTOS, TIPO) VALUES
("Bicicleta", 25, "Deporte"),
("Horario", 50, "Disciplina"),
("Pintar", 25, "Obligacion");

INSERT INTO OBJETIVOS(CODTAR, FECINI, FECFIN, META) VALUES
(1, "2021/01/01", "2021/01/31", "7 Dias seguidos"),
(2, "2021/01/01", "2021/01/11", "Realizar un horario y adaptarse a el"),
(3, curdate(), curdate() + interval 1 day, "Pintar la habitación");

INSERT INTO PREMIOS(DESCRIP, PUNTOS, TIPO) VALUES
("Pizza", 150, "Comida"),
("Jugar", 100, "Ocio"),
("1 dia de relax", 250, "Desconexion");


SELECT OBJETIVOS.COD, NOMBRE AS "USUARIO", TIPO, DESCRIP, META, PUNTOS, FECINI AS "FECHA_INICIO", FECFIN AS "FECHA_FIN"
FROM OBJETIVOS 
INNER JOIN TAREAS ON OBJETIVOS.CODTAR = TAREAS.COD 
INNER JOIN USUARIOS ON OBJETIVOS.CODUSU = USUARIOS.COD 
WHERE ACTIVO = 1;















select * from usuarios;
select * from tareas;
select * from objetivos;
select * from premios;
select nombre, tipo, descrip, meta, tareas.puntos, fecini, fecfin from gestor inner join usuarios on gestor.codusu = usuarios.cod inner join objetivos on gestor.codobj = objetivos.cod inner join tareas on objetivos.codtar = tareas.cod;

SELECT TIPO, DESCRIP, META, TAREAS.PUNTOS, FECINI, FECFIN 
FROM GESTOR 
INNER JOIN USUARIOS ON GESTOR.CODUSU = USUARIOS.COD 
INNER JOIN OBJETIVOS ON GESTOR.CODOBJ = OBJETIVOS.COD 
INNER JOIN TAREAS ON OBJETIVOS.CODTAR = TAREAS.COD
WHERE NOMBRE="Sergio"
INTO OUTFILE 'D:/xampp/htdocs/PHP/gestor_objetivos/sql/tareas.txt'
FIELDS TERMINATED BY ';'
LINES TERMINATED BY '\n';
