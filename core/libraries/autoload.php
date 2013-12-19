<?php
	
	/**
	*	Classe que será chamada todas as vezes que a página carregar
	*	
	*/
	class AutoLoad {

		// Ajustando path para a pasta skins correta
		private $_skin 	= 'app/skins/';
		private $_error	= false;
		
		function __construct () {
			
			try {
			
				// Carregando as configurações base para todo o site
				include_once 'app/configs/configs.php';
	
				// Iniciando classes do autoload, setados na página de configuração
				if ($_CLASSES != NULL) :
				
					foreach ($_CLASSES as $key => $value) :
						
						// Dando load nas classes necessárias, passados pelo usuário	
						if (file_exists('app/controllers/'.$value.'.php')) :
							include_once 'app/controllers/'.$value.'.php';
							$$value = new $value();
						elseif (file_exists('core/libraries/'.$value.'.php')) :
							include_once 'core/libraries/'.$value.'.php';
							$$value = new $value();
						else:
							throw new Exception("Erro ao carregar biblioteca", 1);		
						endif;	
						
	
					endforeach;
				
				endif;
	
				//Setando qual é a estrutura de pasta até chegar na skin
				$this->_skin .= $_SKIN.'/';

			}
			catch (Exception $e) {
				echo $e->getMessage();
				$this->_error = false;			// Setando erro no AutoLoad
			}

		} // __construct

		public function callIndex () {

			// TODO - Chamar a index.php da skin
			
			// Carregar página somente se não houve erro ao executar o AutoLoad
			if ($this->_error) :
				include_once $this->_skin.'index.php';
			endif;
			
		} // callIndex

		public function loadController ($class) {
			
			// TODO - Carregar um Controller personalizado da SKIN, que foi criado pelo usuário 
			
			foreach ($class as $key => $value) :
				// Dando load nas classes necessárias, passados pelo usuário
				include_once 'controllers/'.$value.'.php';
				return new $value();
			endforeach;
		
		}

		public function load ($file,$ext = '.php') {

			// TODO - Carregar html, php, scripts, css dentro de uma página da SKIN. 
			// OBS: Não é criar a tag <script> e sim dar um "include_once" na página
			include_once $this->_skin.$file.'.'.$ext;

		} // load

	} // AutoLoad

?>