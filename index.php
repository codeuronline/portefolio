<?php
define('WEBROOT', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_NAME'])); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Accueil</title>
</head>
<!--<div class="plant-grid">
    <div class="plant-grid1">
        <h1><a href=" addproject.php" class="">Ajouter un projet</a></h1>
    </div>
    <div class="plant-grid2">
        <h1><a href="" class="">Compétences</a></h1>
    </div>
    <div class="plant-grid3">
        <h1><a href="" class="">Projet</a></h1>
    </div>
</div>-->

<body>
    <div class="box">
        <a href="">
            <div class="box__face--back"> Présentation
            </div>
        </a>
        <a href="">
            <div class="box__face--front">Présentation
        </a>
        <a href="">
            <div class="box__face--left">Réalisations
        </a>
    </div>
    <a href="">
        <div class="box__face--right">Réalisation</div>
    </a>
    <a href="">
        <div class="box__face--top">Compétences </div>
    </a>
    <a href="">
        <div class="box__face--bottom"> Contact</div>
    </a>
</body>

</html>