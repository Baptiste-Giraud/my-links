<?php

include "function.php";

class Router {
  private $bdd;

  public function __construct($bdd) {
    $this->bdd = $bdd;
  }

  public function route($url) {
    // Diviser l'URL en segments
    $segments = explode('/', $url);

    // Appeler la méthode appropriée en fonction du premier segment
    switch ($segments[0]) {
      case '':
        $this->home();
        break;
      case 'user':
        $this->user($segments[1]);
        break;
      default:
        $this->notFound();
        break;
    }
  }

  private function home() {
    // Traiter la page d'accueil
    include "templates/home.php";
  }

  private function user($username) {
    // Traiter la page de profil de l'utilisateur
    $data = selectinfouserbypseudo($this->bdd, $username);
    include "templates/user.php";
  }

  private function notFound() {
    // Traiter la page 404
    include "templates/404.php";
  }
}

// Utiliser le routeur pour afficher la page demandée
$router = new Router($bdd);
$router->route($_SERVER['REQUEST_URI']);
