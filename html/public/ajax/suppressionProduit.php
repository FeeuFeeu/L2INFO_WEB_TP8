<?php 
    /*
    * @file suppressionProduit.php
    * @brief Script AJAX de suppression d'un produit du panier.
    */
    session_start();
    $id_prod = $_POST['idProduit'];
    if(isset($_SESSION['panier'][$id_prod])) {
        $_SESSION['nbArticles'] -= $_SESSION['panier'][$_POST['idProduit']];
        unset($_SESSION['panier'][$_POST['idProduit']]);
        echo $_SESSION['nbArticles'];
    }