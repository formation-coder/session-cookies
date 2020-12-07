<?php
    // Pour déconnecter l'utilisateur, il faut détruire la session
    if(session_status() != PHP_SESSION_ACTIVE) {
        session_start(); 
    }

    session_unset(); // on "vide" les variable de session
    session_destroy(); // on détruit la session => cela détruit l'id de la session, et la prochaine fois que l'utilisateur se connecte, la session aura un nouvel sessionId

    //On rédirige vers la page d'accueil
    header('Location: index.php');