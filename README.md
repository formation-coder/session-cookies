# Petit site tout bête

L'objectif est de connecter un utilisateur et garder sa connexion persistante. 

Dans cette branche, on veut mettre les fonctionnalités suivantes : 
- [] Rajouter un champ de formulaire pour la saisie du mot de passe
- [] Comparer le mot de passe saisie avec le mot de passe stocké de l'utilisateur
- [] Tester les différentes méthodes d'envoi de formulaire et en choisir une 
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
- Que fait le fichier `login.php` ?
- Que fait le fichier `suivant.php` ?
- Que fait le fichier `deconnexion.php` ?

- Dans quel fichier se trouve le formulaire de connexion ? 
- Quelle méthode HTTP utilise le formulaire ?
- Quel fichier traite les données du formulaire de connexion ?

- Par quelle mécanisme est rendue persistante la connexion de l'utilisateur ? 
    

## Étape 3 : un peu de lecture
Le passage obligé par [la documentation](https://www.php.net/manual/fr/ref.password.php) ;)

  - Comment hache-t-on un mot de passe en PHP ? 
  - Comment vérifie-t-on un mot de passe en PHP ? 


## Étape 4 : On code

 1. On ajoute un champ de formulaire pour la saisie du mot de passe. On fait en sorte que le mot de passe ne soit pas affiché et qu'il y ait un label et qu'il soit obligatoire. 
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

