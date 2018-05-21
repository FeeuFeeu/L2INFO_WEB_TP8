<?php
	require_once 'Manager.php';
	
	class ClientManager extends Manager {
		
		public function clientExiste($mail) {
			$db = $this->connectDatabase();
			$requete = "SELECT id,prenom FROM clients WHERE mail='" . $mail . "'";
			$db = $db->prepare($requete);
			$db->execute();
			return $db->fetch();
		}
		
		// retourne true si le client abien été ajouté
		// false si un erreur 
		public function insertClient($nom, $prenom, $naiss, $mail, $mdp) {
			$db = $this->connectDatabase();
			$requete = "INSERT INTO `clients` (`nom`, `prenom`, `naiss`, `mail`, `mdp`) VALUES
			('" . $nom . "','" .
				$prenom . "','" .
				$naiss . "','" .
				$mail . "','" .
				hash('whirlpool', $mdp) .
				"')";
			$db = $db->prepare($requete);
			return $db->execute();
		}
		
		public function connexion($mail, $mdp) {
			$db = $this->connectDatabase();
			$requete = "SELECT id,prenom FROM clients WHERE mail='" . $mail . "' and mdp='" . hash('whirlpool',$mdp) . "'";
			$db = $db->prepare($requete);
			if($db->execute()) {
				return $db->fetch();
			}
			return false;
		}
	}
