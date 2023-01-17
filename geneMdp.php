<?php
error_reporting(E_ALL);
session_start();
$chiffres = "0123456789";
$minuscules = "abcdefghijklmnopqrstuvwyxz";
$majuscules = "ABCDEFGHIJKLMNOPQRSTUVWYXZ";
$special = array(
    array("!", "?"), 
    array("§", "€", "$", "@", "&", "/", "\\", "%", "*", "µ", "#"),
    array(":", ";", ",", "."), 
    array("(", ")", "[", "]", "{", "}"), 
    array("_", "-", "+", "="), 
    array("é", "è", "à", "ç", "ù"), 
    array("^", "¨"), 
    array("â", "ê", "û", "î", "ö", "ä", "ë", "ü", "ï", "ö")
);

include("includes/ConnectionDB.php");
include("includes/getId.php");
$select = $conn->prepare("select a, b, c, d, e, f, g, h, nb, chiff, min, maj, AM from settingsGeneMdp where id=?");
$select->execute(array($id));
$spec = $select->fetch();

extract($spec);
$last = 0;
$verif = array();
$char = array();
if($chiff){
    $char = array_merge($char, str_split($chiffres));
    $last+= strlen($chiffres);
    array_push($verif, $last);
}
if($min){
    $char = array_merge($char, str_split($minuscules));
    $last+= strlen($minuscules);
    array_push($verif, $last);
}
if($maj){
    $char = array_merge($char, str_split($majuscules));
    $last+= strlen($majuscules);
    array_push($verif, $last);
}
$specCount=0;
for ($k = 0; $k <= 7; $k++){
    if ($spec[$k]){
        $char = array_merge($char, $special[$k]);
        $specCount+= count($special[$k]);
    }
}
$last+= $specCount;
array_push($verif, $last);

$correct = false;
while (!$correct){
    $mdp = "";
    $critere=array();
    for($i = 1; $i <= $nb; $i++){
        $k = random_int(0,count($char)-1);
        $mdp .= $char[$k];
        $j=0;
        while ($k>=$verif[$j]){
            $j+=1;
        }
        $critere[$j] = true;
    }
    $correct = true;
    if ($AM){
    for ($p=0; $p<count($verif); $p++){
        if (!isset($critere[$p])){
            $correct = false;
        }
    }
    }
}
echo $mdp
?>