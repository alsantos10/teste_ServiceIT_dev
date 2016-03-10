<?php

namespace Bean;

class PedidoBean
{
	private $idProduto;
	private $idCliente;
	private $dataPedido;
	
	
	public function getIdProduto(){
		return $this->idProduto;
	}
	public function setIdProduto($id){
		$this->idProduto = $id;
	}
	
	public function getIdCliente(){
		return $this->idCliente;
	}
	public function setIdCliente($id){
		$this->idCliente = $id;
	}
	
	public function getDataPedido(){
		return $this->dataPedido;
	}
	public function setDataPedido($data){
		$this->dataPedido = $data;
	}
}