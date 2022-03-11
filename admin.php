<?php
require_once 'models/project.php';
if (@$_GET['id']){
    $newProject = new Project;
    $projets = $newProject->select(@$_GET['id']); 

}
if (@$_POST) {
    $form = $_POST;
    if (isset($_FILES['picture']['tmp_name']) && is_uploaded_file($_FILES['picture']['tmp_name'])) {
           
            $picture = $_FILES['picture']['name'];
            var_dump($picture);      
            $picture_tmp = $_FILES['picture']['tmp_name'];
            $extension = substr($picture, strrpos($picture, '.'));
            $form['picture'] =  $picture;
            move_uploaded_file($picture_tmp, 'assets/upload/' . $form['picture']);
    }
    $form['created_at'] = date('Ymd');
    $newproject= new Project([]);
    $newproject->add($form);
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/styleprojet.css">
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
                        <input type="text" placeholder="Nom du projet" name="title" value="<?=@$projets[0]['title']?>">
                        <label for="lienlocal">Lien du site:</label>
                        <input type="url" placeholder="lien vers le site" name="url_web"
                            value="<?=@$projets[0]['url_web']?>">
                        <label for=" liengithub">Lien Github:</label>
                        <input type="url" placeholder="lien vers github" name="url_github"
                            value="<?=@$projets[0]['url_github']?>">
                        <input type=" file" name="picture" id="picture">
                        <img onchange="handleFiles()"
                            src="assets/upload/<?=(@$projets[0]['picture']) ? @$projets[0]['picture']: "vide.jpg"?>"
                            alt="" id="picture" name="picture">
                        <span id="preview">
                            <img class="preview" src="assets/upload/vide.jpg" alt="vide" srcset="">
                        </span>
                    </div>
                    <div class="droite">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" cols="80" rows="10"
                            value="<?=@$projets[0]['description']?>"><?=@$projets['description']?>
                        </textarea>
                        <input type="hidden" name="id" value="<?=@$_GET['id']?>">
                    </div>
                </fieldset>
                <button type=" submit">Valider</button>
                <button type="reset">Annuler</button>
            </div>

        </form>
    </div>
    <script type="text/javascript">
    function handleFiles() {
        var imageType = /^image\//;
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            if (!imageType.test(file.type)) {
                alert(" veuillez sélectionner une image ");
            } else {

                preview.innerHTML = '';
            }
        }
    }
    var img = document.createElement("img");
    img.classList.add("obj");
    img.file = file;
    preview.appendChild(img);
    var reader = new FileReader();
    reader.onload = (function(aImg) {
        return function(e) {
            aImg.src = e.target.result;
        };
    })(img);

    reader.readAsDataURL(file);
    </script>
</body>

</html>