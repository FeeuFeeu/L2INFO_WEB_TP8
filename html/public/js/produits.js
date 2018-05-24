/*
 * @file produits.js
 * @brief Fonctions de gestion d'affichage des produits par categorie, nom et tri du prix
 * Et Ajout d'un produit au panier.
 */

$(document).ready(function() {
    
    // Ajout d'une occurrence d'un produit au panier
    $(document).on('click', '.bouton_prod_plus', function() {
        id = $(this).attr('id');
        id = id.substring(4);
        $.ajax({
            url: "public/ajax/ajoutPanier.php",
            type: 'POST',
            data: 'idProduit=' + id +'&qttProduit=1',
            success:function(html) {
                afficherNbArticles(html);
            }
        });
        $('.container').before('<div class="alert alert-success fade show alerteAjoutArticle" role="alert" style="position: fixed">Article ajouté !</div>');
        $('.alerteAjoutArticle').delay(2000).hide(500);
        $('.alerteAjoutArticle:hidden').remove();
    });

    // Recherche de produits
    $(document).on('click', '.form-check-input', majAffichageProduits);
    $(document).on('click', '.bouton_tri', majAffichageProduits);
    $(document).on('keyup', 'input[name=rechercheProduit]', majAffichageProduits);
});

function afficherNbArticles(html) {
    $('#nb_articles_panier').empty();
    $('#nb_articles_panier').append(html);
}
function majAffichageProduits() {
    var recherche = $('input[name=rechercheProduit]').val();
    recherche = JSON.stringify(recherche);
    $('.card-columns').empty();
    var cats = [];
    $('.form-check-input').each(function(){
        if($(this).is(':checked')) cats.push($(this).attr('id'));
    });
    cats = JSON.stringify(cats);
    var tri = 0;
    if($('input[name=prix]:checked').val()=='asc') {
        tri = 1;
    }
    else if($('input[name=prix]:checked').val()=='desc') {
        tri = -1;
    }
    $.ajax({
        url: "public/ajax/afficherProduitsParCategorie.php",
        type: 'POST',
        data: 'categorie=' + cats + '&tri=' + tri + '&rechercheProd=' + recherche,
        success:function(html) {
            afficherProduits(html);
        }
    });
}

function afficherProduits(html) {
    $('.card-columns').append(html);
}