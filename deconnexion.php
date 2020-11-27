<?php
    // Ce fichier doit effacer le cookie. 
    // Pour supprimer un cookie existant, il faut lui donner une date d'expiration antérieure à maintenant

    setcookie('utilisateur', null, strtotime("-1 day"));
    //On rédirige vers la page d'acceuil
    header('Location: index.php');