/*-------------------------------------------------------------------│
│              PROCEDIMIENTO ALMACENADO ELIMINAR PRODUCTO            │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Eliminar_Producto(
 IN DLTCod_Producto INT
 )
 BEGIN
 
 DELETE FROM PRODUCTO WHERE Cod_Producto=DLTCod_Producto;


 DELETE FROM PRODUCTO_HAS_TAMAÑO WHERE Producto_Cod_Producto=DLTCod_Producto;

 END//
 
 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/