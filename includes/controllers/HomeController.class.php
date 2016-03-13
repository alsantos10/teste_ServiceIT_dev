<?php

class HomeController extends _BaseController
{
	public function __construct($action=null, $data=null) {
		parent::__construct($action, $data);
	}

	public function index(){
		$dao = new PedidoDAO();
		$pedidos = $dao->getList();
		if(empty($pedidos)){
			$this->msg = "Nenhum pedido encontrado";
		}
		$content = 'includes/views/main/index.php';
		include $this->layout;
	}

	public function erro(){
		if(empty($pedidos)){
			$this->msg = "Nenhum pedido encontrado";
		}
		$content = 'includes/views/error/404.php';
		include $this->layout;
	}
}