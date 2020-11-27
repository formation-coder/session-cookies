<?php
    $user = $_GET['user'];
    // On vient de récupérer l'utilisateur, on créé sa session
    session_start(); 
    $_SESSION['utilisateur'] = $user; // les variable de session sont stockées dans le tableau super global $_SESSION
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Hey, dis moi qui tu es !</title>
    </head>
    <body>
        <h1>Hello <?php echo $user?></h1>
        <p><a href='suivant.php'>Continuer ?</a></p>
    </body>
</html>
