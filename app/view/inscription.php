<!DOCTYPE html>
<html>


  <body>

	<script src="public/js/check_func.js"></script>
	<script src="public/js/check_main.js"></script>
	<script src="public/js/select_date.js"></script>
	
	<div class="container">

		<h2>Création d'un compte</h2>

      <!-- Ajouter la barre de progression -->	
		<div class="progress">
			<div class="progress-bar bg-primary active" style="width: 0%" id="formProgress"></div>
		</div>
      <!-- Ajouter le formulaire d'inscription -->
		<form id="sign" action="?page=inscription" method="POST">
			<div class="form-row">
			<!-- Nom et Prénom -->
				<div class="form-group col-lg-6">
					<label for="inputNom">Nom</label>
					<input type="text" class="form-control" id="inputNom" name="inputNom" placeholder="Nom" >
				</div>
				<div class="form-group col-lg-6">
					<label for="inputPrenom">Prénom</label>
					<input type="text" class="form-control" id="inputPrenom" name="inputPrenom" placeholder="Prénom">
				</div>
			</div> <!-- form-row -->
			
			<div class="form-row">
			<!-- Date de naissance -->
				<div class="form-group col-lg-4">
					<label for="inputJourNais">Date de naissance</label>
					<select class="form-control" id="inputJourNais" name="inputJourNais">
						<option disabled="disabled" selected>Jour</option>
						<!-- Elements generes par JS -->
					</select>
				</div>
				<div class="form-group col-lg-4">
					<label for="inputMoisNais">&nbsp </label>
					<select class="form-control" id="inputMoisNais" name="inputMoisNais">
						<option disabled="disabled" selected>Mois</option>
						<!-- Elements generes par JS -->
					</select>
				</div>
				<div class="form-group col-lg-4">
					<label for="inputAnNais">&nbsp </label>
					<select class="form-control" id="inputAnNais" name="inputAnNais">
						<option disabled="disabled" selected>Année</option>
						<!-- Elements generes par JS -->
					</select>
				</div>
			</div> <!-- form-row -->
			
			<div class="form-row">
			<!-- Adresse email -->
				<div class="form-group col-lg-12">
					<label for="inputEmail">Adresse email</label>
					<input type="text" class="form-control" id="inputEmail" name="inputEmail" placeholder="Adresse email">
				</div>
			</div> <!-- form-row -->
			
			<div class="form-row">
			<!-- Mot de passe -->
				<div class="form-group col-lg-6">
					<label for="inputMotPasse">Mot de passe<span style="font-size:0.75em;">(minimum 6 caractères)</span></label>
					<input type="password" class="form-control" id="inputMotPasse" name="inputMotPasse" placeholder="Mot de passe">
					<div class="progress" style="height:2px"><div class="progress-bar bg-success active" style="width: 0%" id="forceMotPasse"></div></div>
					<p class="text-success" id="texteForceMotPasse"></p>
				</div>
				<div class="form-group col-lg-6">
					<label for="inputConfMotPasse">&nbsp </label>
					<input type="password" class="form-control" id="inputConfMotPasse" name="inputConfMotPasse" placeholder="Confirmez le mot de passe">
				</div>	
			</div> <!-- form-row -->
			
			<div class="form-row">
				<div class="form-check col-lg-12">
					<input class="form-check-input" type="checkbox" id="confInscr"/>
					<label class="form-check-label" for="confInscr">Je confirme ces informations.</label>
				</div>
				<button type="submit" class="btn btn-primary" id="boutonInscription">Inscription</button>
			</div> <!-- form-row -->
			
		</form> <!-- Formulaire -->
	
    </div>

  </body>
</html>
