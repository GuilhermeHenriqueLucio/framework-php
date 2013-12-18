<?php
	// Iniciando classes automaticamente
	include_once 'core/libraries/autoload.php';
	$GLOBALS['_site'] = new AutoLoad;
	$GLOBALS['_site']->callIndex();
?>