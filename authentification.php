<?php
session_start();
if (isset($_SESSION['Nom']) & !empty($_SESSION['Nom']))
{
    header('Location:admin_crud.php');
}
else
{


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h2 {
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #45a049;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Connexion</h2>
        <form action="traitement_authentification.php" method="post">
            <label for="Cea">CEA :</label>
            <input type="text" name="Cea" required>

            <label for="Password">Mot de passe :</label>
            <input type="password" name="Password" required>

            <input type="submit" value="Se connecter">
        </form>
    </div>
</body>
</html>
<?php
}
?>