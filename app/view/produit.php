<!DOCTYPE html>
<html>

	<script>
		// Ajout de l'article au panier
		$(document).ready(function() {
			$('.ajt').click(function(){
				var id = $(this).attr('id').substr(5);
				var nb = $('#c_panier').text();
				if(nb>=1) {
					$.ajax({
						url: "public/ajax/ajoutPanier.php",
						type: 'POST',
						data: 'idProduit=' + id +'&qttProduit=' + nb,
						success:function(html) {
							afficher(html);
						}
					});
					$('.container').prepend('<div class="alert alert-success fade show alerteAjoutArticle" role="alert" style="position: fixed">Article ajouté !</div>');
        			$('.alerteAjoutArticle').delay(2000).hide(500);
        			$('.alerteAjoutArticle:hidden').remove();
				}
				else {
					$('.container').prepend('<div class="alert alert-danger fade show alerteAjoutArticle" role="alert" style="position: fixed">Erreur !</div>');
        			$('.alerteAjoutArticle').delay(2000).hide(500);
       			 	$('.alerteAjoutArticle:hidden').remove();
				}
			});
		});
		function afficher(html) {
			$('#nb_articles_panier').empty();
			$('#nb_articles_panier').append(html);
		}
	</script>
  <body>
	
	<script src="public/js/produit.js"></script>
    <div class="container">
		<div class="row">
		<!-- PREMIERE LIGNE -->
			<div class="col-sm-12 col-lg-8">
				<!-- IMAGES -->
				<div class="text-center">
					<?php $produit_row = $data['data']->fetch()?>
					<img src=<?php echo "public/img/" . $produit_row['img0'] ?> alt="image_newyork_0" class="img-fluid" id="img_princ">
				</div>
				<div class="row" id="miniatures">
					<!-- MINIATURES -->
					<div class="col-3">
						<img src=<?php echo "public/img/" . $produit_row['img0'] ?> alt="image_newyork_0" class="img-fluid" id="mini_1">
					</div>
					<div class="col-3">
						<img src=<?php echo "public/img/" . $produit_row['img1'] ?> alt="image_newyork_1" class="img-fluid" id="mini_2">
					</div>
					<div class="col-3">
						<img src=<?php echo "public/img/" . $produit_row['img2'] ?> class="img-fluid" id="mini_3">
					</div>
					<div class="col-3">
						<img src=<?php echo "public/img/" . $produit_row['img3'] ?> class="img-fluid" id="mini_4">
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-lg-4">
				<!-- TITRE, PRIX, ETC ... -->
				<h3>LEGO <?php echo " " . $produit_row['libelle'] ?></h3>
				<h3><b><?php echo $produit_row['nom'] ?></b></h3>
				<hr />
				<h3 id="prix"><?php echo $produit_row['prix'] ?></h3>
				<div class="alert alert-success text-right">
					En stock
				</div>
				<hr />
				<p class="text-right">
					<button class="btn btn-outline-dark" id="moins">-</button>
					<button class="btn btn-secondary disabled" id="c_panier">1</button>
					<button class="btn btn-outline-dark" id="plus">+</button> <br /> <br />
					<?php
						echo '<button class="btn btn-primary btn-lg ajt" id="ajout' . $_GET['id'] . '">Ajouter au panier <span class="oi oi-cart"></span></button>';
					?>
				</p>
			</div>
		</div>	
		
	<br />
	<br />
    <div class="row">
		 <!-- DEUXIEME LIGNE -->
		<div class="col-sm-12 col-lg-8">
			<!-- DESCRIPTION -->
			<h3><b>Description</b></h3>
			<p class="text-justify">
				<?php echo $produit_row['description'] ?>
			</p>
			
			<br />

			<!-- SPECIFICITES -->
			<h3><b>Spécificités</b></h3>
			<ul>
				<li>Interprétation LEGO du paysage de New York.</li>
				<li>Comprend le Flatiron Building, le Chrysler Building, l'Empire State Building, le One World Trade Center et la Statue de la Liberté.</li>
				<li>Inclut une plaque de base 4x32 avec un écriteau décoratif "New York".</li>
				<li>Recréez les plus belles villes du monde avec la collection LEGO Architecture Skyline.</li>
				<li>Mesure 26 cm de haut, 25 cm de large et 4 cm de profondeur.</li>
			</ul>

		</div>
		<div class="col-sm-12 col-lg-4">
			<!-- AVIS -->
			<h3>Avis</h3>
			<table class="table table-striped">
				<tr>
					<td>
						<p><img src="public/img/avatar.png" class="float-left" id="avatar"><b>Pierre</b>
						<br /><i>26/12/2017</i></p>
						<p>
							Ceci est un commentaire, super commentaire
						</p>
					</td>
				</tr>
				<tr>
					<td>
						<p><img src="public/img/avatar.png" class="float-left" id="avatar"><b>Paul</b>
						<br /><i>26/12/2017</i></p>
						<p>
							Ceci est un autre commentaire, un peu plus long que le premier
						</p>
					</td>
				</tr>
				<tr>
					<td>
						<p><img src="public/img/avatar.png" class="float-left" id="avatar"><b>Jacques</b>
						<br /><i>26/12/2017</i></p>
						<p>
							Ceci est un dernier commentaire, super produit au fait !
						</p>
					</td>
				</tr>
			</table>
			<!-- Zone de saisie commentaire TP4 -->
			<div class="input-group">
				<div class="input-group-addon">
					<span class="oi oi-pencil"></span>
				</div>
				<input type="text" id="avis" class="form-control" placeholder="Rédiger un avis" />
			</div>
		</div>
     </div>
    </div>
  </body>
</html>
