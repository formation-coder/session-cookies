<?php
    $user = $_GET['user'];
    require_once('twig-template.php');
    echo $twig->render('suivant.html', ['user' => $user]);
?>