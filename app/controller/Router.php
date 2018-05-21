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
			'view' => DIR_VIEW . 'produit.php',
			'name' => 'Produit',
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
			'view' => DIR_VIEW . 'produits.php',
			'name' => 'Produits',
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
			'view' => DIR_VIEW . 'panier.php',
			'name' => 'Panier'
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
						// Si le client existe deja -> erreur !
						if($cm->clientExiste($_POST['inputEmail'])) {
							return array(
								'view' => DIR_VIEW . 'inscription.php', 
								'name' => 'Inscription', 
								'status' => 'signin_fail_email'
							);
						}
						// Si champs ok et client inexistant -> inscription !
						$cm->insertClient(
							$_POST['inputNom'],$_POST['inputPrenom'],
							$_POST['inputAnNais'] . "-" . $_POST['inputMoisNais'] . "-" . $_POST['inputJourNais'],
							$_POST['inputEmail'],$_POST['inputMotPasse']
						);
						return array(
							'view' => DIR_VIEW . 'inscription_ok.php', 
							'name' => 'Inscription_ok',
							'status' => 'signin_success'
						);
					}
					// Si valeurs de champs non valides -> erreur !
					else {
						return array(
							'view' => DIR_VIEW . 'inscription.php',
							'name' => 'Inscription',
							'status' => 'signin_fail'
						);
					}
		}
		// Si des champs sont manquants, aucun traitement . 
		return array(
			'view' => DIR_VIEW . 'inscription.php',
			'name' => 'Inscription'
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
			'view' => DIR_VIEW . 'erreur.php',
			'name' => 'Erreur'
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
		// Si les variables sont sont definies ou vides -> erreur !
		else {
			return array(
			'view' => DIR_VIEW . 'produits.php',
			'name' => 'Produits',
			'data' => $pm->getProduits(), // PDOStatement type
			'cats' => $pm->getCategories(), // array type
			'status' => 'login_fail'
			);
		}

		$cm = new ClientManager;
		$res = $cm->connexion($mail,$pass);
		if($res) {
			$prenom = $res['prenom'];
			$id = $res['id'];
			$_SESSION['id_client'] = $id;
			$_SESSION['prenom_client'] = $prenom;

			return array(
				'view' => DIR_VIEW . 'produits.php',
				'name' => 'Produits',
				'data' => $pm->getProduits(), // PDOStatement type
				'cats' => $pm->getCategories(), // array type
				'status' => 'login_success'
			);
		}
		return array(
			'view' => DIR_VIEW . 'produits.php',
			'name' => 'Produits',
			'data' => $pm->getProduits(), // PDOStatement type
			'cats' => $pm->getCategories(), // array type
			'status' => 'login_fail'
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
		unset($_SESSION['id_client']);
		unset($_SESSION['prenom_client']);
		session_destroy();
		$pm = new ProduitManager;
		return array(
			'view' => DIR_VIEW . 'produits.php',
			'name' => 'Produits',
			'data' => $pm->getProduits(), // PDOStatement type
			'cats' => $pm->getCategories(), // array type
			'status' => 'logout_success'
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
