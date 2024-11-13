<?php
session_start(); 
if(isset($_SESSION['Nom']) & !empty($_SESSION['Nom']) ){
include("db_connexion.php"); 
$sql="select etudiant.CNE, etudiant.CNI, etudiant.Nom, etudiant.Prenom, etudiant.DateNais, ville.Lib_ville from etudiant join ville on etudiant.Id_Ville = ville.Id_ville;";
$result=mysqli_query($link,$sql);?>
<?php include("admin_header.php"); ?>
<!------------------------------------------->
    <div class="box1">
    <h2><?php echo '<span style="font-size:100px;">Welcome</span>'.'<span> '.$_SESSION['Nom']." ".$_SESSION['Prenom']." </span>" ?></h2>
    <a href="inscription.php" class="btn btn-primary btn_ajouter">Ajouter</a>
    </div>
    <div class="container">
    <table class="table table-hover table-bordered table-triped">
       <thead>
        <tr>
            <th>CNE</th>
            <th>CNI</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Date_Naissance</th>
            <th>Ville</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
       </thead>
       <tbody>
        <?php while($row=mysqli_fetch_assoc($result)) 
        {
            echo 
            "<tr>".

            "<td>".$row['CNE'] . "</td>".
            "<td>".$row['CNI'] . "</td>".
            "<td>".$row['Nom'] . "</td>".
            "<td>".$row['Prenom']."</td>".
            "<td>".$row['DateNais']."</td>".
            "<td>".$row['Lib_ville']."</td>".
            '<td><a href="admin_update_page.php?cne=' . $row['CNE'] . '" class="btn btn-success">Update</a></td>'.
            '<td><a href="admin_delete_page.php?cne=' . $row['CNE'] . '" class="btn btn-danger">Delete</a></td>'.
        
            "</tr>";
        }
        ?>
       </tbody>
    </table>

    <!--logout boutton-->
    <form action="admin_crud.php" method="post">
    <input type="submit" name="logout" class="btn btn-danger" value="Déconnexion">
    </form>
    <?php
    // deconnexion.php

    if (isset($_POST['logout'])) {
    // Destruction de toutes les variables de session
    session_unset();

    // Destruction de la session
    session_destroy();

    // Redirection vers la page de connexion par exemple
    header("Location: authentification.php");
    exit();
    }
    ?>
    <!---------------------->

   

    <?php include ("admin_footer.php"); 
    $link->close();
    }
    else
    {
        header('Location: connexion_errone.html');
    }
    ?>