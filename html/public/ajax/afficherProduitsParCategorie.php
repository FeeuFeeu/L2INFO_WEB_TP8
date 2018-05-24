<?php
/*
 * @file afficherProduitsParCategorie.php
 * @brief Script AJAX pour recuparation de produits dans la BD avec filtrage.
 */
require_once '../../../app/model/ProduitManager.php';
$pm = new ProduitManager;
$_POST['categorie'] = json_decode($_POST['categorie']);
$_POST['rechercheProd'] = json_decode($_POST['rechercheProd']);
$pm = $pm->getProduitsDeCategories($_POST['categorie'],$_POST['tri'],$_POST['rechercheProd']);
$row = $pm->fetch();
while($row!==false) {
    echo 	'<div class="card">
                <img class="card-img-top" src="public/img/' . $row['img0'] .'" alt="Image produit" style="padding: 1em" />
                <div class="card-body">
                    <h6 class="card-subtitle text-muted">' . $row['libelle'] . '</h6>
                    <h5 class="card-title">' . $row['nom'] . '</h5>
                    <p class="font-weight-light float-left" style="font-size:1.5em">' . $row['prix'] . '€</p>
                    <p class="float-right">
                        <button class="btn btn-primary bouton_prod_plus" id="prod' . $row['id'] . '"><span class="oi oi-plus"></span></button>
                        <a href="?page=produit&id='. $row['id'] .'" class="btn btn-primary"><span class="oi oi-eye"></span></a>
                    </p>
                </div>
            </div>';
            $row = $pm->fetch();
    }