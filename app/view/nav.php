<nav class="navbar navbar-expand navbar-dark bg-dark">
	<a class="navbar-brand" href="#"><img src="public/img/logo_lego.jpg" width="30" height="30">&nbsp Webstore</a>
	<ul class="navbar-nav mr-auto">
		<li class="nav-item">
			<a href="?page=produits" class="nav-link">Produits</a>
		</li>
		<li class="nav-item">
			<a href="?page=panier" class="nav-link">Panier&nbsp<span class="badge badge-secondary">2</span></a>
		</li>
	</ul>
	<button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#compte"><span class="oi oi-person"></span>&nbsp Compte</button>
</nav>


	<!-- Formulaire d'incription -->
	<div class="modal fade" tabindex="-1" role="dialog" id="compte" aria-labelledby="modalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalLabel">Compte</h2>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			
				<div class="modal-body">
					<form>
						<input type="text" class="form-control" id="inputId" placeholder="Identifiant">
						<br />
						<input type="text" class="form-control" id="inputPasse" placeholder="Mot de passe">
						<br />
						<button type="submit" class="btn btn-secondary btn-block">Connexion</button>
					</form>
				</div>
				<div class="modal-footer">
					<a href="?page=inscription" class="btn btn-primary btn-block">Inscription</a>
				</div>
			</div>
		</div>
	</div>	
