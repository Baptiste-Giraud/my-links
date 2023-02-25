<?php
require_once '../function.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ajouter un lien</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/front/css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- jsDelivr  -->
<script src="https://cdn.jsdelivr.net/npm/fireworks-js@2.x/dist/index.umd.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>


<!-- UNPKG -->
<script src="https://unpkg.com/fireworks-js@2.x/dist/index.umd.js"></script></head>
<body id="linkpage">
	<header>
		<h1>Ajouter un lien</h1>
	</header>

	<main>
        <form id="myForm" method="post" action="../function.php">
			<label for="url">URL:</label>
			<input type="text" name="url" id="url">

			<label for="type">Type:</label>
			<select name="type" id="type">
				<option value="1">Type 1</option>
				<option value="2">Type 2</option>
				<option value="3">Type 3</option>
			</select>

			<label for="texte">Texte:</label>
			<input type="text" name="texte" id="texte">

			<label for="forme">Forme:</label>
			<select name="forme" id="forme">
				<option value="0">Cercle</option>
				<option value="1">Carré</option>
				<option value="2">Triangle</option>
			</select>

			<label for="couleur_link">Couleur du lien:</label>
			<input type="color" name="couleur_link" id="couleur_link">

			<label for="effect">Effet:</label>
			<select name="effect" id="effect">
				<option value="aucun">Aucun</option>
				<option value="ombre">Ombre</option>
				<option value="surbrillance">Surbrillance</option>
			</select>

			<label for="text_color_link">Couleur du texte:</label>
			<input type="color" name="text_color_link" id="text_color_link">

			<label for="icon">Icon:</label>
			<input type="text" name="icon" id="icon">

			<label for="position">Position:</label>
			<input type="number" name="position" id="position">

			<label for="link_show">Afficher le lien:</label>
			<select name="link_show" id="link_show">
				<option value="1">Oui</option>
				<option value="0">Non</option>
			</select>

			<label for="date_start_show">Date de début d'affichage:</label>
			<input type="datetime-local" name="date_start_show" id="date_start_show">

			<label for="date_finish_show">Date de fin d'affichage:</label>
			<input type="datetime-local" name="date_finish_show" id="date_finish_show">
			
			<label for="private_pass">Mot de passe :</label>
			<div class="password-input-container">
			<div class="password-input-wrapper">
				<input type="password" name="private_pass" id="private_pass" placeholder="Entrez votre mot de passe">
				<i id="toggle-password" class="fa-solid fa-eye-slash"></i>
			</div>
			</div>


			<label class="checkbox-label" for="sensitive">Sensible :</label>
			<div class="form-group">
			<div class="checkbox-input-container">
				<input type="checkbox" name="sensitive" id="sensitive" value="1">
				<span class="checkbox-custom"></span>
			</div>
			</div>

			
			  
			
			
			<input type="hidden" name="function" value="insertlink">


			<input type="submit" name="function">
		</form>
	</main>
	<div class="fireworks">

	</div>
</body>
</html>

<script>
	
  // Récupérer le formulaire
var form = document.getElementById("myForm");

// Empêcher le comportement par défaut du formulaire
form.addEventListener("submit", function(event) {
    event.preventDefault();

    // Envoyer la requête au serveur
    var xhr = new XMLHttpRequest({responseType: 'text'});
    xhr.open(form.method, form.action);
    xhr.onload = function() {
        if (xhr.status === 400) {
            swal({
                title: "Succès",
                text: "Le lien a été inséré avec succès !",
                icon: "success",
                button: "OK",
            }).then(() => {
                location.reload();
            });
        } else {
            swal({
                title: "Erreur",
                text: "Une erreur s'est produite lors de l'insertion du lien.",
                icon: "error",
                button: "OK",
            });
        }
    };
    xhr.send(new FormData(form));
});

const passwordInput = document.getElementById('private_pass');
const showPasswordIcon = document.getElementById('toggle-password');

showPasswordIcon.addEventListener('click', function(event) {
  event.preventDefault();
  const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
  passwordInput.setAttribute('type', type);

  if(showPasswordIcon.classList.contains('fa-eye')) {
    showPasswordIcon.classList.add('fa-eye-slash');
    showPasswordIcon.classList.remove('fa-eye');
  }
  else {
    showPasswordIcon.classList.add('fa-eye');
    showPasswordIcon.classList.remove('fa-eye-slash');
  }

});

function animatePopupIn() {
  const popup = document.querySelector(".popup");
  anime({
    targets: popup,
    translateY: ["-50%", "-50%"],
    scale: [0.1, 1],
    opacity: [0, 1],
    duration: 1000,
    easing: "easeInOutQuad"
  });
}

function animatePopupOut() {
  const popup = document.querySelector(".popup");
  anime({
    targets: popup,
    translateY: ["-50%", "-50%"],
    scale: [1, 0.1],
    opacity: [1, 0],
    duration: 1000,
    easing: "easeInOutQuad"
  });
}

document.addEventListener("DOMContentLoaded", function(event) {
  // Récupérer le nom d'utilisateur de la variable de session PHP
  var username = "<?php echo $_SESSION['name_user']; ?>";


  // Créer une nouvelle popup avec le message de bienvenue personnalisé
  var popup = document.createElement("div");
  popup.className = "popup";
  popup.innerHTML = "<h2>Bienvenue, " + username + " !</h2><p>Nous sommes heureux de vous revoir.</p>";
  popup.style.opacity = 0;
  popup.style.transform = "scale(0.1)";
  popup.style.position = "absolute";
  popup.style.left = "50%";
  popup.style.top = "50%";
  popup.style.transform = "translate(-50%, -50%) scale(0.1)";

  // Ajouter la popup à la page
  document.body.appendChild(popup);

  animatePopupIn();

  const container = document.querySelector('.fireworks')
  const fireworks = new Fireworks.default(container)
  fireworks.start()

  // Supprimer la popup après 5 secondes
  setTimeout(function() {
    animatePopupOut();
    fireworks.stop(true);
    setTimeout(function() {
      popup.remove();
    }, 1000);
  }, 5000);
});



</script>
