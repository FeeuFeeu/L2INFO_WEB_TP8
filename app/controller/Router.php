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
		if( isset($_POST['inputNom']) && !empty($_POST['inputNom']) &&
			isset($_POST['inputPrenom']) && !empty($_POST['inputPrenom']) &&
			isset($_POST['inputJourNais']) && !empty($_POST['inputJourNais']) &&
			isset($_POST['inputMoisNais']) && !empty($_POST['inputMoisNais']) &&
			isset($_POST['inputAnNais']) && !empty($_POST['inputAnNais']) &&
			isset($_POST['inputEmail']) && !empty($_POST['inputEmail']) &&
			isset($_POST['inputMotPasse']) && !empty($_POST['inputMotPasse']) &&
			isset($_POST['inputConfMotPasse']) && !empty($_POST['inputConfMotPasse'])
				) {
					$ic = new InscriptionController;
					$cm = new ClientManager;
					if($ic->validate($_POST['inputNom'],$_POST['inputPrenom'],$_POST['inputJourNais'],
					$_POST['inputMoisNais'],$_POST['inputAnNais'],$_POST['inputEmail'],
					$_POST['inputMotPasse'],$_POST['inputConfMotPasse'])) {
						if(count($cm->clientExiste($_POST['inputEmail']))!=0) {
							return array(
								'view' => DIR_VIEW . 'inscription.php', // string type
								'name' => 'Inscription', // string type
								'status' => 'signin_fail_email'
							);
						}
						$cm->insertClient(
							$_POST['inputNom'],$_POST['inputPrenom'],
							$_POST['inputAnNais'] . "-" . $_POST['inputMoisNais'] . "-" . $_POST['inputJourNais'],
							$_POST['inputEmail'],$_POST['inputMotPasse']
						);
						return array(
							'view' => DIR_VIEW . 'inscription_ok.php', // string type
							'name' => 'Inscription_ok', // string type
							'status' => 'signin_success'
						);
					}
					else {
						return array(
							'view' => DIR_VIEW . 'inscription.php', // string type
							'name' => 'Inscription', // string type
							'status' => 'signin_fail'
						);
					}
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
	* name: connexion()
	* @brief Methode de recuperation des infos lors d'une connexion.
	* @return Infos de la page produits et informations sur la connexion.
	* 
	*/
	private function connexion() {
		$pm = new ProduitManager;
		if(isset($_POST['inputPasse']) and !empty($_POST['inputPasse']) and isset($_POST['inputId']) and !empty($_POST['inputId'])) {
			$pass = $_POST['inputPasse'];
			$mail = $_POST['inputId'];
		}
		else {
			return array(
			'view' => DIR_VIEW . 'produits.php', // string type
			'name' => 'Produits', // string type
			'data' => $pm->getProduits(), // PDOStatement type
			'cats' => $pm->getCategories(), // array type
			'status' => 'login_fail' // string type
			);
		}
		$cm = new ClientManager;
		$res = $cm->connexion($mail,$pass);
		if(count($res)>0) {
			$prenom = $res['prenom'];
			$id = $res['id'];
			$_SESSION['id_client'] = $id;
			$_SESSION['prenom_client'] = $prenom;

			return array(
				'view' => DIR_VIEW . 'produits.php', // string type
				'name' => 'Produits', // string type
				'data' => $pm->getProduits(), // PDOStatement type
				'cats' => $pm->getCategories(), // array type
				'status' => 'login_success' // string type
			);
		}
		return array(
			'view' => DIR_VIEW . 'produits.php', // string type
			'name' => 'Produits', // string type
			'data' => $pm->getProduits(), // PDOStatement type
			'cats' => $pm->getCategories(), // array type
			'status' => 'login_fail' // string type
		);

	}
	
	/*
	* 
	* name: deconnexion()
	* @brief Methode de recuperation des infos lors d'une deconnexion.
	* @return Infos de la page produits et informations sur la connexion.
	* 
	*/
	private function deconnexion() {
		session_destroy();
		$_SESSION['id_client']="";
		$_SESSION['prenom_client']="";
		$pm = new ProduitManager;
		return array(
			'view' => DIR_VIEW . 'produits.php', // string type
			'name' => 'Produits', // string type
			'data' => $pm->getProduits(), // PDOStatement type
			'cats' => $pm->getCategories(), // array type
			'status' => 'logout_success' // string type
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
