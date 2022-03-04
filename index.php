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
    <title>hello</title>
</head>

<body>
    <header>
        <nav>
            <button><a class='active' href="presentation.php">Présentation</button></a>
            <button><a href="projets.php"> Mes Projets</a></button>
            <button><a href="competences.php">Mes Compétences</a></button>
            <button><a href="contacter.php">Me Contacter</a></button>
            <button><a href="admin.php">Admin</a></button>
        </nav>
    </header>
    <div class=" container">
        <div class="cube">
            <div class="face front">
                <a href="presentation.php">
                    <div class="face">
                        Présentation
                    </div>
                </a>
            </div>
            <div class="face back">
                <a href="projets.php">
                    <div class="face">
                        Mes Projets
                    </div>
                </a>
            </div>
            <div class="face right">
                <a href="competences.php">
                    <div class="face">
                        Mes Compétences
                    </div>
                </a>
            </div>

            <div class="face left">
                <a href="contacter.php">
                    <div class="face">
                        Me Contacter
                    </div>
                </a>
            </div>
            <div class="face top">
                <a href="admin.php">
                    <div class="face">

                        Admin
                    </div>
                </a>
            </div>
            <div class="face bottom">
                <a href="projets.php">
                    <div class="face">
                        Mes Projets
                    </div>
                </a>
            </div>
        </div>
    </div>
</body>

</html>