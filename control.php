<?php 
include_once("class/user.php");
$location = $_POST['ville']."(".$_POST['postal'].")";
$new_user = new User($_POST['pseudo'], $_POST['mdp'], $_POST['prenom'], $_POST['nom'], $_POST['mail'], $_POST['num'], date('d.m.y'), $location);
$new_user->afficheProfil();
$new_user->stock();