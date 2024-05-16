DROP DATABASE IF EXISTS dbkardex;
CREATE DATABASE dbkardex;
USE dbkardex;

-- TABLAS SIN FOREIGN KEY
DROP TABLE IF EXISTS personas;
CREATE TABLE personas
(
	idpersona		INT AUTO_INCREMENT PRIMARY KEY,
    apepaterno		VARCHAR(60) 	NOT NULL,
    apematerno		VARCHAR(60)  	NOT NULL,
    nombres 		VARCHAR(100)	NOT NULL,
    nrodocumento	CHAR(11) 		NOT NULL,
    telfprincipal	CHAR(9) 		NULL,
    telfsecundario	CHAR(9) 		NULL,
    
    create_at		DATETIME NOT NULL DEFAULT NOW(),  -- FECHA REGISTRO
    inactive_at		DATETIME, -- FECHA BAJA
    
    CONSTRAINT uk_nrodocumento_per UNIQUE (nrodocumento)
 
) ENGINE = INNODB;

DROP TABLE IF EXISTS roles;
CREATE TABLE roles
(	
	idrol			INT AUTO_INCREMENT PRIMARY KEY,
    rol				VARCHAR(60) 	NOT NULL,
    
	create_at		DATETIME NOT NULL DEFAULT NOW(),
    inactive_at		DATETIME,
    
    CONSTRAINT uk_rol_rol UNIQUE(rol)
) ENGINE = INNODB;

DROP TABLE IF EXISTS tipoProductos;
CREATE TABLE tipoProductos
(
	idtipoproducto	INT AUTO_INCREMENT PRIMARY KEY,
    tipoproducto	VARCHAR(100)	NOT NULL,
    
	create_at		DATETIME NOT NULL DEFAULT NOW(),
    inactive_at		DATETIME,
    
    CONSTRAINT uk_tipoproducto_tpro UNIQUE(tipoproducto)
) ENGINE = INNODB;


DROP TABLE IF EXISTS marcas;
CREATE TABLE marcas
(
	idmarca			INT AUTO_INCREMENT PRIMARY KEY,
    marca			VARCHAR(100)	NOT NULL,
    
    create_at		DATETIME NOT NULL DEFAULT NOW(),
    inactive_at		DATETIME,
    
    CONSTRAINT uk_marca_mar UNIQUE(marca)
) ENGINE = INNODB;

-- TABLAS CON FOREIGN KEY PRODUCTOS

DROP TABLE IF EXISTS productos;
CREATE TABLE productos
(	
	idproducto		INT AUTO_INCREMENT PRIMARY KEY,
    idmarca			INT 			NOT NULL, -- fk
    idtipoproducto	INT 			NOT NULL, -- fk
    descripcion		VARCHAR(250) 	NULL,
    modelo			VARCHAR(100)	NULL,
    
	create_at		DATETIME NOT NULL DEFAULT NOW(),
    inactive_at		DATETIME,
    
    CONSTRAINT fk_idtipoproducto_pro FOREIGN KEY (idtipoproducto) REFERENCES tipoProductos(idtipoproducto),
    CONSTRAINT fk_idmarca_pro FOREIGN KEY (idmarca) REFERENCES marcas(idmarca)
) ENGINE = INNODB;

DROP TABLE IF EXISTS colaboradores;
CREATE TABLE colaboradores
(
	idcolaborador	INT AUTO_INCREMENT PRIMARY KEY,
    idpersona		INT 			NOT NULL, -- fk
    idrol			INT 			NOT NULL, -- fk
    nomusuario		VARCHAR(60)		NOT NULL, -- UK
    passusuario		VARCHAR(120)	NOT NULL, 	
    
	create_at		DATETIME NOT NULL DEFAULT NOW(), -- FECHA REGISTRO
    inactive_at		DATETIME,	-- FECHA BAJA
    
    CONSTRAINT	fk_idpersona_col 	FOREIGN KEY (idpersona) REFERENCES personas(idpersona),
    CONSTRAINT	fk_idrol_col		FOREIGN KEY  (idrol) 	REFERENCES roles(idrol),
    CONSTRAINT	uk_idpersona_col	UNIQUE (idpersona) ,
    CONSTRAINT	uk_nomusuario_col	UNIQUE (nomusuario) 
)ENGINE = INNODB;

-- TABLA PRINCIPAL DEL LA BASE DE DATOS 
DROP TABLE IF EXISTS kardex;
CREATE TABLE kardex
(
	idkardex		INT AUTO_INCREMENT PRIMARY KEY,
    idcolaborador	INT 	NOT NULL, -- FK
    idproducto		INT 	NOT NULL, -- FK
    tipomovimiento	VARCHAR(60) 	NOT NULL, -- SALIDA | ENTRADA
    stockactual		INT 			NOT NULL, -- ACA DEBE ACTUALIZAR LA TABLA CON LOS CAMPOS CALCULADOS
    cantidad		INT				NOT NULL, -- CANTIDA DE SALIDA | ENTRADA
    
	create_at		DATETIME NOT NULL DEFAULT NOW(),  -- FECHA REGISTRO
    inactive_at		DATETIME,
    
    CONSTRAINT fk_idcolaborador_kar FOREIGN KEY (idcolaborador) REFERENCES colaboradores(idcolaborador),
    CONSTRAINT fk_idproducto_kar 	FOREIGN KEY (idproducto) REFERENCES productos(idproducto),
    CONSTRAINT ck_tipomovimiento_kar CHECK (tipomovimiento IN ('ENTRADA','SALIDA')),
    CONSTRAINT ck_stockactual_kar	CHECK (stockactual >=0),
    CONSTRAINT ck_cantidad_kar		CHECK (cantidad > 0)
) ENGINE = INNODB;