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

-- INSERTAR PERSONAS
CALL spu_personas_registrar ('Loyola','Torres','Juan','73217991','123456789','');
CALL spu_personas_registrar ('Loyola','Torres','Jose','73217989','123456780','987654321');

-- INSERTAR COLABORADOR
CALL spu_colaborador_registrar('1','1','miguel','administrador');

-- contraseña encriptada = administrador
UPDATE colaboradores 
SET passusuario = "$2y$10$qE3VvkpqTFXvTBdhGJSFGO.9rXomoFtUA1uHoKOatzvRmOp6S3dqi" 
WHERE idcolaborador = 1;


-- CALL spu_kardex_movimiento (1, 2, 'SALIDA', 3);
-- CALL spu_kardex_movimiento (1, 2, 'ENTRADA', 30);

-- SELECT * FROM kardex;
-- CONSULTAS Y PRUBAS
-- SELECT * FROM personas;
-- SELECT * FROM roles;
-- SELECT * FROM colaboradores;
-- SELECT * FROM tipoProductos;
-- SELECT * FROM marcas;
-- SELECT * FROM productos;
-- SELECT * FROM kardex;

