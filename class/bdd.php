<!DOCTYPE html>
<html lang="fr">
    <?php

    class Bdd {

        public $user;
        public $announce;

        public function set_user(User $user) {
            $this->user = $user;
        }

        public function set_announce(Announce $announce) {
            $this->announce = $announce;
        }

        public function stock_user() {
            if (is_file("user/" . $this->user->get_pseudo() . ".txt")) {
                unlink("user/" . $this->user->get_pseudo() . ".txt");
            }
            $data = serialize($this->user);
            $newFile = fopen("user/" . $this->user->get_pseudo() . ".txt", "w");
            fwrite($newFile, $data);
            fclose($newFile);
        }
        
        public function stock_announce() {
            if (is_file("announce/" . $this->announce->get_file_name() . ".txt")) {
                unlink("announce/" . $this->announce->get_file_name() . ".txt");
            }
            $data = serialize($this->announce);
            $newFile = fopen("announce/" . $this->announce->get_file_name() . ".txt", "w");
            fwrite($newFile, $data);
            fclose($newFile);
        }

        

        public function open_user_file($name) {
            $data = file_get_contents("user/" . $name . ".txt");
            $user = unserialize($data);
            $this->set_user($user);
        }
        
        public function open_announce_file($name) {
            $data = file_get_contents("announce/" . $name . ".txt");
            $announce = unserialize($data);
            $this->set_announce($announce);
        }

        public function test_password($password) {
            if (md5($password) == $this->user->get_password()) {
                return true;
            } else {
                return false;
            }
        }
        
        public function session() {
            $_SESSION['user_connecter'] = $this->user->get_pseudo();
        }
        
        public function destruct_session() {
            $_SESSION['user_connecter'] = null;
        }

        public function delet_file($type, $file) {
            unlink($type . "/" . $file . ".txt");
        }

        public function post_profile() {
            echo "<section class='profil'>";
            echo "<h2>" . $this->user->get_pseudo() . "</h2>";
            echo "<p>" . $this->user->get_firstname() . "</p>";
            echo "<p>" . $this->user->get_lastname() . "</p>";
            echo "<p>" . $this->user->get_mail() . "</p>";
            echo "<p>" . $this->user->get_phone() . "</p>";
            echo "<p>" . $this->user->get_town() . "</p>";
            echo "<p>" . $this->user->get_registration_date() . "</p>";
            echo "</section>";
        }

        public function editable_profil() {
            echo "<form action='control.php' method='post'>";
            echo '<label for="pseudo">Pseudo*</label>';
            echo "<input type='text' name='pseudo' value='" . $this->user->get_pseudo() . "'/>";
            echo '<label for="lastname">Nom*</label>';
            echo "<input type='text' name='firstname' value='" . $this->user->get_firstname() . "'/>";
            echo '<label for="firstname">Prénom*</label>';
            echo "<input type='text' name='lastname' value='" . $this->user->get_lastname() . "'/>";
            echo '<label for="email">Email*</label>';
            echo "<input type='email' name='email' value='" . $this->user->get_mail() . "'/>";
            echo '<label for="phonenumber">Numéro de téléphone*</label>';
            echo "<input type='number' name='phonenumber' value='" . $this->user->get_phone() . "'/>";
            echo '<label for="city">Adresse</label>';
            echo "<input type='text' name='adress' value='" . $this->user->get_adress() . "'/>";
            echo '<label for="city">Ville*</label>';
            echo "<input type='text' name='city' value='" . $this->user->get_town() . "'/>";
            echo '<label for="city">Date de naissance</label>';
            echo "<input type='date' name='birth' value='" . $this->user->get_birth() . "'/>";
            echo '<label for="pseudo">description*</label>';
            echo "<textarea id='descript' name='descript'>" . $this->user->get_descript() . "</textarea>";
            echo "<input type='submit' name='modifier' value='Modifier'/>";
            echo "</form>";
        }


    }
    ?>
</html>