<?php require("db_connexion.php"); ?>
<?php
if (isset($_GET['cne']))
{
    $cne=$_GET['cne'];
    $query_delete_etudiant= "DELETE FROM etudiant WHERE etudiant.CNE = ? ;";
    // Préparation de la requête
    $stmt = mysqli_prepare($link, $query_delete_etudiant);
    if ($stmt) {
        // Liaison du paramètre
        mysqli_stmt_bind_param($stmt, "s", $cne);

        // Exécution de la requête
        mysqli_stmt_execute($stmt);
        //header to location
        header('Location: admin_crud.php');
    }
    else
    {echo "Error du suppression";}
}?>





<?php
$link->close();
?>