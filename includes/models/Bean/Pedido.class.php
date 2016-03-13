<?php


class Pedido
{
	private $produto;
	private $cliente;
	private $dataPedido;
	
	
	public function getProduto(){
		return $this->produto;
	}
	public function setProduto(Produto $produto){
		$this->produto = $produto;
	}	
	public function getCliente(){
		return $this->cliente;
	}
	public function setCliente(Cliente $cliente){
		$this->cliente = $cliente;
	}
	
	public function getDataPedido(){
		return $this->dataPedido;
	}
	public function setDataPedido($data){
		$this->dataPedido = $data;
	}
}