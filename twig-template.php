<?php
// Fichier responsable de l'initialisation du moteur de template twig. 
require_once './vendor/autoload.php'; // Permet de charger automatiquement des classes dont dépend twig

// On précise que twig doit chercher les templates sur le système de fichier, dans le répertoire template
$loader = new \Twig\Loader\FilesystemLoader('templates');

// On renvoi une instance du moteur. 
$twig = new \Twig\Environment($loader);
?>