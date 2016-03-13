<?php

class PedidoDAO extends BaseDAO
{
	private $conn;
	
	public function __construct(){
		parent::__construct('pedidos');
	}

	public function save(Pedido $pedido){
		$dados = $this->bindData($pedido);
		$this->insert($dados);
		$action = 'Inserido';
	
		if(!empty($this->sql)){
			try {	
				$id = null;
				$this->conn = Connection::open('config');
				$stmt = $this->conn->prepare($this->sql);
				if($stmt){
					$rowAffect = $stmt->execute();
				}
				$this->conn = null;
				$this->mensagem = array("$action $rowAffect registro.",'success');
			} catch (Exception $e) {
				//print("Error {$e->getMessage()}.\n");
				$this->mensagem = array("Ocorreu um erro de conexão. Tente novamente mais tarde", 'warning');
			}
		}		
	}
	
	public function getList(){
		$this->select();
		try {
			$this->conn = Connection::open('config');
			$stmt =  $this->conn->prepare($this->sql);	
			$stmt->execute();
			$pedidos = array();
			$pDao = new ProdutoDAO();
			$cDao = new ClienteDAO();
			foreach ($result = $stmt->fetchAll(PDO::FETCH_OBJ) as $row){
				$produto = $pDao->getProduto($row->id_produto);
				$cliente = $cDao->getCliente($row->id_cliente);
				$p = new Pedido();
				$p->setProduto($produto);
				$p->setCliente($cliente);
				$p->setDataPedido($row->data_pedido);
				$pedidos[] = $p;
			}
			$pDao = null;
			$cDao = null;
			$this->conn = null;			
			return $pedidos;
		} catch (Exception $e) {
			//print("Error {$e->getMessage()}.\n");
			$this->mensagem = array("Ocorreu um erro de conexão. Tente novamente mais tarde", 'warning');
		}		
	}
	
	public function excluir($id){
		if($id!= null){
			$this->delete($id);
		}
		if(!empty($this->sql)){
			try {
				$this->conn = Connection::open('config');
				$stmt = $this->conn->prepare($this->sql);
				if($stmt){
					$rowAffect = $stmt->execute();
				}
				$this->conn = null;
				$this->mensagem = array("Excluído $rowAffect registro.",'success');
			} catch (Exception $e) {
				//print("Error {$e->getMessage()}.\n");
				$this->mensagem = array("Ocorreu um erro de conexão. Tente novamente mais tarde", 'warning');
			}
		}
	}
	
	private function bindData(Pedido $pedido){
		$dados = array(
			'id_cliente' => $pedido->getCliente()->getId(),
			'id_produto' => $pedido->getProduto()->getId(),
			'data_pedido' => $pedido->getDataPedido()
		);
		return $dados;
	}
	
	
}