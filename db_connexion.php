<?php 
$link = mysqli_connect("localhost", "root", "", "db_licence");
if ($link->connect_error)
{
    die("connection failed:".$link->connect_error);
}
?>