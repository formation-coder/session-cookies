<?php
    $user = $_GET['user'];
    // On crée le cookie utilisateur qui contient comme valeur l'utilisateur choisi
    setcookie("utilisateur", $user);
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