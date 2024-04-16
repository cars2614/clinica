**************************************************************************************
// -- se debe crear este trigger para poder almacenar los datos en la tabla detalles_estados

DELIMITER $$
CREATE TRIGGER recibido
AFTER INSERT ON facturas
FOR EACH ROW
BEGIN
    SET @recibido = (SELECT MAX(facturas.id) FROM facturas);
    INSERT INTO detalles_estados (facturas_id, estados_id)
    SELECT @recibido, 1 FROM facturas WHERE facturas.id = @recibido;
END $$
DELIMITER ;

**************************************************************************************

// -- trigger de insercion cuando se realiza el paquete 
DELIMITER $$
CREATE TRIGGER `realizado` AFTER INSERT ON `cuaderno_pagos`
 FOR EACH ROW BEGIN
    SET @realizado = (SELECT cuaderno_pagos.facturas_id 
                  FROM cuaderno_pagos 
			      WHERE id =  (SELECT MAX(id) FROM cuaderno_pagos) );

    INSERT INTO detalles_estados (facturas_id, estados_id)
    SELECT @realizado, 2 FROM facturas WHERE facturas.id = @realizado;
    
END $$

DELIMITER ;
**************************************************************************************
//-- EN PROCESO

**************************************************************************************
/* php artisan migrate:refresh  "elimina y vuelve a crear todas las tablas".   

php artisan db:seed // ingreso de registros previamente creados en databases/seeders/

 */



**************************************************************************************

