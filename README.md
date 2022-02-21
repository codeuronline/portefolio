php# Projet Portfolio - Back-Office

## Contexte

Dans le cadre du développement de votre Portfolio, le besoin porte sur la conception et le développement d'un back-office permettant d'administrer la publication de projets, puis d'une interface publique permettant de consulter les projets publiés.

## Durée

Jusqu'au vendredi 22 octobre

## Conception de la base de données

La première étape d'un développement back-end est la conception de la base de données. Sans celle-ci, vous n'avez pas la possibilité de pouvoir avancer dans le développement convenablement.

Dans phpMyAdmin, créez une nouvelle base de données nommée `backoffice` et choisissez pour l'encodage des caractères `utf8_general_ci`.  
Créez une nouvelle table `projects` dans cette base de données. Structurez celle-ci :

* projects :
  * id (pk)
  * title (varchar 255)
  * description (text)
  * picture (varchar 255)
  * created_at (datetime)

Pour chaque nouvelle entrée (à chaque nouvelle requête d'insertion), le champs `id` s'auto-incrémente, les autres champs de l'entrée sont alimentées par les informations transmises par le formulaire.

Vous aurez également besoin d'un table `users` afin de sécurisé l'administration du portfolio :

* users :
  * id (pk)
  * username (varchar 255)
  * password (varchar 255)

## Connexion à la base de données

Créez une page dédiée à la seule connexion à la base de données, la connexion s'opère grâce à l'objet PDO. La page contient 4 variables, dont les valeurs seront à réadapter au moment du passage en production : (commencez par déclarer que ce qui suivra est du PHP en ouvrant la balise `<?php`)

```php
$db_host = "localhost";
$db_name = "backoffice";
$db_user = "root";
$db_pwd = "";
```

La page établit ensuite la connexion :

```php
try {
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pwd);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
```

Si le message « Connected successfully » apparaît, c'est que tout s'est bien passé. On peut ensuite passer en commentaire l'instruction echo `"Connected successfully";` qui n'a qu'un caractère informatif pour le développeur.

## Ajouter des projets

Dans un dossier situé à la racine de votre portfolio, créez un dossier nommé `back`. Dans ce même dossier, créez un fichier nommé `addProject.php` contenant un formulaire avec les champs suivants : 
* titre
* description
* un champ permettant d'uploader une image : `<input type="file">`

**La date ne doit pas figuré sur le formulaire !**

Le formulaire enverra les données vers une fichier nommé `insertProject.php`. Celui-ci vérifira si TOUTES les données ont bien été transmises. Si c'est le cas, vous effectuez un upload de l'image, correspondant au preview de votre projet, avant d'insérez les données en base de données : [Uploader une image en PHP](https://espritweb.fr/comment-uploader-une-image-en-php/)

Les images uploadés devront se trouver dans le dossier `assets/uploads/`.

> N'oubliez pas la date du jour au moment de l'insertion en BDD

## Afficher les projets

Maintenant que vous pouvez enregistrer vos projet en base de données. Il va falloir les afficher sur la page d'accueil de votre portfolio.

Depuis la page de votre portfolio affichant vos projets, créez le code PHP permettant de récupérer les données de la table `projects` et afficher celles-ci, grâce à une boucle `foreach`, à l'endroit où vous souhaitez les faire apparaître. 

### Afficher les projet - Partie 2

En réutilisant le code écrit ci-dessus, créez une page `projects.php` dans le dossier `back` et afficher la totalité de vos projets dans un tableau HTML ayant cet ordre :

| ID | Preview | Titre | Date d'ajout | Actions |
|---|---|---|---|---|
| 1 | Image | Mon projet | 01/01/2021 | Editer / Supprimer |

Les mots `Editer` et `Supprimer` sont des liens sur lesquels nous reviendrons un peu plus tard.

Pensez à ajouter un bouton `Nouveau projet` sur votre page ;)

## Supprimer un projet

Le lien `Supprimer` dans le tableau des projets doit rediriger vers une page nommée `deleteProject.php`. Il est important de récupérer l'ID du projet en GET de façon à pouvoir le sélectionner en base de données. Par exemple : `deleteProject.php?id=12`.

