<?php
    
    class DAO {
    	
		private $user;
		private $pass;
		private $database;
		
		private $conn;
		private $stmt;
		
		function __construct ($user, $pass, $database) {
			$this->user = $user;
			$this->pass = $pass;
			$this->database = $database;	
			$this->connect();
		} 
		
		private function connect () {
			
			// TODO - Conectar-se ao banco de dados
			
			try {
				// Conectando se ao mysql
				$this->conn = new PDO('mysql:host=localhost;dbname='.$this->database, $this->user, $this->pass);
				return true;
			}
			catch (Exception $e) {
				// Estourar um erro caso não seja possível se conectar ao banco via PDO
				throw new Exception("Erro ao conectar ao banco de dados", 1);
			}
			
		} // connect
		
		public function select ($table, $data, $extra) {
			
			// TODO - Responsável por todas as consultas do site
			
			// Inicio da query
			$query = 'SELECT ';
			
			// Preenchendo os campos da tabela
			foreach ($data as $key => $value) :
				
				// Varrendo Array concatenando o nome dos campos da tabela
				$query .= $value;
				
			endforeach;
			
			// Informando qual tabela buscar, e dando espaço para opções como a cláusula WHERE ou LIMIT
			$query .= 'FROM '.$table.' '.$extra;

			// Preparando Query
			$this->stmt = $this->conn->prepare($query);
			$this->stmt->execute();
			
			$returnData = $this->stmt->fetchAll(PDO::FETCH_ASSOC);	
			
			return $returnData;
			
		} // select
		
		public function insert ($table, $data, $extra) {
			
			// TODO - Responsável por todos os INSERTs do site
			
			// INSERT INTO `tb_exemplo` (campo,campo) VALUES ("campo","campo")
			
			$query = 'INSERT INTO '.$table.'(';
			
			$countFields = count($data['fields']);
			$countValues = count($data['values']);
			
			if ($countFields != $countValues && $countFields > 0) :
				throw new Exception("[ERROR] Informações inválidas para inserção no banco", 1);
			endif;	
			
			// Alterando texto conforme número de campos
			$value = ($countFields == 1) ? 'VALUE' : 'VALUES';

			// Loop com campos Exemplo: (id, usuario, senha)
			foreach ($data as $key => $value) :
				$query .= $value['fields'].', ';
			endforeach;
			
			// Fechando parênteses de campos + VALUES + abrir parênteses dos valores 
			$query .= ') '.$value.' (';
			
			// Loop com os valores (1,"Guilherme Lucio","guilherme@gmail.com")
			foreach ($data as $key => $value) :
				$query .= '"'.$value['values'].'"';
			endforeach;	
			
			// Fechando parênteses com valores 
			$query .= ')';
			
			$this->stmt = $this->conn->prepare($query);
			$this->stmt->execute();
			
			return true;
			
		} // insert 
		
		public function update ($table, $data, $extra) {
			
			// TODO - Responsável por todos os UPDATES do site
			
			// UPDATE `tb_exemplo` SET campo="campo", campo2="campo2" WHERE id=12
			
			// Inicio da query + tabela + SET
			$query = 'UPDATE `'+$table+'` SET ';
			
			// Preenchendo valores (campo="campo", campo1="campo1")
			foreach ($data as $key => $value) :
				if ($key == end(array_keys($data['fields']))) :
					// Retirando a vírgula do último registro
					$query .= $data['fields'].' '.$data['values'];
				else:
					// Colocando vírgula pra separar os campos
					$query .= $data['fields'].' '.$data['values'].',';
				endif;	
			endforeach;
			
			// Condicionais WHERE id = 12
			$query .= ' WHERE '.$extra;
			
			$this->stmt = $this->conn->prepare($query);
			$this->stmt->execute();
			
			return true;
			
		} // update
		
		public function delete ($table, $extra) {
			
			// TODO - Responsável por todos os deletes do site
			
			// DELETE FROM `tb_exemplo` WHERE id = id
			$query = 'DELETE FROM `'.$table.'`'.$extra;
			
			$this->stmt = $this->conn->prepare($query);
			$this->stmt->execute();
			
			return true;
			
		} // delete 
		
    } // Data Access Object
    
?>