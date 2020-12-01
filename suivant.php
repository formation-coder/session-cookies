<?php
    //On regarde de l'état de la session car on ne peut pas activer plusieurs fois une session (normalement)
    if(session_status() != PHP_SESSION_ACTIVE) {
        session_start(); 
    }
    $utilisateur = $_SESSION['utilisateur'];

    if(empty($utilisateur)) {
        // Effectue une redirection vers le fichier index.php (car l'utilisateur n'est pas connecté)
        header('Location: index.php');
    }
    require_once('twig-template.php');
    echo $twig->render('suivant.html', ['user' => $utilisateur]);
?>
