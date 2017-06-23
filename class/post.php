<?php
include_once('user.php');
$trux = file_get_contents("../user/pseudo.txt");
$machin = unserialize($trux);
$machin->afficheProfil();