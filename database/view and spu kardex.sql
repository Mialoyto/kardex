USE dbkardex;


-- PROCEDIMIENTOS ALMACENADOS
DROP PROCEDURE IF EXISTS spu_personas_registrar;
DELIMITER $$
CREATE PROCEDURE spu_personas_registrar
(
	IN _apepaterno VARCHAR(60),
    IN _apematerno  VARCHAR(60),
    IN _nombres  VARCHAR(100),
    IN _nrodoc  CHAR(11),
    IN _telfprin  CHAR(9),
    IN _telfsecu CHAR(9)
)
BEGIN
	IF _telfprin = '' THEN SET _telfprin = NULL;
    END IF;
	IF _telfsecu = '' THEN SET _telfsecu = NULL;
	END IF;

	INSERT INTO personas 
		(apepaterno, apematerno,nombres,nrodocumento, telfprincipal, telfsecundario) VALUES
		(_apepaterno, _apematerno,_nombres,_nrodoc, _telfprin, _telfsecu);
		SELECT @@last_insert_id AS 'idpersona' FROM personas;
END $$


DROP PROCEDURE IF EXISTS spu_colaborador_registrar;
DELIMITER $$
CREATE PROCEDURE spu_colaborador_registrar
(
	IN	_idpersona	INT,
	IN 	_idrol		INT,
    IN	_nomuser	VARCHAR(60),
    IN	_passuser	VARCHAR(120)
	)
BEGIN
	INSERT INTO colaboradores 
		(idpersona, idrol, nomusuario, passusuario) VALUES
        (_idpersona, _idrol, _nomuser, _passuser);
		SELECT @@last_insert_id AS 'idcolaborador' FROM colaboradores;
END $$

-- VALIDAR LOGIN
DROP PROCEDURE IF EXISTS spu_colaboradores_login;
DELIMITER $$
CREATE PROCEDURE spu_colaboradores_login
(
	IN  _nomuser	VARCHAR(60)
)
BEGIN
	SELECT 
    COL.idcolaborador,
    PER.apepaterno,
    PER.apematerno,
    PER.nombres,
    ROL.rol,
    COL.nomusuario,
    COL.passusuario
    FROM colaboradores COL
		INNER JOIN personas PER ON PER.idpersona = COL.idpersona
        INNER JOIN roles ROL	ON ROL.idrol = COL.idrol
        WHERE COL.nomusuario = _nomuser AND COL.inactive_at IS NULL;
END $$


-- ASINCRONISMO PARA SELECT DE ROLES
DROP PROCEDURE IF EXISTS spu_roles_listar;
DELIMITER $$
CREATE PROCEDURE spu_roles_listar()
BEGIN
	SELECT 
    ROL.idrol,
    ROL.rol
	FROM roles ROL
    ORDER BY ROL.rol ASC;
END $$


-- ASINCRONISMO PARA SELECT DE MARCAS
DROP PROCEDURE IF EXISTS spu_marcas_listar;
DELIMITER $$
CREATE PROCEDURE spu_marcas_listar()
BEGIN
	SELECT 
    MAR.idmarca,
    MAR.marca
	FROM marcas MAR
    ORDER BY MAR.marca ASC;
END $$


-- ASINCRONISMO PARA SELECT DE TIPO PRODUCTOS
DROP PROCEDURE IF EXISTS spu_tipo_productos_listar;
DELIMITER $$
CREATE PROCEDURE spu_tipo_productos_listar()
BEGIN
	SELECT 
    TIP.idtipoproducto,
    TIP.tipoproducto
	FROM tipoproductos TIP
    ORDER BY TIP.tipoproducto ASC;
END $$


-- BUSCAR DOCUMENTO
DROP PROCEDURE IF EXISTS spu_personas_searchdoc;
DELIMITER $$
CREATE PROCEDURE spu_personas_searchdoc
(
	IN _nrodocuemnto INT
)
BEGIN
	SELECT 
    PER.idpersona,
    COL.idcolaborador,
    PER.apepaterno,
    PER.apematerno,
    PER.nombres,
    PER.telfprincipal,
    PER.telfsecundario
    FROM personas PER 
		LEFT JOIN colaboradores COL ON COL.idcolaborador = PER.idpersona
        WHERE nrodocumento = _nrodocuemnto;
END $$


DROP PROCEDURE IF EXISTS spu_productos_registrar;
DELIMITER $$
CREATE PROCEDURE spu_productos_registrar
(
	IN _idmarca			INT,
    IN _idtipoproducto	INT,
    IN _descripcion		VARCHAR(250),
    IN _modelo			VARCHAR(100)
)
BEGIN
		IF _descripcion = '' THEN 
        SET _descripcion = NULL;
		END IF;
        
        IF _modelo = '' THEN 
        SET _modelo = NULL;
		END IF;
        
		INSERT INTO productos
        (idmarca, idtipoproducto, descripcion, modelo)
        VALUES (_idmarca, _idtipoproducto, _descripcion, _modelo);
