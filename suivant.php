<?php
    // Ici on lit le cookie pour identifier l'utilisateur
    $utilisateur = $_COOKIE['utilisateur'];
    // Que fait-on s'il n'y a pas de cookie ???
    // On pourrait le rediriger sur la page index.php pour qu'il se connecte
    if(empty($utilisateur)) {
        header('Location: index.php');
        exit(); 
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