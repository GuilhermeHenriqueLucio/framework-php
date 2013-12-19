<?php
	
	// Definindo o path base para o site
	// Exemplo: http://localhost/site_exemplo/
	$_PATH 	= '';
	$_INDEX	= 'http://localhost/admin/';

	// Setando qual a skin eu estou usando para o projeto
	$_SKIN 	= 'default';

	// Setando configurações para o banco de dados
	// Flag True significa usar o banco, FLAG false não usar
	// Usuário , senha e nome do banco
	$_DATABASE['flag'] 	= false;
	$_DATABASE['user'] 	= '';
	$_DATABASE['pass'] 	= '';
	$_DATABASE['db'] 	= '';

	// Setando classes que farão parte do autoload
	// Exemplo: array("exampleClass")
	$_CLASSES 	= array("Logger");
?>