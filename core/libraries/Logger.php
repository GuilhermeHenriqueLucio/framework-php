<?php
	
	class Logger {
		
		// Definindo a estrutura de pastas até o log
		private $folder = 'core/logs/';
		
		function __construct () {
			//$this->writeLog("[ERROR] Teste");
		}
		
		public function writeLog ($msg) {

			// TODO - Escrever Logs de eventos realizados no sistema, cada ação do usuário será gravada no log

			// Recuperando o dia atual para ser utilizado tanto no log quanto na estruturação das pastas
			$date = date('Y-m-d');
			$time = date('H:i:s');
			
			// Criando o diretório e separando por dia
			$this->createDirectory($date);
			
			// Abrir o arquivo em modo w+ significa que o servidor tentará buscar pelo arquivo, caso não encontre ele tentará criá-lo, e o cursor vai para o começo
			$file = fopen($this->folder.$date.'/logger.txt', 'a+');
			
			// Escrevendo a mensagem do log [12/05/2013 12:12:45][ERROR] - Uma mensagem de erro personalizada 
			fwrite($file, "[$date $time]".$msg."\n");
			
			// Finalizando a edição do log
			fclose($file);
		
		} // writeLog 

		private function createDirectory ($date) {

			// TODO - Verificar se existe a estrutura de pastas referentes a data atual, isso para que o log tenha uma estrutura de pastas separada por dia

			// Unindo a pasta padrão e a data de hoje
			$path = $this->folder.$date;

			// Verificando se o diretório já existe. is_dir("caminho/nome_pasta")
			if (is_dir($path)) :
				return $path;
			else:
				mkdir($path,0777);
			endif;	

		} // createDirectory

	}

?>