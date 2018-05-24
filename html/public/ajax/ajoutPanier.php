<?php
/*
 * @file ajoutPanier.php
 * @brief Script AJAX pour recuparation de produits dans la BD avec filtrage.
 */
// Ajoute au panier un article de la quantité souhaitée
session_start();
if(isset($_SESSION['panier'][$_POST['idProduit']])) {
    $_SESSION['panier'][$_POST['idProduit']]+=$_POST['qttProduit'];
}
else {
    $_SESSION['panier'][$_POST['idProduit']] = $_POST['qttProduit'];
}

    $_SESSION['nbArticles']+=$_POST['qttProduit'];
echo $_SESSION['nbArticles'];