<?php

	require_once 'Manager.php';

	class ProduitManager extends Manager {

		/*
		* 
		* name: getProduit($id_produit)
		* @brief Fonction de recuperation des donnees d'un produit dans la BD.
		* @param $id_produit Id du produit dont on veut les donnees.
		* @return Jeu de donnees associees a cet id (PDOStatement).
		* 
		*/
		public function getProduit($id_produit) {
			$db = $this->connectDatabase();

			$res = $db->query(
				"select nom,prix,description,specificite,img0,img1,img2,img3,libelle 
				from produits inner join catégories on catégories.id=produits.id_categorie
				where produits.id=" . $id_produit
			);

			return $res; // PDOStatement
		}
		
		/*
		* 
		* name: getCategories()
		* @brief Fonction de recuperation des noms des catégories de la BD.
		* @return Liste des noms des différentes catégories dans la BD (array).
		* 
		*/
		public function getCategories() {
			$db = $this->connectDatabase();

			$res = $db->query("select libelle from catégories");

			$cat = $res->fetchColumn();
			$cats = array();
			while($cat!==false) {
				array_push($cats,$cat);
				$cat = $res->fetchColumn();
			}
			return $cats; // array type
		}
		
		/*
		* 
		* name: getProduits()
		* @brief Fonction de recuperation des donnees des produits de la BD.
		* @return Jeu de données associees a tous les produits (PDOStatement).
		* 
		*/
		public function getProduits() {
			$db = $this->connectDatabase();
			$res = $db->query(
				"select nom,produits.id,libelle,prix,img0,img1,img2,img3 from produits inner join catégories on catégories.id=produits.id_categorie"
			);
			return $res; // PDOStatement type
		}

	}
