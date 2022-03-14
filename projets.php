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
        <?php
        foreach ($projets as $projet) : ?>
        <a href="admin.php?id=<?=$projet['id']?>">
            <div class='projet'>
                <h1> <?= $projet["title"] ?></h1>
                <h2>
                    <?= $projet["description"] ?>
                </h2>
                <img src='assets/upload/<?= $projet["picture"] ?>'>
            </div>
        </a>
        <a href="projets.php?id=<?=$projet['id']?>">effacer</a>
        <?php endforeach; ?>
    </div>
</body>


</html>