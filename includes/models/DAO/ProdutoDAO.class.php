<?php


class ProdutoDAO extends BaseDAO
{
	private $conn;
	
	public function __construct(){
		parent::__construct('produtos');
	}

	public function save(Produto $produto){
		$dados = $this->bindData($produto);
		if($produto->getId() != null){
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
					$id = ($produto->getId() != null)?$produto->getId():$this->conn->lastInsertId();
				}
				$this->conn = null;
				$this->mensagem = array("$action $rowAffect registro.", 'success');
				return $id;
			} catch (Exception $e) {
				//print("Error {$e->getMessage()}.\n");
				$this->mensagem = array("Ocorreu um erro de conexão. Tente novamente mais tarde", 'warning');
			}
		}		
	}
	
	public function getProduto($id){
		$this->select('*', "id = $id");
		try {
			$this->conn = Connection::open('config');
			$stmt =  $this->conn->prepare($this->sql);	
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_OBJ);
			$count = $stmt->rowCount();
			$p = new Produto();
			if($count>0){
				$p->setId($row->id);
				$p->setNome($row->nome);
				$p->setDescricao($row->descricao);
				$p->setPreco($row->preco);
			}
			$this->conn = null;
				
			return $p;
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
			$produtos = array();
			foreach ($result = $stmt->fetchAll(PDO::FETCH_OBJ) as $row){
				$p = new Produto();
				$p->setId($row->id);
				$p->setNome($row->nome);
				$p->setDescricao($row->descricao);
				$p->setPreco($row->preco);
				$produtos[] = $p;
			}
			
			$this->conn = null;			
			return $produtos;
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
				$this->mensagem = array("Excluído $rowAffect registro.", 'success');
			} catch (Exception $e) {
				//print("Error {$e->getMessage()}.\n");
				$this->mensagem = array("Ocorreu um erro de conexão. Tente novamente mais tarde", 'warning');
			}
		}
	}
	
	private function bindData(Produto $produto){
		$dados = array(
			'id' => $produto->getId(),
			'nome' => $produto->getNome(),
			'descricao' => $produto->getDescricao(),
			'preco' => $produto->getPreco(),
		);
		return $dados;
	}
}