<?php
//commencer la session
session_start();

// Connexion à la base de données
require("db_connexion.php");

// Vérification de la connexion
if ($link->connect_error) {
    die("Erreur de connexion à la base de données : " . $link->connect_error);
}

// Récupération des données du page authentification
$cea = $_POST['Cea'];
$password = $_POST['Password'];
// Requête SQL pour récupérer l'administrateur avec le Cea donné
$requete = "SELECT * FROM administrateur WHERE Cea = '$cea'";
$resultat = $link->query($requete);

if ($resultat->num_rows > 0) {
    $administrateur = $resultat->fetch_assoc();
    //echo $administrateur['Password'];
    //echo $password;
    // Vérification du mot de passe
    if ($administrateur['Password']==$password) {
        // Mot de passe correct
        $_SESSION['Nom']=$administrateur['Nom'];
        $_SESSION['Prenom']=$administrateur['Prenom'];
        require("connexion_reussite.html"); 
        // Rediriger vers le tableau de bord
        header("Refresh: 1;URL=admin_crud.php");

        
    } else {
        // Mot de passe incorrect
        require("connexion_errone.html");
        echo "</br>Mot de passe incorrect!";
        header("Refresh: 2;URL=authentification.php");

        exit();
    }
} 
else 
{
    // Aucun administrateur trouvé avec cet email
    require("connexion_errone.html");
    echo "</br>aucun administrateur est trouvé!";
    header("Refresh: 5;URL=authentification.php");

    exit();
}

// Fermeture de la connexion
$link->close();

?>