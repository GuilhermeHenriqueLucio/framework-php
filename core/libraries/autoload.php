<?php
	
	/**
	*	Classe que será chamada todas as vezes que a página carregar
	*	
	*/
	class AutoLoad {

		private $_skin = 'app/skins/';

		function __construct () {
			
			// Carregando as configurações base para todo o site
			include_once 'app/configs/configs.php';

			// Iniciando classes do autoload, setados na página de configuração
			if ($_CLASSES != NULL) :
			
				foreach ($_CLASSES as $key => $value) :
					// Dando load nas classes necessárias, passados pelo usuário
					include_once 'app/controllers/'.$value.'.php';
					$$value = new $value();

				endforeach;
			
			endif;

			//Includando a index da skin
			$this->_skin .= $_SKIN.'/';

		} // __construct

		function callIndex () {

			include_once $this->_skin.'index.php';

		} // callIndex

		function loadController ($class) {
			
			foreach ($class as $key => $value) :
				// Dando load nas classes necessárias, passados pelo usuário
				include_once 'controllers/'.$value.'.php';
				return new $value();
			endforeach;
		
		}

		function load ($file,$ext = '.php') {

			// Dando load nas classes necessárias, passados pelo usuário
			include_once $this->_skin.$file.'.'.$ext;

		} // load

	} // AutoLoad

?>