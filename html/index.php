<?php

	define('DIR_VIEW', $_SERVER['DOCUMENT_ROOT'] . '/../app/view/');
	define('DIR_CTRL', $_SERVER['DOCUMENT_ROOT'] . '/../app/controller/');
	require_once $_SERVER['DOCUMENT_ROOT'] . '/../app/model/ProduitManager.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/../app/model/ClientManager.php';
	require_once DIR_CTRL . 'Router.php';
	require_once DIR_CTRL . 'InscriptionController.php';
	
	session_start();
	$router = new Router();
	if(isset($_GET['page'])) {
		$data = $router->get($_GET['page']);
	}
	else {
		$data = $router->get("erreur");
	}

	//       afficher ($_GET)

	include DIR_VIEW . 'page.php';
	
