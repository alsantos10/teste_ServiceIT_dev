<?php

final class Connection
{	
	/*
	 ** metodo __construct()
	 ** não existirão instancias de TConnecion, por isso marcamos como private
	 */
	private function __construct(){}
	/*
	 ** metodo open()
	 ** recebe o nome do BD e instancia o objeto PDO correspondente
	 */
	public static function open($name){
		// verifica se existe arquivo de configuração para este BD
		if(file_exists("config/{$name}.ini")){
			// lê o INI e retorna um array()
			$db = parse_ini_file("../../config/{$name}.ini");
		}
		else{
			// se não existir, lança um erro
			throw new Exception("Arquivo de configuração {$name} não foi encontrado.");
		}
	
		// lê as informações contidas no arquivo
		$user = isset($db['user']) ? $db['user'] : NULL;
		$pass = isset($db['pass']) ? $db['pass'] : NULL;
		$name = isset($db['name']) ? $db['name'] : NULL;
		$host = isset($db['host']) ? $db['host'] : NULL;
		$type = isset($db['type']) ? $db['type'] : NULL;
		$port = isset($db['port']) ? $db['port'] : NULL;
	
		// descobre qual o tipo (driver) de BD a ser utilizado
		switch($type):
		case 'pgsql':
			$port = $port ? $port : '5432';
			$conn = new PDO("pgsql: dbname={$name}; user={$user}; password={$pass}; host=[$host]; port={$port}");
			break;
		case 'mysql':
			$port = $port ? $port : '3306';
			$conn = new PDO("mysql: host={$host}; port={$port}; dbname={$name}", $user, $pass);
			break;
		case 'sqlite':
			$conn = new PDO("sqlite: {$name}");
			break;
		case 'ibase':
			$conn = new PDO("firebird: dbname={$name}", $user, $pass);
			break;
		case 'oci8':
			$conn = new PDO("oci: dbname={$name}", $user, $pass);
			break;
		case 'mssql':
			$conn = new PDO("mssql:host={$host},1433;dbname={$name}", $user, $pass);
			break;
			endswitch;
	
			// define para que o PDO exceções na ocorrencia de erros
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
			// retorna o objeto instanciado
			return $conn;
	}
}