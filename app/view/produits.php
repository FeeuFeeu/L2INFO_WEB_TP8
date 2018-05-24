<script src="public/js/produits.js"></script>

<h2>Produits</h2>

<div class="row">
	<!-- Filtres -->
	<div class="col-lg-3">

		<p class="lead">Recherche</p>
		<input type="text" class="form-control" placeholder="Rechercher un produit" name="rechercheProduit"/>
		<hr/>

		<p class="lead">Catégorie</p>
		<?php 
			foreach($data['cats'] as $cat) {
				echo 	'<div class="form-check">' .
						'<input class="form-check-input" type="checkbox" value="" id="' . $cat . '" name="' . $cat .'" checked>' .
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
