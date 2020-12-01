<?php
    $user = $_GET['user'];
    // On vient de récupérer l'utilisateur, on créé sa session
    session_start(); 
    $_SESSION['utilisateur'] = $user; // les variable de session sont stockées dans le tableau super global $_SESSION
    
    require_once('twig-template.php');
    echo $twig->render('login.html', ['user' => $user]);
?>
