<?php

class Router {
	/*
	* 
	* name: produit()
	* @brief Methode de recuperation des infos pour la page produit.
	* @return Infos de la page produit (array).
	* 
	*/
	private function produit() {
		if(isset($_GET['id'])) {
			$pm = new ProduitManager;
		}
		else {
			return $this->erreur();
		}
		$res = $pm->getProduit($_GET['id']);

		/* Si le resultat de la requete n'est pas exactement
		* une ligne, on renvoie une page d'erreur (id inexistant) */
		if($res->rowCount()!=1) {
			return $this->erreur();
		}
		return array(
			'view' => DIR_VIEW . 'produit.php', // string type
			'name' => 'Produit', // string type
			'data' => $res // PDOStatement type
		);
	}
	
	/*
	* 
	* name: produits()
	* @brief Methode de recuperation des infos pour la page produits.
	* @return Infos de la page produits (array).
	* 
	*/
    private function produits() {
		$pm = new ProduitManager;
		return array(
			'view' => DIR_VIEW . 'produits.php', // string type
			'name' => 'Produits', // string type
			'data' => $pm->getProduits(), // PDOStatement type
			'cats' => $pm->getCategories() // array type
		);
	}
	
	/*
	* 
	* name: panier()
	* @brief Methode de recuperation des infos pour la page panier.
	* @return Infos de la page panier (array).
	* 
	*/
	private function panier() {
		return array(
			'view' => DIR_VIEW . 'panier.php', // string type
			'name' => 'Panier' // string type
		);
	}
   
	/*
	* 
	* name: inscription()
	* @brief Methode de recuperation des infos pour la page inscription.
	* @return Infos de la page inscription (array).
	* 
	*/
	private function inscription() {
		if( isset($_POST['inputNom']) &&
				isset($_POST['inputPrenom']) &&
				isset($_POST['inputJourNais']) &&
				isset($_POST['inputMoisNais']) &&
				isset($_POST['inputAnNais']) &&
				isset($_POST['inputEmail']) &&
				isset($_POST['inputMotPasse']) &&
				isset($_POST['inputConfMotPasse']) ) {
					
		}
		return array(
			'view' => DIR_VIEW . 'inscription.php', // string type
			'name' => 'Inscription' // string type
		);
	}
   
	/*
	* 
	* name: erreur()
	* @brief Methode de recuperation des infos pour la page erreur.
	* @return Infos de la page erreur (array).
	* 
	*/
	private function erreur() {
		header("HTTP/1.0 404 Not Found");
		return array(
			'view' => DIR_VIEW . 'erreur.php', // string type
			'name' => 'Erreur' // string type
		);
	}

	/*
	* 
	* name: get($page)
	* @brief Methode de recuperation des infos pour la page $page.
	* @param $page Nom de la page dont on veut les infos (string).
	* @return Infos de la page $page ou de la page erreur si page inexistante (array).
	* 
	*/
	public function get($page) {
		if(method_exists($this,$page)) {
			return $this->$page(); // array type
		}
		else {
			return $this->erreur(); // array type
		}
	}
}
