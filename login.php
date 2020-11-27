<?php
    $user = $_GET['user'];
    require_once('twig-template.php');
    echo $twig->render('login.html', ['user' => $user]);
?>