<script>
	$(document).ready(function() {
		
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
		});


		$(document).on('click', '.form-check-input', majAffichageProduits);
		$(document).on('click', '.bouton_tri', majAffichageProduits);
		$(document).on('click', 'input[name=rechercheProduit]', majAffichageProduits);
	});
	function afficherNbArticles(html) {
		$('#nb_articles_panier').empty();
		$('#nb_articles_panier').append(html);
	}
	function majAffichageProduits() {
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
			data: 'categorie=' + cats + '&tri=' + tri,
			success:function(html) {
				afficherProduits(html);
			}
		});
	}

	function afficherProduits(html) {
		$('.card-columns').append(html);
	}
	
</script>

<h2>Produits</h2>

<div class="row">
	<!-- Filtres -->
	<div class="col-lg-3">

		<p class="lead">Recherche</p>
		<input type="text" class="form-control" placeholder="Rechercher un produit" name="rechercheProduit"/>
		<hr/>

		<p class="lead">Catégorie</p>
		<!-- TODO: afficher toutes les catégories de la base de données -->
		<?php 
			foreach($data['cats'] as $cat) {
				echo 	'<div class="form-check">' .
						'<input class="form-check-input" type="checkbox" value="" id="' . $cat . '" name="' . $cat .'>' .
						'<label class="form-check-label" for="' . $cat . '">' . $cat . '</label>' .
						'</div>';
			}
		?>

		<hr/>

		<p class="lead">Prix</p>
		<input type="radio" name="prix" value="asc" class="bouton_tri"> Croissant<br/>
		<input type="radio" name="prix" value="desc" class="bouton_tri"> Décroissant<br/>
	</div>

  <!-- Liste -->
  <div class="col-lg-9">
    <div class="card-columns">
	
      <?php
		$row = $data['data']->fetch();
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
				$row = $data['data']->fetch();
		}
      ?>


    </div>
  </div>
</div>
