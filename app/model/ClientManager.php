<?php
	require_once 'Manager.php'
	
	class ClientManager extends Manager {
		
		public function insertClient($nom, $prenom, $naiss, $mail, $mdp) {
			$db = $this->connectDatabase();
			$db->query(
				"insert into clients nom prenom naiss mail mdp
				values (". $nom . "," .
				$prenom . "," .
				$naiss . "," .
				$mail . "," .
				hash('whirlpool', $mdp) .
				");"
			);
		}
	}
