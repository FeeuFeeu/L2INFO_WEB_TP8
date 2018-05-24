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
			$requete = 	"select nom,prix,description,specificite,img0,img1,img2,img3,libelle 
			from produits inner join catégories on catégories.id=produits.id_categorie
			where produits.id=:idproduit";
			$db = $db->prepare($requete);
			$db->bindParam(':idproduit',$id_produit);
			$db->execute();
			return $db; // PDOStatement
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
			$requete = "select libelle from catégories";
			$db = $db->prepare($requete);
			$db->execute();

			$cat = $db->fetchColumn();
			$cats = array();
			while($cat!==false) {
				array_push($cats,$cat);
				$cat = $db->fetchColumn();
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
			$requete = "select nom,produits.id,libelle,prix,img0,img1,img2,img3 
			from produits inner join catégories on catégories.id=produits.id_categorie";
			$db = $db->prepare($requete);
			$db->execute();
			return $db; // PDOStatement type
		}

		/*
		* 
		* name: getProduitsDeCategories($categorie, $tri, $recherche)
		* @brief Fonction de recuperation des produits dans la BD en fonction
		* des categories, d'un tri (prix croissant ou decroissant) et d'un schema de recherche.
		* @param $categorie Tableau des categories des produits recherches.
		* @param $tri Tri souhaitee (entier positif si tri croissant, tri decroissant si negatif, pas de tri sinon).
		* @param $recherche Modele de recherche (chaine de caracteres avec metacaractere).
		* @return Jeu de données associees aux produits recherches (PDOStatement).
		* 
		*/
		public function getProduitsDeCategories($categorie, $tri, $recherche) {
			$cats ="";
			foreach($categorie as $cat) {
				$cats = $cats . "?,";
			}
			$cats = substr($cats,0,-1);
			$db = $this->connectDatabase();
			$requete = 	"select nom,prix,description,specificite,img0,img1,img2,img3,libelle,produits.id
			from produits inner join catégories on catégories.id=produits.id_categorie
			where catégories.libelle in (" . $cats . ") and nom like ?" ;

			if($tri>0) {
				$requete = $requete . " order by prix asc";
			}
			else if($tri<0) {
				$requete = $requete . " order by prix desc";
			}
			$recherche = '%' . $recherche . '%';
			$db = $db->prepare($requete);

			// On regroupe les parametres dans le tableau $categorie
			array_push($categorie,$recherche);
			$db->execute($categorie);
			return $db; // PDOStatement
		}
	}
