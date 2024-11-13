<?php
// Connexion à la base de données
require("db_connexion.php");

// Récupération des données du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$cne = $_POST['cne'];
$cni = $_POST['cni'];
$date_naissance = $_POST['date_naissance'];
$id_ville = $_POST['ville'];
// Vérification de la date de naissance
$aujourdhui = new DateTime();
$date_naissance_obj = new DateTime($date_naissance);
// Vérifie si la personne a au moins 18 ans
$limite_age = 18;

if (strlen($nom) <=10 && strlen($prenom) <=10 && strlen($cne) ==10 && strlen($cni) == 7  && $aujourdhui->diff($date_naissance_obj)->y >= $limite_age ){
// Insertion des données dans la base de données
$requete = "INSERT INTO etudiant (CNE, CNI, Nom, Prenom, DateNais, Id_Ville) VALUES ('$cne', '$cni', '$nom', '$prenom', '$date_naissance', '$id_ville')";
$resultat = $link->query($requete);

// Vérification de l'insertion
if ($resultat) {
    require("inscription_reussite.php");
} else {
    require("inscription_errone.html"); 
    echo $link->error;
}

}else
{
    require("inscription_errone.html");
}

// Fermeture de la connexion
$link->close();
?>