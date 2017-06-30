<?php include_once('header.php'); ?>

<main>
    <a href="index.php">Accueil</a>
    <a href="profile.php">Profil</a>
<?php
    if(isset($_SESSION['error']) && $_SESSION['error'] != null) {
        echo "<p>".$_SESSION['error']."</p>";
        $_SESSION['error'] = null;
    }
?>
    <fieldset>
        <legend>Nouvelle annonce</legend>
        <form method="POST" action="control.php">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" />
            <label for="tag">Tag</label>
            <label for="aide">
                <input type="checkbox" name="tag[]" id="aide" value="aide" />
                aide
            </label>
            <label for="enfant">
                <input type="checkbox" name="tag[]" id="enfant" value="enfant" />
                enfant
            </label>
            <label for="menage">
                <input type="checkbox" name="tag[]" id="menage" value="menage" />
                menage
            </label>
            <label for="animaux">
                <input type="checkbox" name="tag[]" id="animaux" value="animaux" />
                animaux
            </label>
            <label for="cours">
                <input type="checkbox" name="tag[]" id="cours" value="cours" />
                cours
            </label>
            <label for="reparation">
                <input type="checkbox" name="tag[]" id="reparation" value="reparation" />
                reparation
            </label>
            <label for="cuisine">
                <input type="checkbox" name="tag[]" id="cuisine" value="cuisine" />
                cuisine
            </label>
            <label for="fete">
                <input type="checkbox" name="tag[]" id="fete" value="fete" />
                fete
            </label>
            <label for="vente">
                <input type="checkbox" name="tag[]" id="vente" value="vente" />
                vente
            </label>
            <label for="descript">Description :</label>
            <textarea id="descript" name="descript"></textarea>
            <label for="picture">Ajouter une image :</label>
            <input type="file" name="picture" id="picture" />
            <input type="submit" name="newannounce" value="Envoyer" />
        </form>
    </fieldset>
</main>
</body>

</html>