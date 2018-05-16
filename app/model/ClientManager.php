<?php
	require_once 'Manager.php';
	
	class ClientManager extends Manager {
		
		public function clientExiste($mail) {
			$db = $this->connectDatabase();
			return $db->query(
				"SELECT id,prenom FROM clients WHERE mail='" . $mail . "'"
			)->fetch();
		}
		
		public function insertClient($nom, $prenom, $naiss, $mail, $mdp) {
			$db = $this->connectDatabase();
			$db->query(
			"INSERT INTO `clients` (`nom`, `prenom`, `naiss`, `mail`, `mdp`) VALUES
			('" . $nom . "','" .
				$prenom . "','" .
				$naiss . "','" .
				$mail . "','" .
				hash('whirlpool', $mdp) .
				"')"
			);
		}
		
		public function connexion($mail, $mdp) {
			$db = $this->connectDatabase();
			$db = $db->query(
				"SELECT id,prenom FROM clients WHERE mail='" . $mail . "' and mdp='" . hash('whirlpool',$mdp) . "'");
			if($db!=false) {
				return $db->fetch();
			}
			return $db;
		}
	}
