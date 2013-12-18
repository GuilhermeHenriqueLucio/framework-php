<?php
	
	/** 
	* 	Definindo o path base para o site
	*	Exemplo: http://localhost/site_exemplo/
	*/
	$GLOBALS['__CONFIGS__']['PATH'] = '';
	
	/**
	*	Setando qual a skin eu estou usando para o projeto
	*/
	$GLOBALS['__CONFIGS__']['SKIN'] = 'default';

	/**
	*	Setando configurações para o banco de dados
	*	Nome do banco e senha
	*/
	$GLOBALS['__CONFIGS__']['DATABASE']['NAME'] = '';
	$GLOBALS['__CONFIGS__']['DATABASE']['PASS'] = '';

	/**
	*	Setando classes que farão parte do autoload
	*	Exemplo: array("exampleClass")
	*/
	$GLOBALS['__CONFIGS__']['AUTOLOAD'] = array();

	// Setando variáveis curtas
	$__CONFIGS 	= $GLOBALS['__CONFIGS__'];
	$_DATABASE	= $__CONFIGS['DATABASE'];
	$_CLASSES 	= $__CONFIGS['AUTOLOAD'];
	$_SKIN		= $__CONFIGS['SKIN'];
?>