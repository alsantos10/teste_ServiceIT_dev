<?php

class ClienteDAO extends BaseDAO
{
	private $conn;
	
	public function __construct(){
		parent::__construct('clientes');
	}
	
	public function save(Cliente $cliente){
		$dados = $this->bindData($cliente);
		if($cliente->getId() != null){
			$this->update($dados);
			$action = 'Alterado(s)';
		}else{
			$this->insert($dados);
			$action = 'Inserido(s)';
		}
	
		if(!empty($this->sql)){
			try {
				$this->conn = Connection::open('config');
				$stmt = $this->conn->prepare($this->sql);
				if($stmt){
					$rowAffect = $stmt->execute();
				}
				$this->conn = null;
				print("$action $rowAffect registro(s).\n");
			} catch (Exception $e) {
				print("Error {$e->getMessage()}.\n");
			}
		}
	}
	
	public function getCliente($id){
		$this->select('*', "id = $id");
		try {
			$this->conn = Connection::open('config');
			$stmt =  $this->conn->prepare($this->sql);
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_OBJ);
				
			$cliente = new Cliente();
			$cliente->setId($row->id);
			$cliente->setNome($row->nome);
			$cliente->setEmail($row->email);
			$cliente->setTelefone($row->telefone);
			$this->conn = null;
	
			return $cliente;
		} catch (Exception $e) {
			print("Error {$e->getMessage()}.\n");
		}
	}
	
	public function getList(){
		$this->select();
		try {
			$this->conn = Connection::open('config');
			$stmt =  $this->conn->prepare($this->sql);
			$stmt->execute();
			$clientes = array();
			foreach ($result = $stmt->fetchAll(PDO::FETCH_OBJ) as $row){
				$cliente = new Cliente();
				$cliente->setId($row->id);
				$cliente->setNome($row->nome);
				$cliente->setEmail($row->email);
				$cliente->setTelefone($row->telefone);
				$clientes[] = $cliente;
			}
				
			$this->conn = null;
			return $clientes;
		} catch (Exception $e) {
			print("Error {$e->getMessage()}.\n");
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
				print("Excuído(s) $rowAffect registro(s).\n");
			} catch (Exception $e) {
				print("Error {$e->getMessage()}.\n");
			}
		}
	}
	
	private function bindData(Cliente $cliente){
		$dados = array(
				'id' => $cliente->getId(),
				'nome' => $cliente->getNome(),
				'email' => $cliente->getEmail(),
				'telefone' => $cliente->getTelefone(),
		);
		return $dados;
	}
}