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
<?php
    session_start(); 
    var_dump($_SESSION['erreur']);

?>
    <fieldset>
        <legend>Inscription</legend>
        <form method="POST" action="control.php">
            <section>
                <section class="part_form">
                    <label for="pseudo">
                        Pseudo*
                    </label>
                    <input type="text" id="pseudo" name="pseudo" placeholder="Exemple42" />
                    <label for="mdp">
                        Mot de passe*
                    </label>
                    <input type="password" id="mdp" name="mdp" />
                    <label for="confirme">
                        Confirmation du mot de passe*
                    </label>
                    <input type="password" id="confirme" name="confirme" />
                </section>
                <section class="part_form">
                    <label for="nom">
                        Nom*
                    </label>
                    <input type="text" id="nom" name="nom" placeholder="Nom" />
                    <label for="prenom">
                        Prénom*
                    </label>
                    <input type="text" id="prenom" name="prenom" />
                    <label for="mail">
                        Email*
                    </label>
                    <input type="email" id="mail" name="mail" />
                </section>
                <section class="part_form">
                    <label for="postal">
                        Code Postal*
                    </label>
                    <input type="number" id="postal" name="postal" />
                    <label for="ville">
                        Ville*
                    </label>
                    <input type="text" id="ville" name="ville" />
                    <label for="num">
                        Numéro de téléphone*
                    </label>
                    <input type="number" id="num" name="num" />
                </section>
            </section>
            <section>
                <input type="checkbox" id="condition" name="condition" />
                <label for="condition">
                    J'accèpte les conditions utilisateurs.*
                </label>
                <input type="submit" name="inscription" value="Envoyer" />
            </section>
        </form>
    </fieldset>

    <fieldset>
        <legend>Connexion</legend>
        <form method="POST" action="control.php">
            <section class="part_form">
                <label for="conect_pseudo">
                    Pseudo*
                </label>
                <input type="text" id="conect_pseudo" name="conect_pseudo" placeholder="Exemple42" />
                <label for="conect_mdp">
                    Mot de passe*
                </label>
                <input type="password" id="conect_mdp" name="conect_mdp" />
                <input type="submit" name="connexion" value="Connexion" />
            </section>
        </form>
    </fieldset>
</body>

</html>