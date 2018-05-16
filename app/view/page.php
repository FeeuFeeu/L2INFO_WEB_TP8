<!DOCTYPE html>
<html>
	<!-- TODO: inclure le <head> -->
	<?php include "head.php"; ?>
	<body>
		<!-- TODO: inclure le <nav> -->
		<?php include "nav.php"; ?>
		<div class="container">
			<?php 
				if(isset($data['status'])) {
					if($data['status']=='login_success') {
						echo '<div class="alert alert-success" role="alert">Bonjour ' . $_SESSION['prenom_client'] .'. Vous êtes maintenant connecté.</div>';
					}
					else if($data['status']=='login_fail') {
						echo '<div class="alert alert-danger" role="alert">Erreur d\'identification ! Le compte n\'existe pas ou le mot de passe est incorrect.</div>';
					}
					else if($data['status']=='signin_success') {
						echo '<div class="alert alert-success" role="alert">Votre inscription a bien été prise en compte !</div>';
					}
					else if($data['status']=='signin_fail') {
						echo '<div class="alert alert-danger" role="alert">Erreur dans le processus d\'inscription.</div>';
					}
					else if($data['status']=='logout_success') {
						echo '<div class="alert alert-success" role="alert">A bientôt ! Vous êtes maintenant déconnecté.</div>';
					}
					else if($data['status']=='signin_fail_email') {
						echo '<div class="alert alert-danger" role="alert">Erreur. Adresse e-mail déjà utilisée !</div>';
					}
				}
			?>
			<!-- TODO: inclure la vue (utilisez $data['view'] fourni par le routeur)-->
			<?php include $data['view']; ?>
			<!-- TODO: inclure le <footer> -->
			<?php include "footer.php";?>
		</div>
	</body>
</html>
