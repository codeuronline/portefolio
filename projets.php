<?php

require_once 'models/project.php';

$newProject = new Project;
$projets = $newProject->select();

if (@$_GET['id']){
     $newProject->del(@$_GET['id']);   
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="public/css/styleprojet.css">
    <title>Projets</title>
</head>

<body>
    <header>
        <nav>
            <button><a href="index.php">Présentation</button></a>
            <button><a class='active' href="projets.php"> Mes Projets</a></button>
            <button><a href="competences.php">Mes Compétences</a></button>
            <button><a href="contacter.php">Me Contacter</a></button>
            <button><a href="admin.php">Admin</a></button>
        </nav>
    </header>
    <div class="container">
        <div class="card-group">
            <?php if((count($projets)<1)) :?>
            <h1>Aucun Projet Enregistré</H1>
            <?php endif ?>
            <?php
            foreach ($projets as $projet) : ?>
            <div class='projet'>
                <div class="card">
                    <img src='assets/upload/<?=$projet["picture"]?>' class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= $projet["title"] ?> </h5>
                        <p class="card-text"><?= $projet["description"] ?></p>
                        <div class="card-footer">
                            <small class="text-muted">
                                <a href="<?=$projet["url_web"]?>"><i class="bi bi-link"></i></a>&nbsp;
                                <a href="<?=$projet["url_github"]?>"><i class="bi bi-github"></i></a>&nbsp;
                                <a href="projets.php?id=<?=$projet['id']?>">
                                    <i class="bi bi-x-circle"></i>
                                </a>
                            </small>
                        </div>

                        </p>
                    </div>
                </div>
                <a href="admin.php?id=<?=$projet['id']?>">
                </a>

            </div>
            <?php endforeach; ?>
        </div>
</body>


</html>