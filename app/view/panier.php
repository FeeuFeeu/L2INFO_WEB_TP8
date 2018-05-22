<!DOCTYPE html>
<html>
	<script>
		$(document).ready(function() {
			$('.sup_produit').click(function() {
				id = $(this).attr('id');
				id = parseInt(id.substring(4));
				console.log('id produit : ' + id +  'end')
				$.ajax({
					url: 'public/ajax/suppressionProduit.php',
					type: 'POST',
					data: 'idProduit=' + id,
					success:function(html) {
						afficher(html);
					}
				});
			});
		});

		function afficher(html) {
			console.log('id produit : ' + html +  'end')
			$('#nb_articles_panier').empty();
			$('#nb_articles_panier').append(html);
		}
	</script>

  <body>

	<script src="public/js/panier.js"></script>
    <div class="container">

		<div class="row panier">

			<div class="col-lg-6">
			  <!-- Articles contenus dans le panier -->
			  
				<ul class="list-group">
					<?php 
						foreach($_SESSION['panier'] as $idprod => $qtt) {
							$pm = new ProduitManager;
							$pm = $pm->getProduit($idprod);
							$pm = $pm->fetch();
							echo '<li class="list-group-item">
								<div class="row">
								<!-- Decriptif article -->
									<div class="col-3">
										<img src="public/img/' . $pm['img0'] . '" class="img-fluid">
									</div>
									<div class="col-5">
										<p>' . $pm['libelle'] . '<br />
											<b>' . $pm['nom'] . '</b> <br />
											<i>Quantité : <span class="qtt_produit">' . $qtt . '</span></i>
										</p>
									</div>
									<div class="col-4">
										<p><span class="prix_produit">' . $pm['prix'] . '</span>€</p>
									</div>
								</div>
								<div class="row">
								<!-- Bouton supprimer -->
									<div class="col-12">
										<p class="text-right">
											<button class="btn btn-outline-danger sup_produit" id="supp' . $idprod . '">Supprimer <span class="oi oi-trash"></span></button>
										</p>
									</div>
								</div>
							</li>';
						}
					?>
				</ul>
			</div>

			<div class="col-lg-6">
				<!-- Descriptif du prix du panier -->
				<h2>Panier</h2>
				<table class="table table-hover">
					<tr>
						<th>Prix du panier</th>
						<th class="text-right"><span id="prix_panier">99.98</span>€</th>
					</tr>
					<tr>
						<th>TVA(<span id="tva_taux">15</span>%)</th>
						<th class="text-right"><span id="tva_total">15</span>€</th>
					</tr>
					<tr>
						<th>Total</th>
						<th class="text-right"><span id="total_panier">114.98</span>€</th>
					</tr>
				</table>
				<div class="text-right">
					<button class="btn btn-primary">Acheter <span class="oi oi-check"></span></button>
				</div>
			  
			</div> <!-- col-lg-6 -->
		</div> <!-- row -->
		
		
    </div>
  </body>
</html>
