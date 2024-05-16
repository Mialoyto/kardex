USE dbkardex;


-- PROCEDIMIENTOS ALMACENADOS
DELIMITER $$
CREATE PROCEDURE spu_registrar_persona
(
	IN _apepaterno VARCHAR(60),
    IN _apematerno  VARCHAR(60),
    IN _nombres  VARCHAR(100),
    IN _nrodoc  CHAR(11),
    IN _telfprim  CHAR(9),
    IN _telfsecu CHAR(9)
)
BEGIN
INSERT INTO personas 
	(apepaterno, apematerno,nombres,nrodocumento, telfprimario, telfsecundario) VALUES
    (_apepaterno, _apematerno,_nombres,_nrodoc, _telfprim, _telfsecu);
    SELECT @@last_insert_id AS 'idpersona' FROM personas;
END $$



-- VISTAS


-- INSERCONES DE DATOS

-- CONSULTAS Y PRUBAS
SELECT * FROM personas;
SELECT * FROM roles;
SELECT * FROM tipoProductos;
SELECT * FROM marcas;