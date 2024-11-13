<?php require("db_connexion.php"); ?>
<?php include("admin_header.php");?>
<style>
.container {
    width: 40%;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ddd;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background-color: #fff;
    margin-top: 50px;
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

<?php
if (isset($_GET['cne']))
{
    $cne=$_GET['cne'];
    $query_etudiant = "SELECT etudiant.*, ville.Lib_ville 
    FROM etudiant 
    JOIN ville ON etudiant.Id_ville = ville.Id_ville 
    WHERE etudiant.CNE = ?";
    $requette_villes="SELECT * FROM ville";
    
    // Préparation de la requête
    $stmt = mysqli_prepare($link, $query_etudiant);
    $query_villes=mysqli_query($link,$requette_villes);

    // Vérification de la préparation de la requête
    if ($stmt) {
        // Liaison du paramètre
        mysqli_stmt_bind_param($stmt, "s", $cne);

        // Exécution de la requête
        mysqli_stmt_execute($stmt);

        // Récupération du résultat
        $result = mysqli_stmt_get_result($stmt);

        // Affichage des résultats
        while ($row = mysqli_fetch_assoc($result)) 
        {
        ?>
        <div class="container">
        <h2>Update Forme</h2>
        <form action="admin_update_traitement.php" method="post">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" maxlength="10" minlength="2" value="<?php echo $row['Nom']; ?>" required><br>

        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" maxlength="10" minlength="2" value="<?php echo $row['Prenom'] ?>" required><br>

        <label for="cne">CNE :</label>
        <input type="text" name="cne" maxlength="10" minlength="10" value="<?php echo $row['CNE'] ?>" required><br>

        <label for="cni">CNI :</label>
        <input type="text" name="cni" maxlength="7" minlength="7" value="<?php echo $row['CNI'] ?>" required><br>

        <label for="date_naissance">Date de naissance :</label>
        <input type="date" name="date_naissance" value="<?php echo $row['DateNais'] ?>" required><br>

        <label for="ville">Ville :</label>
        <select name="ville" required>
            <?php
            while ($liste_ville=mysqli_fetch_assoc($query_villes))
            {
                $idVille = $liste_ville['Id_ville'];
                $libVille = $liste_ville['Lib_ville'];
        
                // Vérifiez si la ville est celle de l'étudiant
                $selected = ($idVille == $row['Id_Ville']) ? 'selected' : '';
        
                // Affichez l'option avec l'attribut "selected" si c'est la ville de l'étudiant
                echo '<option value="' . $idVille . '" ' . $selected . '>' . $libVille . '</option>';
            }
            
            ?>
            <!-- Ajoutez d'autres options selon vos besoins -->
        </select><br>

        <input type="submit" value="Update">
    </form>
        </div>

        <?php
        }
        ?>
      
      <?php  // Fermeture du statement
          mysqli_stmt_close($stmt);
    } else {
        // Gestion des erreurs de préparation
        echo "Erreur de préparation de la requête.";
    }

}else
{
    echo"No Parametre Found!";
}


?>






















<?php include("admin_footer.php");
$link->close(); ?>