La page `deleteProjet.php` réceptionne l'ID du projet en question et vous devez effectuer un effacement dans celle-ci.

Une fois l'effacement effectué, affichez un message de succès.

> Pensez aussi à supprimer l'image associée à votre projet dans le dossiers `uploads`. Sans quoi vous vous retrouverez avec des images liées à aucun projet prenant de la place serveur pur rien.

## Editer un projet

Le lien `Editer` dans le tableau des projets doit rediriger vers une page nommée `editProject.php`. Il est important de récupérer l'ID du projet en GET de façon à pouvoir le sélectionner en base de données. Par exemple : `editProject.php?id=12`. Le principe reste le même que pour la suppression.

La page `editProject.php` doit contenir le même formulaire que l'ajout d'un projet. La différence étant que ce formulaire doit être pré-rempli des informations du projet à modifier. Grâce à l'ID reçu via l'URL, récupérez les infos en base de données et remplissez le formulaire avec. 

À la validation de celui-ci, rediriger les informations vers une page nommée `saveEditProject.php` mettant à jour les données réceptionnées par le formulaire.

> Lors d'une modification, tous les champs doivent être remplis, comme pour l'ajout. Par contre, rien n'oblige la personne à modifier l'image qui est associée.
> Donc si l'utilisateur sélectionne une nouvelle image, vous devez supprimer l'ancienne et mettre à jour l'ensemble des données avec la nouvelle, sinon, vous ne faites rien.

## Création d'un utilisateur administrateur

Le back-office doit être fermé au public et accessible seulement aux personnes possédant un `username` et `mot de passe`. Pour cela, il va falloir enregistrer le premier utilisateur qui n'est d'autre que vous.

Créez une page `register.php` contenant un formulaire avec les champs : username et password.

Ce formulaire enverra les données vers une page nommée `addUser.php`. Dans cette page, faites en sorte d'insérer les données reçues dans la table `users` et n'oubliez surtout pas d'effectuer un hash sur le mot de passe en utilisant la fonction PHP `password_hash()`.

> Vérifier que le formulaire soit correctement rempli avant d'effectuer une insertion.

> :warning: Afin d'éviter à des malins de trouver ce formulaire et de créer des comptes pour accéder à votre administration : **retirer ce fichier de votre projet par la suite.**

## Sécuriser l'administration

Pour terminer ce projet, vous devez maintenant sécuriser votre back-office.  
**Seul l'administrateur qui se connecte doit pouvoir y accéder et personne d'autre !**

À la racine du dossier `back`, créez un fichier `index.php` contenant un formulaire avec les champs : username et password.  
Le formulaire redirige vers une fichier `connect.php`. Celui-ci doit être correctement rempli avant de vérifier les informations reçues.

Vérifier que le username et le mot de passe existe en base de données. Pour le mot de passe, utiliser la fonction PHP `password_verify()`.

Rediriger l'utilisateur vers la page `projects.php` si tout est correct et stockez ses données dans la superglobale `$_SESSION`, sinon affichez un message d'erreur. Par sécurité, on ne précise jamais si c'est le `username` ou le `mot de passe` qui est invalide.

> Ne stockez pas le mot de passe dans la $_SESSION par sécurité. Seul l'adresse e-mail sera suffisante. La session étant créée seulement sur le navigateur de celui qui se connecte.

La superglobale `$_SESSION` vous sera très utile pour vérifier si un utilisateur à les droits nécessaires pour afficher les pages de l'administration. Sans cela, l'accès ne doit pas être possible et l'utilisateur sera automatiquement redigiré vers le formulaire de connexion.

Dans les pages ne pouvant être accessible que par l'administrateur, ajouter ce code au plus haut du fichier :

```php
session_start();
if (!isset($_SESSION['email'])) {
    // Permet de rediriger un visiteur vers le formulaire de connexion si la clé "email" n'existe pas dans la session
    header('Location: index.php');
}
```

Dans le code ci-dessus, vous remarquerez un `session_start()`. Celui-ci doit être présent au plus haut de chaque code PHP utilisant les $_SESSION, sans cela, elles ne fonctionneront pas.
