<?php
    // Pour déconnecter l'utilisateur, il faut détruire la session
    if(session_status() != PHP_SESSION_ACTIVE) {
        session_start(); 
    }

    session_unset(); // on "vide" les variable de session
    session_destroy(); // on détruit la session

    //On rédirige vers la page d'acceuil
    header('Location: index.php');