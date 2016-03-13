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
			$action = 'Alterado';
		}else{
			$this->insert($dados);
			$action = 'Inserido';
		}
	
		if(!empty($this->sql)){
			try {
				$id = null;
				$this->conn = Connection::open('config');
				$stmt = $this->conn->prepare($this->sql);
				if($stmt){
					$rowAffect = $stmt->execute();
					$id = ($cliente->getId() != null)?$cliente->getId():$this->conn->lastInsertId();
				}
				$this->conn = null;
				$this->mensagem = array("$action $rowAffect registro.",'success');
				return $id;
			} catch (Exception $e) {
				//print("Error {$e->getMessage()}.\n");
				$this->mensagem = array("Ocorreu um erro de conexão. Tente novamente mais tarde", 'warning');
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
			$count = $stmt->rowCount();
			$cliente = new Cliente();
			if($count>0){
				$cliente->setId($row->id);
				$cliente->setNome($row->nome);
				$cliente->setEmail($row->email);
				$cliente->setTelefone($row->telefone);
			}
			$this->conn = null;
	
			return $cliente;
		} catch (Exception $e) {
			//print("Error {$e->getMessage()}.\n");
			$this->mensagem = array("Ocorreu um erro de conexão. Tente novamente mais tarde", 'warning');
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