END  $$

-- verifcar
DROP PROCEDURE IF EXISTS spu_tipoproducto_buscar
DELIMITER $$
CREATE PROCEDURE spu_tipoproducto_buscar
(
IN _buscarmodelo	VARCHAR(250)
)
BEGIN
	IF LENGTH(_buscarmodelo) > 0 THEN
	SELECT 
    PRO.idproducto,
    PRO.modelo
    FROM productos PRO
    WHERE PRO.modelo LIKE CONCAT('%',_buscarmodelo,'%');
    ELSE 
    SELECT NULL AS idproducto, NULL AS modelo;
    END IF;
END $$


DELIMITER $$
CREATE PROCEDURE getultimostock (
    IN _idproducto INT,
    OUT stock_actual INT
)
BEGIN
    SELECT stockactual INTO stock_actual
    FROM kardex
    WHERE idproducto = _idproducto
    ORDER BY create_at DESC
    LIMIT 1;
END $$


DROP PROCEDURE IF EXISTS spu_kardex_movimiento;
DELIMITER $$
CREATE PROCEDURE spu_kardex_movimiento (
    IN _idcolaborador INT,
    IN _idproducto INT,
    IN _tipomovimiento VARCHAR(60),
    IN _cantidad INT
)
BEGIN
    DECLARE _ultimo_stock_actual INT;
    DECLARE _idproducto_stock	INT;
	DECLARE _stockactualresulto INT;
    
    CALL getultimostock(_idproducto, _ultimo_stock_actual);
    
    IF _ultimo_stock_actual IS NULL THEN
        SET _ultimo_stock_actual = 0;
    END IF;

    IF _tipomovimiento = 'ENTRADA' THEN
        SET _ultimo_stock_actual = _ultimo_stock_actual + _cantidad;
    ELSEIF _tipomovimiento = 'SALIDA' THEN
        SET _ultimo_stock_actual = _ultimo_stock_actual - _cantidad;
    END IF;
    
    SET _stockactualresulto = _ultimo_stock_actual;

    INSERT INTO kardex (idcolaborador, idproducto, tipomovimiento, stockactual, cantidad)
    VALUES (_idcolaborador, _idproducto, _tipomovimiento, _ultimo_stock_actual, _cantidad);
    
    SET _idproducto_stock = _idproducto;

    SELECT _idproducto_stock AS _idproducto ,_stockactualresulto AS _retorno_stock_actual;
END$$
DELIMITER ;



CALL spu_kardex_movimiento (1, 2, 'SALIDA', 5);
CALL spu_kardex_movimiento (1, 2, 'ENTRADA', 15);

SELECT * FROM kardex;

DROP PROCEDURE IF EXISTS spu_producto_reporte;
DELIMITER $$
CREATE PROCEDURE spu_producto_reporte
(	
	IN _idproducto	 INT
)
BEGIN
	SELECT 
		MAR.marca,
        TPRO.tipoproducto,
        PRO.modelo,
        PRO.descripcion,
        KAR.cantidad,
        KAR.tipomovimiento,
        KAR.stockactual,
        KAR.create_at,
        COL.nomusuario
        FROM kardex KAR
        
        INNER JOIN productos PRO ON PRO.idproducto = KAR.idproducto
        INNER JOIN marcas MAR ON MAR.idmarca	= PRO.idmarca
        INNER JOIN tipoProductos TPRO ON TPRO.idtipoproducto = PRO.idtipoproducto
        INNER JOIN colaboradores COL  ON COL.idcolaborador = KAR.idcolaborador
        WHERE KAR.idproducto= _idproducto;
END $$


CREATE PROCEDURE spu_colaboradores_listar
(

)
BEGIN
	SELECT
    PER.apepaterno,
	PER.apematerno,
	PER.nombres,
	PER.nrodocumento,
	PER.telfprincipal,
	PER.telfsecundario,
    ROL.rol
    FROM personas PER
    INNER JOIN colaboradores COL ON COL.idrol = ROL.idrol
    INNER JOIN roles ROL ON ROL.idrol = PER.idrol;
		
END;

-- VISTAS


-- INSERCONES DE DATOS

-- CONSULTAS Y PRUBAS
-- SELECT * FROM personas;
-- SELECT * FROM roles;
-- SELECT * FROM colaboradores;
-- SELECT * FROM tipoProductos;
-- SELECT * FROM marcas;
-- SELECT * FROM productos;
-- SELECT * FROM kardex;