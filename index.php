<?php
	// Iniciando classes automaticamente
	include_once 'core/libraries/AutoLoad.php';
	$GLOBALS['_site'] = new AutoLoad;
	
	// Recuperando valor da URL
	$url = (isset($_GET['url'])) ? $_GET['url'] : 'index';
	
	// Dando um SPLIT na URL e salvando valor em um array GLOBAL, isso dará acesso a essa variável dentro da skin
	$GLOBALS['_params'] = $GLOBALS['_site']->getParametersURL($url);
	
	// Chamando a página desejada, primeiro parâmetro da URL
	$GLOBALS['_site']->callPage($GLOBALS['_params'][0]);
?>