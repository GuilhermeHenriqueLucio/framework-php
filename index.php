<?php
	// Iniciando classes automaticamente
	include_once 'core/libraries/AutoLoad.php';
	$GLOBALS['_site'] = new AutoLoad;
	
	if ($GLOBALS['_site']) :
		$GLOBALS['_site']->callIndex();
	endif;
	
?>