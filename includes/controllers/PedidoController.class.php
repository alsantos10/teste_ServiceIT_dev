<?php

class PedidoController extends _BaseController
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
		$scripts = $this->getScriptDatatable();
		$content = 'includes/views/pedido/index.php';
		include $this->layout;
	}
	
	public function save(){
		$dao = new PedidoDAO();
		$pedido = new Pedido();
		
		$listProdutos = $this->bindProdutos();
		$listClientes = $this->bindClientes();
		
		if($_POST){
			$data = (object) $_POST;
			if($data->id_produto== null || $data->id_produto  ==null){
				$this->msg = array('Favor selecionar cliente e produto','warning');
			}else{
			
				$pDao = new ProdutoDAO();
				$cDao = new ClienteDAO();
				
				$produto = $pDao->getProduto($data->id_produto);
				$cliente = $cDao->getCliente($data->id_cliente);
				if(!empty($cliente->getId())){
					$pedido->setCliente($cliente);				
				}else{
					$this->msg = array('Cliente não foi encontrado','warning');
				}
				if(!empty($produto->getId())){
					$pedido->setProduto($produto);				
				}else{
					$this->msg = array('Produto não foi encontrado','warning');
				}
				if($msg==null){
					$dao->save($pedido);
					$this->msg = $dao->mensagem;
					$pedido = null;
				}
			}
		}

		$content = 'includes/views/pedido/save.php';
		include $this->layout;
	}
	
	private function bindProdutos(){
		$dao = new ProdutoDAO();
		$produtos = $dao->getList();
		$produtosArray = null;
		if($produtos){
			foreach ($produtos as $produto){
				$produtosArray[] = array(
					'id'   => $produto->getId(),
					'nome' => $produto->getNome()
				);
			}
		}
		return $produtosArray;
	}
	
	private function bindClientes(){
		$dao = new ClienteDAO();
		$clientes = $dao->getList();
		
		$clientesArray = null;
		if($clientes){
			foreach ($clientes as $cliente){
				$clientesArray[] = array(
					'id'   => $cliente->getId(),
					'nome' => $cliente->getNome()
				);
			}
		}		
		return $clientesArray;
	}
}