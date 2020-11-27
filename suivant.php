<?php 

    //On regarde de l'état de la session 
    if(session_status() != PHP_SESSION_ACTIVE) {
        session_start(); 
    }
    $utilisateur = $_SESSION['utilisateur'];

    if(empty($utilisateur)) {
        header('Location: index.php');
    }
?>
<html>
    <head>
        <title>C'est là suite, honnêtement j'espère me souvenir de toi</title>
    </head>
    <body>
        <p>
            <!-- pourquoi le nom de l'utilisateur ne s'affiche pas ? -->
            <?php echo "Toujours là " . $utilisateur . "?"; ?>
            <a href="deconnexion.php">Déconnexion</a>
        </p>
    </body>
</html>