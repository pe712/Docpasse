<nav>
    <div class="logo"><a href=index.php><img src="img/logo complet.png" alt="logo docpasse" height="100px"></a></div>
    <div>
    <ul class="connexion">

<?php
//echo session_id();
if (isset($_SESSION["nom"])){
    echo '
    <li class="bienvenue">Bienvenue '.$_SESSION["nom"].'</li>
    <li><a href="Unconnect.php">Se déconnecter</a></li>
    <li><a href="EspacePerso.php">Mon espace personnel</a></li>
    <li><a href="MyAccount.php">Mon compte</a></li>';
}
else{
    echo '
    <li><a href="Connection.php">Se connecter</a></li>
    <li><a href="NewMember.php">Nouveau membre</a></li>';
}
?>

    </ul>
    </div>
</nav>