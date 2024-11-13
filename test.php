<?php
require("db_connexion.php");
$requette="SELECT * FROM ville";
$result = mysqli_query($link,$requette);
$nbr=mysqli_num_rows($result);
$now=new DateTime();
echo "il y a $nbr villes dans votre base <br>";
while ($val = mysqli_fetch_assoc($result))
{
    echo $val['Id_ville'] ;
    
}
mysqli_close ($link);
?>