use dbkardex;


-- Insertar marcas de tecnología
INSERT INTO marcas (marca) VALUES
('Apple'),
('Dell'),
('Samsung'),
('Microsoft'),
('Sony'),
('Bose'),
('Nintendo'),
('Fitbit'),
('HP'),
('Cisco');

-- Insertar tipos de productos de tecnología
INSERT INTO tipoProductos (tipoproducto) VALUES
('Smartphones'),
('Laptops'),
('Televisores'),
('Tabletas'),
('Cámaras digitales'),
('Auriculares inalámbricos'),
('Consolas de videojuegos'),
('Smartwatches'),
('Impresoras'),
('Routers y dispositivos de red');

INSERT INTO roles (rol) VALUES
('Administrador de almacén'),
('Supervisor de inventario'),
('Operador de montacargas'),
('Receptor de mercancías'),
('Despachador de mercancías'),
('Empacador'),
('Inspector de calidad'),
('Coordinador de envíos'),
('Asistente de atención al cliente');




call spu_personas_registrar ('Loyola','Torres','Juan','73217991','123456789','');
call spu_personas_registrar ('Loyola','Torres','Jose','73217989','123456780','987654321');
CALL spu_colaborador_registrar('1','1','miguel','administrador');


-- contraseña encriptada = administrador
UPDATE colaboradores 
SET passusuario = "$2y$10$qE3VvkpqTFXvTBdhGJSFGO.9rXomoFtUA1uHoKOatzvRmOp6S3dqi" 
WHERE idcolaborador = 1;

-- call spu_producto_reporte(3)

-- NOTA : VERIFICAR SI ES NECESARIO EL SPU DE ROL !!!
/*DELIMITER $$
CREATE PROCEDURE spu_rol_registrar (IN _rol VARCHAR(60))
BEGIN
	INSERT INTO roles 
		(rol)	VALUES
        (_rol);
END $$*/



/*DELIMITER //
CREATE FUNCTION retorna_dni ()
RETURNS BOOL
BEGIN
    DECLARE nrodocumento INT;
    SELECT COUNT(*) INTO total FROM personas;
    RETURN total;
END//
DELIMITER ;*/


-- SET FOREIGN_KEY_CHECKS = 1;

-- CALL spu_kardex_movimiento (1, 2, 'SALIDA', 5);
-- CALL spu_kardex_movimiento (1, 2, 'ENTRADA', 15);

-- SELECT * FROM kardex;

