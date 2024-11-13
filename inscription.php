<?php
include("db_connexion.php");
$sql="select * from ville";
$result=mysqli_query($link,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <style>
.container {
    width: 40%;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ddd;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background-color: #fff;
}

.container h2 {
    text-align: center;
    color: #333;
}


form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 10px;
}

input,
select {
    margin-bottom: 15px;
    padding: 10px;
    width: 100%;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #333;
    color: #fff;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #555;
}</style>
</head>
<body>
<div class="container">
    <h2>Formulaire</h2>
    <form action="traitement_inscription.php" method="post">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" maxlength="10" minlength="2" required><br>

        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" maxlength="10" minlength="2" required><br>

        <label for="cne">CNE :</label>
        <input type="text" name="cne" maxlength="10" minlength="10" required><br>

        <label for="cni">CNI :</label>
        <input type="text" name="cni" maxlength="7" minlength="7" required><br>

        <label for="date_naissance">Date de naissance :</label>
        <input type="date" name="date_naissance" required><br>

        <label for="ville">Ville :</label>
        <select name="ville" required>
            <?php
            
            while ($liste_ville=mysqli_fetch_assoc($result))
            {
            echo '<option value='.$liste_ville["Id_ville"].'>';
            echo $liste_ville["Lib_ville"];
            echo'</option>';
            }
            mysqli_close($link);
            
            ?>
            <!-- Ajoutez d'autres options selon vos besoins -->
        </select><br>

        <input type="submit" value="Ajouter">
    </form>
    
        </div>
<?php include("admin_footer.php");?>