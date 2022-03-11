<?php
if (@$_POST) {
       require_once 'models/project.php';
       $form= $_POST; 
       
       if (isset($_FILES['picture']['tmp_name']) && is_uploaded_file($_FILES['picture']['tmp_name'])) {
        //on limite a 5 le compteur
        
            $picture = $_FILES['picture']['name'];
            var_dump($picture);      
            $picture_tmp = $_FILES['picture']['tmp_name'];
            $extension = substr($picture, strrpos($picture, '.'));
            $form['picture'] =  $picture;
            move_uploaded_file($picture_tmp, 'assets/upload/' . $form['picture']);
    }
    var_dump($_FILES);
    $form['created_at']= date('Ymd');
    var_dump($form);
    
    $newproject= new Project([]);
    $newproject->add($form);
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="public/css/style.css">-->
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
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="containerForm">
                <fieldset>
                    <legend color="black">Projet dans la BD</legend>
                    <div class="gauche">
                        <label for="title">Nom:</label>
                        <input type="text" placeholder="Nom du projet" name="title">
                        <label for="lienlocal">Lien du site:</label>
                        <input type="url" placeholder="lien vers le site" name="url_web">
                        <label for="liengithub">Lien Github:</label>
                        <input type="url" placeholder="lien vers github" name="url_github">
                        <input type="file" name="picture" id="picture">
                    </div>
                    <div class="droite">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" cols="30" rows="10"></textarea>
                    </div>
                </fieldset>
            </div>
            <div class="containerForm">

                <div class="gauche"><button type="submit">Valider</button></div>

                <div class="droite"><button type="reset">Annuler</button></div>
            </div>
        </form>
    </div>
</body>

</html>