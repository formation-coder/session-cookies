<?php
    //On regarde de l'état de la session car on ne peut pas activer plusieurs fois une session (normalement)
    if(session_status() != PHP_SESSION_ACTIVE) {
        session_start(); 
    }
    $utilisateur = $_SESSION['utilisateur'];

    if(empty($utilisateur)) { 
        // Si utilisateur n'existe pas dans la variable super globale $_SESSION, c'est certainement qu'il n'est pas connecté
        // Effectue une redirection vers le fichier index.php (car l'utilisateur n'est pas connecté), pour qu'il se connecte
        header('Location: index.php'); 
        // Si on a effectué une redirection, tout le code suivant ne sera pas executé. 
    }
    // Si on arrive ici, c'est que l'utilisateur était bien connecté (on a pas fait de redirection)
    require_once('twig-template.php');
    echo $twig->render('suivant.html', ['user' => $utilisateur]);
?>
