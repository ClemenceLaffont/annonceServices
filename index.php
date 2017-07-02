<?php include_once('header.php'); ?>


<main>
    <form method="POST" action="control.php">
        <label for="keyword">Recherche : </label>
        <input type="text" name="keyword" id="keyword" />
        <label for="tag">Tag : </label>
        <label for="aide">
            <input type="radio" name="tag" id="aide" value="aide" />
            aide
        </label>
        <label for="enfant">
            <input type="radio" name="tag" id="enfant" value="enfant" />
            enfant
        </label>
        <label for="menage">
            <input type="radio" name="tag" id="menage" value="menage" />
            menage
        </label>
        <label for="animaux">
            <input type="radio" name="tag" id="animaux" value="animaux" />
            animaux
        </label>
        <label for="cours">
            <input type="radio" name="tag" id="cours" value="cours" />
            cours
        </label>
        <label for="reparation">
            <input type="radio" name="tag" id="reparation" value="reparation" />
            reparation
        </label>
        <label for="cuisine">
            <input type="radio" name="tag" id="cuisine" value="cuisine" />
            cuisine
        </label>
        <label for="fete">
            <input type="radio" name="tag" id="fete" value="fete" />
            fete
        </label>
        <label for="vente">
            <input type="radio" name="tag" id="vente" value="vente" />
            vente
        </label>
        <input type="submit" name="search" value="Rechercher"/>
    </form>
    <?php
    $bdd = new Bdd();
    if(isset($_SESSION['search'])) {
        echo "c'est pas normal";
    } else {
        $announces = scandir('announce/'); 
        foreach($announces as $file_name) {
            if($file_name[0] != '.' && !is_dir("announce/".$file_name)) {
                $bdd->open_announce_file(pathinfo($file_name, PATHINFO_FILENAME));
                $bdd->open_user_file($bdd->announce->get_user());
    ?>
    <article>
        <section>
            <h2><?php echo $bdd->user->get_pseudo(); ?></h2>
            <section>
    <?php
                if(isset($_SESSION['user_connecter']) && $_SESSION['user_connecter'] != null && $bdd->user->get_pseudo() == $_SESSION['user_connecter']) {
    ?>
                <form action="control.php" method="POST">
                    <input type="hidden" value="<?php echo $bdd->announce->get_file_name(); ?>" name="file_name"/>
                    <input type="submit" name="remove" value="supprimer" />
                </form>
                <form action="modifyannounce.php" method="POST">
                    <input type="hidden" value="<?php echo $bdd->announce->get_file_name(); ?>" name="file_name"/>
                    <input type="submit" name="modify" value="modifier" />
                </form>
    <?php 
                } 
    ?>
            </section>
        </section>
        <section>
            <h1><?php echo $bdd->announce->get_title(); ?></h1>
            <h4>
    <?php 
                foreach ($bdd->announce->get_tag() as $tag) {
                    echo $tag." ";
                }
    ?>
            </h4>
            <p><?php echo $bdd->announce->get_descript(); ?></p>
            <img>
        </section>
    </article>
    <?php
            }

        }

    }

    ?>
    
</main>
</body>

</html>
