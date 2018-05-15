<?php

	class Manager {

			/*
			* 
			* name: connectDatabase()
			* @brief Fonction de connexion à une base de donnée.
			* @return
			* Objet PDO de la base de donnée à laquelle on se connecte.
			* 
			*/
			protected function connectDatabase() {
				$db = new PDO(
				'mysql:host=localhost;dbname=lego_webstore;charset=utf8',
				'phpmyadmin',
				'patatoes62'
			);
			return $db; // PDO type
		}

	}
