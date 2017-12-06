<?php
class Producto {
	private $Cod_Producto;
	private $Cod_Producto2;
	private $Nom_prod;
	private $Desc_prod;
	private $Foto_prod;
	private $Desc_tipo_prod;
	private $Stok_min;
	private $Stok_max;
	private $Cantidad_exist;
	private $Desc_tamaño;
	private $Valor_prod;

	public function __GET($k){ return $this->$k;}
	public function __SET($k, $v){ return $this->$k = $v; }
}
?>