<?php
	
	/**
	*	Classe que será chamada todas as vezes que a página carregar
	*	
	*/
	
	// Includando a classe redirect
	include_once 'core/libraries/Redirects.php';
	
	class AutoLoad {

		// Ajustando path para a pasta skins correta
		private $_skin 	= 'app/skins/';
		private $_error	= false;
		private $_logger; 
		private $_redir;
		private $_DAO;
		
		function __construct () {
			
			// TODO - Função automatica, base para todo o site
			
			try {
				
				// Inicializando a classe Redirect
				$this->_redir = new Redirects();
				
				// Carregando as configurações base para todo o site
				include_once 'app/configs/configs.php';
				
				// Carregando Logger
				include_once 'core/libraries/Logger.php';
				$this->_logger = new Logger();
				
				// Verificando se o banco de dados será utilizado
				if ($_DATABASE['flag']) :
					
					// Carregando DAO
					include_once 'core/models/DAO.php';
					$this->_DAO = new DAO($_DATABASE['user'],$_DATABASE['pass'],$_DATABASE['db']);
				
				endif;
				
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
							throw new Exception("Erro ao carregar biblioteca ".$value, 1);		
						endif;	
						
	
					endforeach;
				
				endif;
	
				//Setando qual é a estrutura de pasta até chegar na skin
				$this->_skin .= $_SKIN.'/';

			}
			catch (Exception $e) {
				$this->_logger->writeLog("[ERROR] ".$e->getMessage());
				$this->_error = true;			// Setando erro no AutoLoad
				$this->_redir->doRedirect($_INDEX.'error/500');
			}

		} // __construct

		public function callPage ($url) {

			// TODO - Chamar a página php da skin de acordo com a URL
			
			// Carregar página somente se não houve erro ao executar o AutoLoad
			if (!$this->_error) :
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
		
		public function getParametersURL ($url) {
			
			return explode('/',$url);
			
		} // getParametersURL
		
		
	} // AutoLoad

?>