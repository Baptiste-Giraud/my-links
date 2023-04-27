<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Inscription - My-Links</title>
	<link rel="stylesheet" href="./dist/css/bundle.css">   
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body id="signup">
	<header>
		<div class="logo">
			<img src="./assets/front/img/mylinks.png" alt="My-Links logo">
			<h1>My-Links</h1>
		</div>
	</header>
	
	<main>
		<section class="register">
			<h2>Inscription</h2>
			<form id="register-form" method="post" action="">
				<label for="name">Nom d'utilisateur</label>
				<input type="text" name="name" id="name" required>
				
				<label for="email">Adresse e-mail</label>
				<input type="email" name="email" id="email" required>
				
				<label for="nom">Nom</label>
				<input type="text" name="nom" id="nom" required>
				
				<label for="prenom">Prénom</label>
				<input type="text" name="prenom" id="prenom" required>
				
				<label for="mdp">Mot de passe</label>
				<input type="password" name="mdp" id="mdp" required>
				
				<label for="mdp-confirm">Confirmer le mot de passe</label>
				<input type="password" name="mdp-confirm" id="mdp-confirm" required>
				
				<button type="submit" name="register-btn" id="register-btn">S'inscrire</button>
			</form>
		</section>
	</main>

	<footer>
		<p>© 2023 My-Links. Tous droits réservés.</p>
	</footer>

	<script src="./assets/front/js/register.js"></script>
</body>
</html>
