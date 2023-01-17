<?php
error_reporting(E_ALL);
session_start();
if (!isset($_SESSION["nom"])){
    header("location:notConnected.php");
}
else{
    include("includes/ConnectionDB.php");
    include("includes/getId.php");
    include("includes/majSession.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Paramètres de génération de mot de passe</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/favicon.png">
</head>
<body>
    <header>
    <?php
    include("includes/navbar.php");
    ?>
    <div class="titre sub_title">Paramètres de génération de mot de passe</div>
    </header>

    <p>Veuillez indiquer la longueur des mots de passe à générer ainsi que les caractères à inclure</p>
    <form method="post" action="settingsGeneMdpPost.php">
        <label for="nb"> Longueur du mot de passe à générer</label>
        <input type="number" id="nb" name="nb" placeholder="longueur du mot de passe" value=12><br><br>
        <input type="checkbox" id="chiff" name="chiff" value=true, checked>
        <label for="chiff"> Chiffres</label><br>
        <input type="checkbox" id="min" name="min" value=true, checked>
        <label for="min"> Minuscules</label><br>
        <input type="checkbox" id="maj" name="maj" value=true, checked>
        <label for="maj"> Majuscules</label><br>
        <input type="checkbox" id=0 name=0 value=true checked>
        <label for=0> !?</label>
        <input type="checkbox" id=1 name=1 value=true>
        <label for=1> §€$@&/\%*µ#</label>
        <input type="checkbox" id=2 name=2 value=true checked>
        <label for=2> :;,.</label>
        <input type="checkbox" id=3 name=3 value=true>
        <label for=3> ()[]{}</label>
        <input type="checkbox" id=4 name=4 value=true>
        <label for=4> _-+=</label>
        <input type="checkbox" id=5 name=5 value=true>
        <label for=5> éèàçù</label>
        <input type="checkbox" id=6 name=6 value=true>
        <label for=6> ^¨</label>
        <input type="checkbox" id=7 name=7 value=true>
        <label for=7> âêûîöäëüïö</label><br><br>
        <input type="checkbox" id=AM name=AM value=true checked>
        <label for=AM> Au moins un cacractère dans chacune des catégories selectionnées parmi chiffres/minuscules/majuscules/caractères spéciaux</label><br><br>
        <input type="submit" value="Valider">
    </form>
</body>
</html>
<?php
}

