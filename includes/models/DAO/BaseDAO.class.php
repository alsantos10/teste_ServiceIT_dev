<?php


class BaseDAO
{
	public $sql;
	private $entity;
	private $columnValues;
	
	public function __construct($entity){
		$this->entity 	= $entity;
	}
	
	public function insert($arrayValues){
		$this->loadValues($arrayValues);
		$this->sql = "INSERT INTO " . $this->entity ."(";		
				
		// monta string conendo nomes de colunas e outra de valores
		$columns = implode(', ', array_keys($this->columnValues));
		$values  = implode(', ', array_values($this->columnValues));
		$this->sql .= $columns . ')';
		$this->sql .= " values ({$values})";
		return $this->sql;
	}


	public function delete($id){
		$this->sql = "DELETE FROM {$this->entity}";
		// retorna a clausula WHERE do objeto $this->criteria
		if(isset($id)){
			$this->sql .= ' WHERE id = ' . $id;
		}
		return $this->sql;
	}


	public function update($arrayValues){
		$this->loadValues($arrayValues);
		
		$this->sql = "UPDATE " . $this->entity;		
		// monta string conendo nomes de colunas e outra de valores
		// monta pares : coluna=valor
		if($this->columnValues){
			foreach($this->columnValues as $col => $val){
				if($col!='id'){
					$set[] = "{$col} = {$val}";
				}
			}
		}		
		$this->sql .= ' SET ' . implode(', ', $set);
		$this->sql .= ' WHERE id = ' . $this->columnValues['id'];		
		return $this->sql;
	}


	public function select($arrayColumns = '*', $query = null){
		$this->sql = "SELECT ";
		// Monta String com nomes das colunas
		if(is_array($arrayColumns)){
			$this->sql .= implode(',',$arrayColumns);
		}else{
			$this->sql .= $arrayColumns;
		}
		$this->sql .= ' FROM ' . $this->entity;
		
		// obtem as propriedades WHERE do objeto
		if(isset($query)){
			$this->sql .= ' WHERE ' . $query;
		}
		return $this->sql;
	}
	
	private function loadValues($arrayValues){
		$fields = array();
		foreach ($arrayValues as $field => $value){
			// verifica se e valor excalar (string, inteiro ...)
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
	}
}