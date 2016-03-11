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
	
	public function getProduto($id){
		$this->select('*', "id = $id");
		try {
			$this->conn = Connection::open('config');
			$stmt =  $this->conn->prepare($this->sql);	
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_OBJ);
			
			$p = new Produto();
			$p->setId($row->id);
			$p->setNome($row->nome);
			$p->setDescricao($row->descricao);
			$p->setPreco($row->preco);			
			$this->conn = null;
				
			return $p;
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