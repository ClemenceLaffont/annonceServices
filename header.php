<?php
session_start();
include_once("class/user.php");
include_once("class/announce.php");
include_once("class/bdd.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="title" content="AnnonceService" />
    <meta name="description" content="Site de partage et d'annonce de service et petit boulot. Apprentissage plus poussé de la programmation orienté objet en PHP. Projet individuel initialisé en groupe de 5 (avec Hayet Habet, Justin Courdesse, Marlene Egraz et Audrey Gilloud)." />
    <meta name="autor" content="Clémence Laffont" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script type="text/javascript" src="js/js.js"></script>
    <title>AnnonceService</title>
</head>

<body>
    <header>
        <?php
            if(isset($_SESSION['user_connecter']) && $_SESSION['user_connecter'] != null) {
        ?>
        <nav>
            <a href="index.php">Accueil</a>
            <a href="profile.php">Profil</a>
            <a href="newannounce.php">Poster une nouvelle annonce</a>
        </nav>
        <form method="POST" action="control.php">
            <input type="submit" name="deconnection" value="Deconnexion" />
        </form>
        <?php
            } else {
        ?>
        <nav>
            <a href="index.php">Accueil</a>
            <a href="register.php">Inscription</a> 
        </nav>
        <fieldset>
            <legend>Connexion</legend>
            <?php
            if(isset($_SESSION['error']) && $_SESSION['error'] != null) {
                echo "<p>".$_SESSION['error']."</p>";
                $_SESSION['error'] = null;
            }
            ?>
            <form method="POST" action="control.php">
                <section class="part_form">
                    <label for="conect_pseudo">
                        Pseudo*
                    </label>
                    <input type="text" id="conect_pseudo" name="conect_pseudo" />
                    <label for="conect_password">
                        Mot de passe*
                    </label>
                    <input type="password" id="conect_password" name="conect_password" />
                    <input type="submit" name="connection" value="Connexion" />
                </section>
            </form>
        </fieldset>
    <?php
    }
    ?>
    </header>