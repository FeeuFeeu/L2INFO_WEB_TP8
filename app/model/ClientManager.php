<?php
	require_once 'Manager.php';
	
	class ClientManager extends Manager {
		
		/*
			* 
			* name: clientExiste($mail)
			* @brief Fonction de verification de l'existence d'un client dans la BD.
			* @param $mail Adresse mail du client dont on verifie l'existence.
			* @return
			* Vrai si le $mail est dans la BD, false sinon.
			* 
		*/
		public function clientExiste($mail) {
			$db = $this->connectDatabase();
			$requete = "SELECT id,prenom FROM clients WHERE mail=:mail";
			$db = $db->prepare($requete);
			$db->bindParam(':mail',$mail);
			$db->execute();
			return $db->fetch();
		}
		
		/*
			* 
			* name: clientExiste($mail)
			* @brief Fonction de verification de l'existence d'un client dans la BD.
			* @param $mail Adresse mail du client dont on verifie l'existence.
			* @return
			* Vrai si le $mail est dans la BD, false sinon.
			* 
		*/
		public function insertClient($nom, $prenom, $naiss, $mail, $mdp) {
			$db = $this->connectDatabase();

			$requete = "INSERT INTO `clients` (`nom`, `prenom`, `naiss`, `mail`, `mdp`)
			VALUES (:nom, :prenom, :naiss, :mail, :mdp)";

			$db = $db->prepare($requete);
			$db->bindParam(':nom',$nom);
			$db->bindParam(':prenom',$prenom);
			$db->bindParam(':naiss',$naiss);
			$db->bindParam(':mail',$mail);
			$mdp = hash('whirlpool', $mdp);
			$db->bindParam(':mdp',$mdp);

			return $db->execute();
		}
		
		public function connexion($mail, $mdp) {
			$db = $this->connectDatabase();
			$requete = "SELECT id,prenom FROM clients WHERE mail=:mail and mdp=:mdp";
			
			$db = $db->prepare($requete);
			$db->bindParam(':mail',$mail);
			$mdp = hash('whirlpool', $mdp);
			$db->bindParam(':mdp',$mdp);

			if($db->execute()) {
				return $db->fetch();
			}
			return false;
		}
	}
