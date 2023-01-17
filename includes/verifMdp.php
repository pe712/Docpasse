<?php
$n = strlen($mdp1);
$min = "~[a-z]~";
$maj = "~[A-Z]~";
$chiffre = "~[0-9]~";
$special = "~[^a-zA-Z0-9]~";
if ($mdp1 != $mdp2){
    $corr = false;
    $msg = 'Les mots de passe ne sont pas identiques. ';
}
elseif($n<8){
    $corr = false;
    $msg = 'Le mot de passe doit faire au moins 8 caractères. ';
}
elseif(!preg_match($maj, $mdp1) or !preg_match($min, $mdp1)){
    $corr = false;
    $msg = 'Il faut au moins une minucscule et une majuscule. ';
}
elseif(!preg_match($chiffre, $mdp1)){
    $corr = false;
    $msg = 'Il faut au moins un chiffre. ';
}
elseif(!preg_match($special, $mdp1)){
    $corr = false;
    $msg = 'Il faut au moins un caractère spécial. ';
}
else{
    $corr = true;
}
