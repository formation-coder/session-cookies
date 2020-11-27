<?php
    $user = $_GET['user'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Hey, dis moi qui tu es !</title>
    </head>
    <body>
        <h1>Hello <?php echo $user['name']?></h1>
        <p><a href='suivant.php'>Continuer ?</a></p>
    </body>
</html>
