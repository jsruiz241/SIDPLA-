<?php
require_once '../CONTROLADOR/rol.control.php';
require_once '../MODELO/rol.model.php';
require_once '../MODELO/database.php';
//logica
$producto = new Producto();
$model = new ProductoModel();
$db = database::conectar();

if(isset($_REQUEST['action'])){
	switch ($_REQUEST['action']) {
		case 'actualizar':
			$producto->__SET('Cod_Producto',	 $_REQUEST['Cod_Producto']);
			$producto->__SET('Nom_prod', 		 $_REQUEST['Nom_prod']);
			$producto->__SET('Desc_prod', 		 $_REQUEST['Desc_prod']);
			$producto->__SET('Foto_prod', 		 $_REQUEST['Foto_prod']);
			$producto->__SET('Desc_tipo_prod',   $_REQUEST['Desc_tipo_prod']);
			$producto->__SET('Stok_min', 		 $_REQUEST['Stok_min']);
			$producto->__SET('Stok_max', 		 $_REQUEST['Stok_max']);
			$producto->__SET('Cantidad_exist',   $_REQUEST['Cantidad_exist']);
			$producto->__SET('Desc_tamaño', 	 $_REQUEST['Desc_tamaño']);
			$producto->__SET('Valor_prod', 		 $_REQUEST['Valor_prod']);
			$producto->__SET('Cod_producto2', 	 $_REQUEST['Cod_producto2']);

			$model->Actualizar_Producto($producto);
			print "<script>alert(\"Producto Actualizado exitosamente.\");window.location='rol.vista.php';</script>";
			break;

		case 'registrar':
			$producto->__SET('Cod_Producto',	 $_REQUEST['Cod_Producto']);
			$producto->__SET('Nom_prod', 		 $_REQUEST['Nom_prod']);
			$producto->__SET('Desc_prod', 		 $_REQUEST['Desc_prod']);
			$producto->__SET('Foto_prod', 		 $_REQUEST['Foto_prod']);
			$producto->__SET('Desc_tipo_prod',   $_REQUEST['Desc_tipo_prod']);
			$producto->__SET('Stok_min', 		 $_REQUEST['Stok_min']);
			$producto->__SET('Stok_max', 		 $_REQUEST['Stok_max']);
			$producto->__SET('Cantidad_exist',   $_REQUEST['Cantidad_exist']);
			$producto->__SET('Desc_tamaño', 	 $_REQUEST['Desc_tamaño']);
			$producto->__SET('Valor_prod', 		 $_REQUEST['Valor_prod']);

			$model->Registrar_Prod($producto);
			print "<script>alert(\"Producto Agregado exitosamente.\");window.location='rol.vista.php';</script>";
			break;

//  		Instancia la clase a eliminar que se encuentra al final de cada registro//

		case 'eliminar':
			$model->Eliminar_Producto($_REQUEST['Cod_Producto']);
			print "<script>alert(\"Producto Eliminado exitosamente.\");window.location='rol.vista.php';</script>";
			break;

//  		Instancia la clase editar que se encuentra al final de cada registro//	


		case 'editar':
			$producto = $model->Obtener_Producto($_REQUEST['Cod_Producto']);
			break;

	}
}

?>

<!DOCTYPE html>
<html lang="es">
	<head>
			<title>CRUD PRODUCTOS ABUELA</title>
	<link rel="stylesheet" href="../css/style_form.css">

	</head>
	<body>

<!-- FORMULARIO NUEVO REGISTRO -->

<br><a href="?action=ver&m=1">NUEVO REGISTRO</a><br><br>

<div id="div_form">
<?php if( !empty($_GET['m']) && !empty($_GET['action']) ){ ?>

<form action="#" method="post">

	<label for="Cod_Producto">Codigo</label>
	<input type="text" name="Cod_Producto" placeholder="Codigo Producto" required>

	<label for="Nom_prod">Nombre</label>
	<input type="text" name="Nom_prod" placeholder="Nombre Producto" required>

	<label for="Desc_prod">Descripcion</label>
	<input type="text" name="Desc_prod" placeholder="Descripcion Producto" required>

	<label for="Foto_prod">Foto</label>
	<input type="text" name="Foto_prod" placeholder="Foto Producto" required>

	<label for="Desc_tipo_prod">Tipo Producto</label>
	<input type="text" name="Desc_tipo_prod" placeholder="Tipo Producto" required>

	<label for="Stok_min">Stok Min</label>
	<input type="text" name="Stok_min" placeholder="Stok Min" required>

	<label for="Stok_max">Stok Max</label>
	<input type="text" name="Stok_max" placeholder="Stok Max" required>

	<label for="Cantidad_exist">Cant existente</label>
	<input type="text" name="Cantidad_exist" placeholder="Cant existente" required>

	<label for="Desc_tamaño">Tamaño</label>
	<input type="text" name="Desc_tamaño" placeholder="Tamaño" required>

	<label for="Valor_prod">Valor</label>
	<input type="text" name="Valor_prod" placeholder="Valor" required>

	<!--<label for="user_pass">Estado rol</label><br>
	ACTIVO <input type="radio" name="estado_rol" value="1" checked>
	INACTIVO <input type="radio" name="estado_rol" value="0">-->

	<br><input type="submit" value= "Guardar" onclick = "this.form.action = '?action=registrar';" />
</form>
</div>

<?php } ?>

