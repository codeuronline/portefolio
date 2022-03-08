<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title>ADMIN</title>
</head>
<header>
    <nav>
        <a href="index.php"><button>Présentation</button></a>
        <button><a href="projets.php"> Mes Projets</a></button>
        <button><a href="competences.php">Mes Compétences</a></button>
        <button><a href="contacter.php">Me Contacter</a></button>
        <button><a class='active' href="admin.php">Admin</a></button>
    </nav>
</header>

<body>
    <div class="container">
        <form action="">
            <div class="conatainerForm">
                <fieldset>
                    <legend color="black">Projet dans la BD</legend>
                    <div class="gauche">
                        <label for="nom">Nom:</label>
                        <input type="text" placeholder="Nom du projet">
                        <label for="url_site">Lien du site:</label>
                        <input type="url" placeholder="lien vers le site">
                        <label for="url_github">Lien Github:</label>
                        <input type="url" placeholder="lien vers github">
                        <input type="file" name="picture" id="picture">
                    </div>
                    <div class="droite">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" cols="30" rows="10"></textarea>
                    </div>
                </fieldset>
            </div>
        </form> /
    </div>
</body>

</html>