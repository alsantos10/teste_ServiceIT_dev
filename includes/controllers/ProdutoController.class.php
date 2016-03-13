<?php

class ProdutoController extends _BaseController
{		
	public function __construct($action=null, $data=null) {
		parent::__construct($action, $data);
	}
	
	public function index(){		
		$dao = new ProdutoDAO();
		$produtos = $dao->getList();
		$scripts = $this->getScriptDatatable();
		$content = 'includes/views/produto/index.php';
		include $this->layout;		
	}
	
	public function save(){
		$dao = new ProdutoDAO();
		$produto = new Produto();
		if($this->id){
			$produto = $dao->getProduto($this->id);
			if($produto->getId()==null){
				$produto = null;
				$this->msg = array('Produto não foi encontrado','warning');
			}
		}		
		if($_POST){
			// Aqui deve-se colocar a validação dos dados de entrada
			$data = (object) $_POST;
			$produto->setNome($data->nome);
			$produto->setDescricao($data->descricao);
			$produto->setPreco((float) $data->preco);
			$dao->save($produto);
			$this->msg = $dao->mensagem;
		}
		
		$content = 'includes/views/produto/save.php';
		include $this->layout;
	}
	
	public function excluir(){
		$dao = new ProdutoDAO();
		$produto = new Produto();
		if($this->id){
			$produto = $dao->getProduto($this->id);
			if($produto->getId()!=null){
				$dao->excluir($this->id);
				$this->msg = $dao->mensagem;
			}else{
				$this->msg = array('Produto não foi encontrado', 'danger');
			}
		}
		$content = 'includes/views/produto/delete.php';
		include $this->layout;
	}
}