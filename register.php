<?php include_once('header.php'); ?>

<main>
    <?php
        if(isset($_SESSION['error']) && $_SESSION['error'] != null) {
            echo "<p>".$_SESSION['error']."</p>";
            $_SESSION['error'] = null;
        }
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
                    <label for="password">
                        Mot de passe*
                    </label>
                    <input type="password" id="password" name="password" />
                    <label for="confirm">
                        Confirmation du mot de passe*
                    </label>
                    <input type="password" id="confirm" name="confirm" />
                </section>
                <section class="part_form">
                    <label for="lastname">
                        Nom*
                    </label>
                    <input type="text" id="lastname" name="lastname" placeholder="lastname" />
                    <label for="firstname">
                        Prénom*
                    </label>
                    <input type="text" id="firstname" name="firstname" />
                    <label for="email">
                        Email*
                    </label>
                    <input type="email" id="email" name="email" />
                </section>
                <section class="part_form">
                    <label for="codepost">
                        Code Postal*
                    </label>
                    <input type="number" id="codepost" name="codepost" />
                    <label for="city">
                        Ville*
                    </label>
                    <input type="text" id="city" name="city" />
                    <label for="phonenumber">
                        Numéro de téléphone*
                    </label>
                    <input type="number" id="phonenumber" name="phonenumber" />
                </section>
            </section>
            <section>
                <input type="checkbox" id="condition" name="condition" />
                <label for="condition">
                    J'accèpte les conditions utilisateurs.*
                </label>
                <input type="submit" name="register" value="Envoyer" />
            </section>
        </form>
    </fieldset>
</main>
</body>

</html>