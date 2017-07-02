<?php include_once('header.php'); ?>
<main>
    <?php
    if (isset($_POST['modify'])) {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $_SESSION['modify'] = true;
        $_SESSION['file_name'] = $post['file_name'];
    }
    if (isset($_SESSION['modify']) && $_SESSION['modify'] == true && $_SESSION['file_name'] != null) {
        if(isset($_SESSION['error']) && $_SESSION['error'] != null) {
            echo "<p>".$_SESSION['error']."</p>";
            $_SESSION['error'] = null;
        }
        $bdd = new Bdd();
        $bdd->open_announce_file($_SESSION['file_name']);
    ?>
    <fieldset>
        <legend>Modifier</legend>
        <form method="POST" action="control.php">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" <?php echo 'value="'.$bdd->announce->get_title().'"'; ?>/>
            <label for="tag">Tag</label>
            <label for="aide">
                <input type="checkbox" name="tag[]" id="aide" value="aide" 
                <?php       
                    foreach ($bdd->announce->get_tag() as $tag) {
                        if($tag == 'aide') {
                            echo 'checked="checked"';
                        }
                    }
                ?>
                />
                aide
            </label>
            <label for="enfant">
                <input type="checkbox" name="tag[]" id="enfant" value="enfant" 
                <?php       
                    foreach ($bdd->announce->get_tag() as $tag) {
                        if($tag == 'enfant') {
                            echo 'checked="checked"';
                        }
                    }
                ?>
                />
                enfant
            </label>
            <label for="menage">
                <input type="checkbox" name="tag[]" id="menage" value="menage"  
                <?php       
                    foreach ($bdd->announce->get_tag() as $tag) {
                        if($tag == 'menage') {
                            echo 'checked="checked"';
                        }
                    }
                ?>
                />
                menage
            </label>
            <label for="animaux">
                <input type="checkbox" name="tag[]" id="animaux" value="animaux"  
                <?php       
                    foreach ($bdd->announce->get_tag() as $tag) {
                        if($tag == 'animaux') {
                            echo 'checked="checked"';
                        }
                    }
                ?>
                />
                animaux
            </label>
            <label for="cours">
                <input type="checkbox" name="tag[]" id="cours" value="cours"  
                <?php       
                    foreach ($bdd->announce->get_tag() as $tag) {
                        if($tag == 'cours') {
                            echo 'checked="checked"';
                        }
                    }
                ?>
                />
                cours
            </label>
            <label for="reparation">
                <input type="checkbox" name="tag[]" id="reparation" value="reparation"  
                <?php       
                    foreach ($bdd->announce->get_tag() as $tag) {
                        if($tag == 'reparation') {
                            echo 'checked="checked"';
                        }
                    }
                ?>
                />
                reparation
            </label>
            <label for="cuisine">
                <input type="checkbox" name="tag[]" id="cuisine" value="cuisine"  
                <?php       
                    foreach ($bdd->announce->get_tag() as $tag) {
                        if($tag == 'cuisine') {
                            echo 'checked="checked"';
                        }
                    }
                ?>
                />
                cuisine
            </label>
            <label for="fete">
                <input type="checkbox" name="tag[]" id="fete" value="fete"  
                <?php       
                    foreach ($bdd->announce->get_tag() as $tag) {
                        if($tag == 'fete') {
                            echo 'checked="checked"';
                        }
                    }
                ?>
                />
                fete
            </label>
            <label for="vente">
                <input type="checkbox" name="tag[]" id="vente" value="vente"  
                <?php       
                    foreach ($bdd->announce->get_tag() as $tag) {
                        if($tag == 'aide') {
                            echo 'checked="checked"';
                        }
                    }
                ?>
                />
                vente
            </label>
            <label for="descript">Description :</label>
            <textarea id="descript" name="descript"><?php echo $bdd->announce->get_descript(); ?></textarea>
            <label for="picture">Ajouter une image :</label>
            <input type="file" name="picture" id="picture" />
            <input type="submit" name="newannounce" value="Envoyer" />
        </form>
    </fieldset>
    <?php
    } else {
        echo "<p>Oops, il semblerait que votre session a expiré !</p>";
    }
    ?>
</main>
</body>

</html>