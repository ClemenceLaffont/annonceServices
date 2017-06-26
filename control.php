<!DOCTYPE html>
<html lang="fr">
<?php 
session_start();
include_once("class/user.php");
include_once("class/announce.php");
include_once("class/bdd.php");

if(isset ($_POST['inscription'])) {
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    if(empty($post['pseudo']) || empty($post['mdp']) || empty($post['confirme']) || empty($post['nom']) || empty($post['prenom']) || empty($post['mail']) || empty($post['num']) || empty($post['ville']) || empty($post['postal'])) {
        $_SESSION['erreur'] = "Veillez a bien remplir tout les champ avant d'envoyer votre inscription !";
        header('Location: index.php');
        exit();
    }
    $pseudo_existant = scandir('user');
    foreach($pseudo_existant as $pseudo) {
        if($pseudo == $post['pseudo']) {
            $_SESSION['erreur'] = "Pseudo déjà existant !";
            header('Location: index.php');
            exit();
        }
    } 
    if (strlen($post['pseudo']) < 3 || strlen($post['pseudo']) > 15) {
        $_SESSION['erreur'] = "Pseudo trop long ou trop cours !";
        header('Location: index.php');
        exit();
    }
    if ($post['confirme'] != $post['mdp'] || empty($post['mdp'])) {
        $_SESSION['erreur'] = "Mot de passe incorrect !";
        header('Location: index.php');
        exit();
    }
    if (!preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $post['mail'])) {
        $_SESSION['erreur'] = "Email incorrect !";
        header('Location: index.php');
        exit();
    }
    if (strlen($post['num']) != 10) {
        $_SESSION['erreur'] = "Numéro de téléphone incorrect !";
        header('Location: index.php');
        exit();
    }
    $location = $post['ville']."(".$post['postal'].")";

    
    $new_user = new User($post['pseudo'], md5($post['mdp']), $post['prenom'], $post['nom'], $post['mail'], $post['num'], date('d.m.y'), $location);
    $new_bdd = new Bdd($new_user);
    $new_bdd->stock_user();
    $_SESSION['erreur'] = null;
}
?>
</html>