<?php 
include_once('header.php');
?>
<main>
    <a href="index.php">Accueil</a>
    <?php
    if(isset($_SESSION['user_connecter']) && $_SESSION['user_connecter'] != null) {
        echo '<a href="newannounce.php">Poster une nouvelle annonce</a>';
        if(isset($_SESSION['error']) && $_SESSION['error'] != null) {
            echo "<p>".$_SESSION['error']."</p>";
            $_SESSION['error'] = null;
        }
    
        $bdd = new Bdd();
        $bdd->open_user_file($_SESSION['user_connecter']);
        $bdd->editable_profil();
    } else {
        echo "<p>Oops, il semblerait que votre session a expiré !</p>";
    }
    ?>
</main>
</body>
</html>
