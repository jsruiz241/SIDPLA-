/*-------------------------------------------------------------------│
│              PROCEDIMIENTO ALMACENADO INGRESAR PRODUCTO            │
│-------------------------------------------------------------------*/																	 
 DELIMITER //
 CREATE PROCEDURE Actualizar_Producto(
 IN newCod_Producto INT,
 IN newNom_prod VARCHAR(45),
 IN newDesc_prod VARCHAR(100),
 IN newFoto_prod VARCHAR(70),
 IN newTipo_producto INT,
 IN newStok_min INT,
 IN newStok_max INT,
 IN newCantidad_exist INT,
 IN newCod_tamaño INT,
 IN newValor_prod DECIMAL(10,2),
 IN oldCod_Producto INT
 )
 BEGIN
 
 UPDATE PRODUCTO SET Cod_Producto=newCod_Producto,Nom_prod=newNom_prod,Desc_prod=newDesc_prod,
 Foto_prod=newFoto_prod,Tipo_producto=newTipo_producto,Stok_min=newStok_min,Stok_max=newStok_max,Cantidad_exist=newCantidad_exist WHERE Cod_Producto = oldCod_Producto;


 UPDATE PRODUCTO_HAS_TAMAÑO SET Producto_Cod_Producto=newCod_Producto,Tamaño_Cod_tamaño=newCod_tamaño,
 Valor_prod=newValor_prod WHERE Producto_Cod_Producto=oldCod_Producto;

 END//
 
 DELIMITER ;
/*             											             │
│-------------------------------------------------------------------*/