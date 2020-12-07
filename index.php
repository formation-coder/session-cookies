<?php
include('users.php'); // Récupération du tableau d'utilisateur $users
require_once('twig-template.php'); // Fichier php chargé de l'initialisation du moteur de template

// Affichage du template index.html (qui contient le formulaire de connexion)
// On lui passe la liste de utilisateurs dans une variable nommée users
echo $twig->render('index.html', ['users' => $users]);
