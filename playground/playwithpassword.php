<?php
    $password = 'mot de passe';
    $hash1 = password_hash($password, PASSWORD_DEFAULT);  // https://www.php.net/manual/fr/function.password-hash.php
    $hash2 = password_hash($password, PASSWORD_DEFAULT); 

    // Que s'affiche-t-il ? Pourquoi 
    if( $hash1 === $hash2 ) {
        echo("Les hash des mots de passe sont les mêmes \n");
    } else {
        echo("Les hash des mots de passe sont différents \n");
    }

    // https://www.php.net/manual/fr/function.password-verify.php
    // Que va t'il s'afficher ? 
    if(password_verify($password, $hash1) && password_verify($password, $hash2)) {
        echo("Les hash correspondent tous 2 au mot de passe \n");
    } else {
        // Pourquoi une telle formulation dans cette phrase ? 
        echo("Au moins un hash ne correspond pas au mot de passe \n");
    }


    // KesKisPass ? https://www.php.net/manual/fr/function.password-needs-rehash.php
    //Quel semble être l'algorithme utilisé par défaut ?
    if (password_needs_rehash($hash1,  PASSWORD_DEFAULT)) {
        echo("Le hash ne correspond pas à l'algorithme spécifié \n");
    } else {
        echo("PASSWORD_DEFAULT est le bon algorithme \n");
    }

    $options = array('cost' => 11);
    if (password_needs_rehash($hash1,  PASSWORD_BCRYPT, $options)) {
        echo("Le hash ne correspond pas à l'algorithme spécifié PASSWORD_BCRYPT (cout 11)\n");
    } else {
        echo("PASSWORD_BCRYPT est le bon algorithme, avec un cout de 11 \n");
    }
    
    if (password_needs_rehash($hash1,   PASSWORD_ARGON2I)) {
        echo("Le hash ne correspond pas à l'algorithme spécifié PASSWORD_ARGON2I\n");
    } else {
        echo("PASSWORD_ARGON2I est le bon algorithme \n");
    }

    if (password_needs_rehash($hash1,  PASSWORD_BCRYPT)) {
        echo("Le hash ne correspond pas à l'algorithme spécifié PASSWORD_BCRYPT\n");
    } else {
        echo("PASSWORD_BCRYPT est le bon algorithme, avec un cout de par défaut \n");
    }

    $options['cost'] = 10;
    if (password_needs_rehash($hash1,  PASSWORD_BCRYPT, $options)) {
        echo("Le hash ne correspond pas à l'algorithme spécifié PASSWORD_BCRYPT\n");
    } else {
        echo("PASSWORD_BCRYPT est le bon algorithme, avec un cout de 10 \n");
    }
    
    //Comment vérifier et gérer si l'algorithme par défaut de php change ? Arriverez vous à proposer un petit bout de code (astuce : aidez vous de la doc;) )?

    