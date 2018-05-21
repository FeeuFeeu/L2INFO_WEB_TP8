<?php 
    // Supprime un produit du panier (peu importe la quantite)
    session_start();
    $id_prod = $_POST['idProduit'];
    if(isset($_SESSION['panier'][$id_prod])) {
        $_SESSION['nbArticles'] -= $_SESSION['panier'][$_POST['idProduit']];
        unset($_SESSION['panier'][$_POST['idProduit']]);
        echo $_SESSION['nbArticles'];
    }