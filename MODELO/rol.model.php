<?php
include_once "../MODELO/database.php";
class ProductoModel{
	private $pdo;

	public function __CONSTRUCT(){
		try {
			$this->pdo= database::conectar();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Registrar_Prod(Producto $data){

		try {
			$sql = "CALL Insertar_Producto(?,?,?,?,?,?,?,?,?,?)";

		$this->pdo->prepare($sql)
			 ->execute(
			 array(
					$data->__GET('Cod_Producto'),
					$data->__GET('Nom_prod'),
					$data->__GET('Desc_prod'),
					$data->__GET('Foto_prod'),
					$data->__GET('Desc_tipo_prod'),
					$data->__GET('Stok_min'),
					$data->__GET('Stok_max'),
					$data->__GET('Cantidad_exist'),
					$data->__GET('Desc_tamaño'),
					$data->__GET('Valor_prod')
			    )
		);
		}catch (Exception $e){
			die($e->getMessage());
		}
	}


	public function Listar_Prod(){
		try{
			$result =array();

			$stm = $this->pdo->prepare("CALL Consulta_Producto");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) 
			{
				$producto = new Producto();

				$producto->__SET('Cod_Producto', $r->Cod_Producto);
				$producto->__SET('Nom_prod', $r->Nom_prod);
				$producto->__SET('Desc_prod', $r->Desc_prod);
				$producto->__SET('Foto_prod', $r->Foto_prod);
				$producto->__SET('Desc_tipo_prod', $r->Desc_tipo_prod);
				$producto->__SET('Stok_min', $r->Stok_min);
				$producto->__SET('Stok_max', $r->Stok_max);
				$producto->__SET('Cantidad_exist', $r->Cantidad_exist);
				$producto->__SET('Desc_tamaño', $r->Desc_tamaño);
				$producto->__SET('Valor_prod', $r->Valor_prod);

				$result[]	= $producto;
			}

			return $result;
		} catch(Exception $e){
			die($e->getMessage());
		}
	}


	public function Obtener_Producto($Cod_Producto){
		try{
			$stm =$this->pdo->prepare("CALL Obtener_Producto(?)");

			$stm->execute(array($Cod_Producto));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$producto = new Producto();

				$producto->__SET('Cod_Producto', $r->Cod_Producto);
				$producto->__SET('Nom_prod', $r->Nom_prod);
				$producto->__SET('Desc_prod', $r->Desc_prod);
				$producto->__SET('Foto_prod', $r->Foto_prod);
				$producto->__SET('Desc_tipo_prod', $r->Desc_tipo_prod);
				$producto->__SET('Stok_min', $r->Stok_min);
				$producto->__SET('Stok_max', $r->Stok_max);
				$producto->__SET('Cantidad_exist', $r->Cantidad_exist);
				$producto->__SET('Desc_tamaño', $r->Desc_tamaño);
				$producto->__SET('Valor_prod', $r->Valor_prod);

			return $producto;
		} catch (Exception $e){
			die($e->getMessage());
		}
	}


	public function Actualizar_Producto(Producto $data){
		try{
			$sql = "CALL Actualizar_Producto(?,?,?,?,?,?,?,?,?,?,?)";

			$this->pdo->prepare($sql)
				 ->execute(
				array(
					$data->__GET('Cod_Producto'),
					$data->__GET('Nom_prod'),
					$data->__GET('Desc_prod'),
					$data->__GET('Foto_prod'),
					$data->__GET('Desc_tipo_prod'),
					$data->__GET('Stok_min'),
					$data->__GET('Stok_max'),
					$data->__GET('Cantidad_exist'),
					$data->__GET('Desc_tamaño'),
					$data->__GET('Valor_prod'),
					$data->__GET('Cod_producto2')
					)
			);
		} catch (Exception $e){
			die($e->getMessage());
		}
	}


	public function Eliminar_Producto($Cod_Producto){
		try{
			$stm = $this->pdo->prepare("CALL Eliminar_Producto(?)");

			$stm->execute(array($Cod_Producto));
		} catch (Exception $e){
			die($e->getMessage());
		}
	}
}

?>