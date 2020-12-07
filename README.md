# Petit site tout bête

L'objectif est de connecter un utilisateur et garder sa connexion persistante. 

Dans cette branche, on veut mettre les fonctionnalités suivantes : 
- [x] Rajouter un champ de formulaire pour la saisie du mot de passe
- [x] Comparer le mot de passe saisie avec le mot de passe stocké de l'utilisateur
- [x] Tester les différentes méthodes d'envoi de formulaire et en choisir une 
- [] Rendre le formulaire un peu plus beau :)


!!! tip Utilisation du moteur de template twig
    Dans cette partie, on utilise le moteur de template [twig](https://twig.symfony.com/doc/3.x/). 
    Pour pouvoir l'utiliser, il vous faudra saisir la commande suivante dans votre terminal (si vous ne l'avez pas déjà fait): 
    ```sh
    composer install
    ```
    Composer est un gestionnaire de librairies PHP, semblable à npm. 
    Si composer n'est pas installé, il vous suffit de faire 
    ```sh 
    sudo apt install composer
    ```

## Étape 1 : 
Regarder comment sont obtenus les utilisateurs. 

*Les utilisateurs sont stockés dans un tableau associatif dont la clé est le nom de l'utilisateur, et la valeur est le mot de passe haché de l'utilisateur*. 
*Ce tableau se trouve dans le fichier users.php. *
On utilise `include` pour accéder à ce tableau. 

Quelle particularité a leur mot de passe ? 

Ces mots de passe ont été **hashés**, c'est-à-dire que l'on a créé une **empreinte** de taille fixe, à partir de laquelle on ne peut plus retrouver le mot de passe initial (normalement). 

En ressources : 
 - [FAQ PHP : Hashage de mots de passe sûr](https://www.php.net/manual/fr/faq.passwords.php)
 - [Fuite de données massives chez Adobe : l'importance du choix des méthodes de hashage des mots de passe](https://nakedsecurity.sophos.com/2013/11/04/anatomy-of-a-password-disaster-adobes-giant-sized-cryptographic-blunder/)
 
## Étape 2 : Analyse du code
Donnons un peu de contexte à cette application en la testant et en analysant le code. 



### Pour tester
Si vous ne travaillez pas dans un répertoire configuré pour être servi par un serveur Web (apache ou nginx), lancer un serveur PHP local sur le port de votre choix (qui n'est pas déjà occupé de préférence) :
```sh
php -S localhost:8000
```

### Pour comprendre
- Que fait le fichier `index.php` ? 
    Il inclut un template.php et renvoi le template `index.html` en lui passant la liste des utilisateurs, pour utiliser cette liste comme liste déroulante dans le formulaire de connexion. 

- Que fait le fichier `login.php` ?
    Il traite les données envoyées lors de la soumission du formulaire. 
    Si l'utilisateur est bien connecté (pour l'instant c'est toujours le cas tant qu'il n'y a pas de mot de passe), on crée une session pour pouvoir le garder connecté et l'identifier tout au long de sa navigation sur le site, jusqu'à ce qu'il se déconnecte. 

- Que fait le fichier `suivant.php` ?
    Il vérifie si la session de l'utilisateur est active (c’est-à-dire qu'il est connecté). Si oui, il récupère dans la session active le nom de l'utilisateur et l'affiche. Sinon l'utilisateur est renvoyé ver le fichier index.php, pour qu'il se connecte (et active sa session)

- Que fait le fichier `deconnexion.php` ?
    Permet de déconnecter la session puis de vider la variable de la session et ensuite de détruire la session utilisateur => l'utilisateur est donc considéré comme déconnecté. 

- Dans quel fichier se trouve le formulaire de connexion ? 
    `index.html` qui est un template renvoyé par `index.php`.

- Quelle méthode HTTP utilise le formulaire ?
    `GET`. On le trouve dans l'attribut `method` de la balise `<form>`.
    En général, GET sert à **récupérer** des informations sur le serveur. 

- Quel fichier traite les données du formulaire de connexion ?
      `login.php`. 

- Par quelle mécanisme est rendue persistante la connexion de l'utilisateur ? 
    Par l'utilisation de variables de session. 

## Étape 3 : un peu de lecture
Le passage obligé par [la documentation](https://www.php.net/manual/fr/ref.password.php) ;)

  - Comment hache-t-on un mot de passe en PHP ? 
      En utilisant la fonction php `password_hash($motdepasse, PASSWORD_DEFAULT)`.
  - Comment vérifie-t-on un mot de passe en PHP ? 
      En utilisant la fonction php `password_verify($motdepasse, $hash)`.
      Le `$hash`  est celui qu'on a stocké lors de l'enregistrement de l'utilisateur

## Étape 4 : On code

 1. On ajoute un champ de formulaire pour la saisie du mot de passe. On fait en sorte que le mot de passe ne soit pas affiché, qu'il soit obligatoire et qu'il y ait un label. 
 2. Lorsque l'on traite le formulaire, on vérifie le mot de passe saisi. Si c'est le même que celui stocké, on crée la session de l'utilisateur, sinon, on ré-affiche le formulaire page. 
 3. On change la méthode dans l'élément `form` de notre page de connexion. On teste. Que se passe-t-il ? 
 4. On adapte le fichier `login.php` pour que cela fonctionne.
 5. Et si on testait avec postman ? 

## Quête annexe
### Quête 1
Renvoyer un message d'erreur de connexion si le mot de passe n'est pas correct lorsque l'on ré-affiche le formulaire de connexion. 

Pensez à faire un branche ;)

Les pistes : 
 - utiliser les mécanismes de session
 - utiliser l'header de la réponse HTTP renvoyée par PHP pour passer les paramètres à la page redirigée 
   - avec la méthode GET, facile, mais moche et peu sécurisé, 
   - avec la méthode POST, mieux mais plus long à faire (mais mieux ;) )
 
Quels sont les avantages et inconvénients de ces pistes ?

### Mini quête : 
Amusez-vous avec le fichier `playground/playwithpassword.php`. 

### Quête 2 : réorganisation de code
 - réfléchir à des fonctions qui pourrait-être utiles si le site grossi, comme tester si un utilisateur est connecté, ... 

