<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
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

        .message-container {
            background-color: #4caf50;
            color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        .message-container h2 {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="message-container">
        <h2>Inscription Réussie !</h2>
        <p>Merci de vous être inscrit. Vous pouvez maintenant vous connecter.</p>
    </div>
</body>
</html>
<?php header("Refresh: 1;URL=admin_crud.php"); ?>