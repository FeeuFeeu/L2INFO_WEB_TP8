<!DOCTYPE html>
<html>


  <body>

	<script src="public/js/panier.js"></script>
    <div class="container">

		<div class="row panier">

			<div class="col-lg-6">
			  <!-- Articles contenus dans le panier -->
			  
				<ul class="list-group">
					<li class="list-group-item">
						<div class="row">
						 <!-- Decriptif article -->
							<div class="col-3">
								<img src="public/img/produit_newyork_0.jpeg" class="img-fluid">
							</div>
							<div class="col-5">
								<p> Lego Architecture <br />
									<b>New York City</b> <br />
									<i>Quantité : <span class="qtt_produit">1</span></i>
								</p>
							</div>
							<div class="col-4">
								<p><span class="prix_produit">49.99</span>€</p>
							</div>
						</div>
						<div class="row">
						<!-- Bouton supprimer -->
							<div class="col-12">
								<p class="text-right">
									<button class="btn btn-outline-danger sup_produit">Supprimer <span class="oi oi-trash"></span></button>
								</p>
							</div>
						</div>
					</li>
					<li class="list-group-item">
						<div class="row">
						 <!-- Decriptif article -->
							<div class="col-3">
								<img src="public/img/produit_londres_0.jpeg" class="img-fluid">
							</div>
							<div class="col-5">
								<p> Lego Architecture <br />
									<b>New York City</b> <br />
									<i>Quantité : <span class="qtt_produit">3</span></i>
								</p>
							</div>
							<div class="col-4">
								<p><span class="prix_produit">15.99</span>€</p>
							</div>
						</div>
						<div class="row">
						<!-- Bouton supprimer -->
							<div class="col-12">
								<p class="text-right">
									<button class="btn btn-outline-danger sup_produit">Supprimer <span class="oi oi-trash"></span></button>
								</p>
							</div>
						</div>
					</li>
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
