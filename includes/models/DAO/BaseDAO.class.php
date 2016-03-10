<?php

namespace DAO;

class BaseDAO
{
	protected $sql;
	private $entity;
	private $columnValues;
	
	public function __construct($entity){
		$this->entity 	= $entity;
	}
	
	public function insert($arrayValues){
		$this->sql = "INSERT INTO " . $this->entity ."(";
		$fields = "";	
		
		foreach ($arrayValues as $field => $value){
			// verifica se Ã© valor excalar (string, inteiro ...)
			if(is_scalar($value)){
				if(is_string($value) AND (!empty($value))){
					// adiciona  \ em aspas
					$value = addslashes($value);
					$this->columnValues[$field] = "'$value'";
				}
				elseif(is_bool($value)){
					$this->columnValues[$field] = $value ? 'TRUE' : 'FALSE';
				}
				elseif($value !== ''){
					// caso seja outro tipo  de dado
					$this->columnValues[$field] = $value;
				}
				else{
					// caso seja nulo
					$this->columnValues[$field] = "NULL";
				}
			}
		}	
		// monta string conendo nomes de colunas e outra de valores
		$columns = implode(', ', array_keys($this->columnValues));
		$values  = implode(', ', array_values($this->columnValues));
		$this->sql .= $columns . ')';
		$this->sql .= " values ({$values})";		
	}


	public function delete($id){
	
	}


	public function update($array){
	
	}
	
	public function getList(){
		$this->sql = "SELECT * FROM " . $this->entity;
	}


	public function select($id){
	
	}
}