<?php
include('users.php');
require_once('twig-template.php');
echo $twig->render('index.html', ['users' => $users]);
