# Petit site tout bête
L'objectif est de connecter un utilisateur et garder sa connexion persistante.

## Les étapes : 

### Étape 1 : 
Choisir une branche : `main` ou `template` (je vous encourage à choisir `template` qui permet de coder plus proprement). 

### Étape 2 :  
À partir de cette branche, en créer une nouvelle, nommée `cookie`. 
Vous allez assurer la persistance de connexion au moyen d'un cookie nommé `utilisateur`, qui aura comme valeur le nom de l'utilisateur et qui sera stocké dans le navigateur. 

!!! tip Identifier les endroits où seront gérés les cookies
    Dans quel fichier doit-on créer le cookie ? 
    Dans quel fichier doit-on le lire ? 
    Il ne faudrait pas rajouter une étape de déconnexion ? 

Une fois cette étape réalisée, on commit. 

### Étape 3 :
On revient sur la branche que l'on avait choisi initialement : 
```sh
git checkout mabrancheinitiale
```
Et on re-crée une branche nommée `session`. 
Dans la session, on stocke le nom de l'utilisateur, sur le même principe qu'avec les cookies. 

### Étape 4 : On se pose et on réfléchi. 

!!! question : quel est le meilleur de gérer **l'état** du client ?
    Faut-il préférer les cookies ou les sessions ?
    Il parait qu'on peut **forger** des cookies, est-ce vrai ? 