<div id="div_form">

<?php if(!empty($_GET['Cod_Producto']) && !empty($_GET['action']) ){ ?>

<form action="#" method="post">

<!--LABEL USUARIO FINAL -->

<label>Producto por modificar:<?php echo $producto->__GET('Cod_Producto'); ?></label>

<br><input type="text" name="Cod_Producto" value="<?php echo $producto->__GET('Cod_Producto'); ?>" style="display:none" placeholder="Codigo" required>


<br> <input type="text" name="Cod_producto2" value="<?php echo $producto->__GET('Cod_Producto'); ?>" placeholder="Codigo" required>
<br> <input type="text" name="Nom_prod" value="<?php echo $producto->__GET('Nom_prod'); ?>" placeholder="Nombre" required>
<br> <input type="text" name="Desc_prod" value="<?php echo $producto->__GET('Desc_prod'); ?>" placeholder="Descripcion" required>
<br> <input type="text" name="Foto_prod" value="<?php echo $producto->__GET('Foto_prod'); ?>" placeholder="Foto" required>
<br> <input type="text" name="Desc_tipo_prod" value="<?php echo $producto->__GET('Desc_tipo_prod'); ?>" placeholder="Tipo producto" required>
<br> <input type="text" name="Stok_min" value="<?php echo $producto->__GET('Stok_min'); ?>" placeholder="Stok Min" required>
<br> <input type="text" name="Stok_max" value="<?php echo $producto->__GET('Stok_max'); ?>" placeholder="Stok Max" required>
<br> <input type="text" name="Cantidad_exist" value="<?php echo $producto->__GET('Cantidad_exist'); ?>" placeholder="Cantidad exist" required>
<br> <input type="text" name="Desc_tamaño" value="<?php echo $producto->__GET('Desc_tamaño'); ?>" placeholder="Tamaño" required>
<br> <input type="text" name="Valor_prod" value="<?php echo $producto->__GET('Valor_prod'); ?>" placeholder="Valor" required>


<br><input type="submit" value= "Actualizar" onclick = "this.form.action = '?action=actualizar';" />

</form>
</div>

<?php }

$sq11= "CALL Consulta_Producto";

$query= $db->query($sq11);

if($query->rowCount()>0):?>

	<br><h1>Consulta - Registros</h1><br>
	<table id="customers">
		<thead>
			<tr>
				<th>Codigo</th>
				<th>Nombre</th>
				<th>Descripcion</th>
				<th>Foto</th>
				<th>Stok_min</th>
				<th>Stok_max</th>
				<th>Cantidad_exist</th>
				<th>Valor_prod</th>
				<th>Desc_tamaño</th>
				<th>Desc_tipo_prod</th>
				<th>Editar</th>
				<th>Eliminar</th>

			</tr>
		</thead>
	

<?php foreach ($model->Listar_Prod() as $r): ?>
	<tr>
		<td><?php echo $r->__GET('Cod_Producto'); ?></td>
		<td><?php echo $r->__GET('Nom_prod'); ?></td>
		<td><?php echo $r->__GET('Desc_prod'); ?></td>
		<td><?php echo $r->__GET('Foto_prod'); ?></td>
		<td><?php echo $r->__GET('Stok_min'); ?></td>
		<td><?php echo $r->__GET('Stok_max'); ?></td>
		<td><?php echo $r->__GET('Cantidad_exist'); ?></td>
		<td><?php echo $r->__GET('Valor_prod'); ?></td>
		<td><?php echo $r->__GET('Desc_tamaño'); ?></td>
		<td><?php echo $r->__GET('Desc_tipo_prod'); ?></td>

		<td>
		<a href="?action=editar&Cod_Producto=<?php echo $r->Cod_Producto; ?>">Editar</a>
	    </td>

	    <td>
		<a href="?action=eliminar&Cod_Producto=<?php echo $r->Cod_Producto; ?>" onclick="return confirm('¿Esta seguro de eliminar este Producto?')">Eliminar</a>
	    </td>

	</tr>
<?php endforeach; ?>

</table>

<?php else:?>

	<h4 class="alert-danger">Señor Usuario No se Encuentran Registros!!!</h4>

<?php endif;?>

</body>
</html>

