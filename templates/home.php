<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>My-Links - Votre page de liens personnalisée</title>
    <link rel="stylesheet" href="./assets/front/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body id="home">
	<header>
		<div class="logo">
			<img src="./assets/front/img/mylinks.png" alt="My-Links logo">
			<h1>My-Links</h1>
		</div>
		<nav>
			<a href="#features">Fonctionnalités</a>
			<a href="#pricing">Tarifs</a>
			<a href="https://dev.my-links.fans//login">Se connecter</a>
		</nav>
	</header>
	
	<main>
		<section class="hero">
			<div class="hero-text">
				<h2>Votre page de liens personnalisée en un seul clic</h2>
				<p>Centralisez tous vos liens importants sur une seule page. Facile à utiliser, gratuit pour toujours.</p>
				<a href="/signup" class="cta-btn">Commencez dès maintenant</a>
			</div>
			<div class="hero-img">
				<img src="./assets/front/img/mylinks.png" alt="My-Links screenshot">
			</div>
		</section>
		
		<section class="features" id="features">
			<h2>Fonctionnalités clés</h2>
			<div class="feature">
				<img src="./assets/front/img/mylinks.png" alt="Icon for feature 1">
				<h3>Personnalisation</h3>
				<p>Choisissez parmi une variété de thèmes et personnalisez votre page de liens avec votre propre logo et couleurs.</p>
			</div>
			<div class="feature">
				<img src="./assets/front/img/mylinks.png" alt="Icon for feature 2">
				<h3>Statistiques de clics</h3>
				<p>Suivez le nombre de clics sur chacun de vos liens et découvrez quelles pages sont les plus populaires.</p>
			</div>
			<div class="feature">
				<img src="./assets/front/img/mylinks.png" alt="Icon for feature 3">
				<h3>Liens illimités</h3>
				<p>Ajoutez autant de liens que vous le souhaitez à votre page de liens personnalisée.</p>
			</div>
		</section>
		
		<section class="pricing" id="pricing">
			<h2>Plans et tarifs</h2>
			<p>My-Links est gratuit pour toujours, mais si vous voulez encore plus de fonctionnalités, découvrez nos plans payants.</p>
			<div class="plan">
				<h3>Basique</h3>
				<p>Gratuit</p>
				<ul>
					<li>Personnalisation limitée</li>
					<li>Statistiques de clics basiques</li>
					<li>Jusqu'à 10 liens</li>
				</ul>
				<a href="/signup" class="cta-btn">Commencez gratuitement</a>
			</div>
			<div class="plan">
				<h3>Pro</h3>
				<p>9,99 €/mois</p>
				<ul>
					<li>				Personnalisation complète</li>
				<li>Statistiques de clics avancées</li>
				<li>Liens illimités</li>
			</ul>
			<a href="/signup" class="cta-btn">Essayez gratuitement pendant 14 jours</a>
		</div>
	</section>

    <section class="socials">
    <h2>Suivez-nous sur les réseaux sociaux</h2>
    <div class="social-icons">
        <a href="#">
            <img src="https://cdn.jsdelivr.net/gh/danleech/simple-icons@3.0.0/icons/facebook.svg"
                alt="Facebook" class="social-icon">
        </a>
        <a href="#">
            <img src="https://cdn.jsdelivr.net/gh/danleech/simple-icons@3.0.0/icons/twitter.svg"
                alt="Twitter" class="social-icon">
        </a>
        <a href="#">
            <img src="https://cdn.jsdelivr.net/gh/danleech/simple-icons@3.0.0/icons/instagram.svg"
                alt="Instagram" class="social-icon">
        </a>
        <a href="#">
            <img src="https://cdn.jsdelivr.net/gh/danleech/simple-icons@3.0.0/icons/linkedin.svg"
                alt="LinkedIn" class="social-icon">
        </a>
    </div>
</section>


</main>

<footer>
	<p>© 2023 My-Links. Tous droits réservés.</p>
</footer>
</body>
</html>


<script>
    $(document).ready(function() {
	// Ajoute une animation de défilement au clic sur les liens de navigation
	$('nav a').on('click', function(event) {
		event.preventDefault();
		$('html, body').animate({
			scrollTop: $($(this).attr('href')).offset().top - 100
		}, 800);
	});

	// Ajoute une animation d'apparition pour la section des fonctionnalités
	$(window).scroll(function() {
		if ($(this).scrollTop() > $('.features').offset().top - $(window).height() + 200) {
			$('.feature').each(function(index) {
				setTimeout(function() {
					$('.feature').eq(index).addClass('is-visible');
				}, 100 * index);
			});
		}
	});

	// Ajoute une animation de pulsation pour les boutons CTA dans la section de tarification
	$('.plan .cta-btn').hover(function() {
		$(this).addClass('pulse');
	}, function() {
		$(this).removeClass('pulse');
	});
});

$(document).ready(function() {
	$('.social-icons img').hover(function() {
		$(this).addClass('pulse');
	}, function() {
		$(this).removeClass('pulse');
	});
});



</script>