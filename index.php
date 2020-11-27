<?php
include('users.php');

function userOptionHTML($name) {
    return <<<htmlOption
        <option value="$name">$name</option>
    htmlOption;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Hey, dis moi qui tu es !</title>
    </head>
    <body>
        <form action="login.php" method="GET">
            <label for="Utilisateur"></label>
            <select name="user" id="user">
                <?php 
                    foreach($users as $user){
                        echo userOptionHTML($user['name']);
                    }
                ?>
            </select>
            <button type="submit">C'est moi ;)</button>
        </form>
    </body>
</html>
