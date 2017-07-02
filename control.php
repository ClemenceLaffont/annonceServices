<?php include_once('header.php'); 

$new_bdd = new Bdd();

// Début des verif php pour le formulaire d'inscription et de modification du profil

if(isset ($_POST['register']) || isset($_POST['modifier'])) {
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
    //uniformisation de la variable password pour les deux situations
    
    if(isset($_POST['modifier'])) {
        $new_bdd->open_user_file($_SESSION['user_connecter']);
        $password = $new_bdd->user->get_password();
        $confirm = $new_bdd->user->get_password();
        $date = $new_bdd->user->get_registration_date();
    }
    if(isset($_POST['register'])) {
        $password = md5($post['password']);
        $confirm = md5($post['confirm']);
        $date = date('d.m.y');
    }
    
    //verification de la completion des éléments obligatoires
    
    if(empty($post['pseudo']) || empty($password) || empty($confirm) || empty($post['lastname']) || empty($post['firstname']) || empty($post['email']) || empty($post['phonenumber']) || empty($post['city'])) {
        
         if (isset ($_POST['register'])) {
             $_SESSION['error'] = "Veillez a bien remplir tout les champ avant d'envoyer votre inscription !";
                header('Location: register.php');
            } elseif (isset($_POST['modifier'])) {
                $_SESSION['error'] = "Veillez a bien remplir tout les champ précédé d'un étoile !";
                header('Location: profile.php');
            }
        exit();
    }
    
    //verification de l'existance du pseudo
    
    $pseudo_allready_use = scandir('user');
    if(is_array($pseudo_allready_use)) {
        foreach($pseudo_allready_use as $pseudo) {
            if($pseudo == $post['pseudo']) {
                $_SESSION['error'] = "Pseudo déjà existant !";
                if (isset ($_POST['register'])) {
                    header('Location: register.php');
                } elseif (isset($_POST['modifier'])) {
                    header('Location: profile.php');
                }
                exit();
            }
        } 
    }
    
    //verification de la taille du pseudo
    
    if (strlen($post['pseudo']) < 3 || strlen($post['pseudo']) > 15) {
        $_SESSION['error'] = "Pseudo trop long ou trop cours !";
         if (isset ($_POST['register'])) {
                header('Location: register.php');
            } elseif (isset($_POST['modifier'])) {
                header('Location: profile.php');
            }
        exit();
    }
    
    //verification du password
    
    if ($confirm != $password) {
        $_SESSION['error'] = "Mot de passe incorrect !";
         if (isset ($_POST['register'])) {
                header('Location: register.php');
            } elseif (isset($_POST['modifier'])) {
                header('Location: profile.php');
            }
        exit();
    }
    
    //verification du format de l'email
    
    if (!preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $post['email'])) {
        $_SESSION['error'] = "Email incorrect !";
         if (isset ($_POST['register'])) {
                header('Location: register.php');
            } elseif (isset($_POST['modifier'])) {
                header('Location: profile.php');
            }
        exit();
    }
    
    //verification du format du numero de telephone
    
    if (strlen($post['phonenumber']) != 10) {
        $_SESSION['error'] = "Numéro de téléphone incorrect !";
         if (isset ($_POST['register'])) {
                header('Location: register.php');
            } elseif (isset($_POST['modifier'])) {
                header('Location: profile.php');
            }
        exit();
    }
    
    // Fin de la verification
    //si modification alors supprime l'ancien file pour mieu le remplacer
    
    if(isset($_POST['modifier'])) {
        $new_bdd->delet_file("user", $new_bdd->user->get_pseudo());
    }
    
    //creation du nouvel user
    
    $new_user = new User($post['pseudo'], $password, $post['firstname'], $post['lastname'], $post['email'], $post['phonenumber'], $date, $post['city']);
    
    //ajout d'information lors de la modification du profil
    
    if(isset($_POST['modifier'])) {
        $new_user->set_adress($post['adress']);
        $new_user->set_birth($post['birth']);
        $new_user->set_diplome($post['diplome']);
        $new_user->set_descript($post['descript']);
    }
    
    //création de la sauvgarde du user
    
    $new_bdd->set_user($new_user);
    $new_bdd->stock_user();
    $new_bdd->session();
    $_SESSION['error'] = null;
    header('Location: profile.php');
    exit();
}

// Debut des verifications de connexion

if (isset($_POST['connection'])){
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $users = scandir('user');
    foreach ($users as $user) {
        if (pathinfo($user, PATHINFO_FILENAME) == $post['conect_pseudo']) {
            $new_bdd->open_user_file(pathinfo($user, PATHINFO_FILENAME));
            if($new_bdd->test_password($post['conect_password']) == true) {
                $new_bdd->session();
                header('Location: profile.php');
                exit();
            }
        }
    }
    $_SESSION['error'] = "Identifiants incorrect !";
    header('Location: index.php');
    exit();
}

// Deconnexion

if (isset($_POST['deconnection'])){
    $new_bdd->destruct_session();
    header('Location: index.php');
    exit();
}

if (isset($_POST['newannounce'])){
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
    //verification de la completion des éléments obligatoires
    
    if(empty($post['title']) || empty($post['descript']) || empty($post['tag'])) {
        $_SESSION['error'] = "Il y a un probleme : ";
        if(empty($post['title'])) {
            $_SESSION['error'] = $_SESSION['error']."* il manque un tritre ";
        }
        if(empty($post['descript'])) {
            $_SESSION['error'] = $_SESSION['error']."* il manque une description ";
        }
        if(empty($post['tag'])) {
            $_SESSION['error'] = $_SESSION['error']."* mettez au moins un tag ";
        }
        $_SESSION['error'] = $_SESSION['error']."!";
        header('Location: newannounce.php');
        exit();
    }
    
    //verification de la taille du titre
    
    if (strlen($post['title']) < 3 || strlen($post['title']) > 25) {
        $_SESSION['error'] = "titre trop long ou trop cours !";
        header('Location: newannounce.php');    
        exit();
    }
    
    //verification de la taille de la description
    
    if (strlen($post['descript']) < 10 || strlen($post['descript']) > 10000) {
        $_SESSION['error'] = "description trop long ou trop cours !";
        header('Location: newannounce.php');    
        exit();
    }
    
    //In comming : verification et enregistremnt de l'image
    
    $pictur = null;
    $new_announce = new Announce(date('dmyhis'), $_SESSION['user_connecter'], $post['title'], $post['descript'], $post['tag'], $pictur, date('l jS \of F Y h:i:s A'));
    $new_bdd->set_announce($new_announce);
    var_dump($new_announce);
    $new_bdd->stock_announce();
}

if (isset($_POST['remove'])) {
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    unlink("announce/".$post["file_name"].".txt");
    //header('Location: index.php');    
    //exit();
}

?>
</html>