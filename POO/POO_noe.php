<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Contact</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            padding: 20px;
            max-width: 400px;
            margin: 0 auto;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<?php
include_once('class.php');
new Tabouret(true);
?>


<body>
    <h2>Formulaire de Contact</h2>
    <form action="" method="POST">
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom">

        <label for="prenom">Prénom</label>
        <input type="text" id="prenom" name="prenom">

        <label for="email">Email</label>
        <input type="email" id="email" name="email">

        <label for="telephone">Téléphone</label>
        <input type="tel" id="telephone" name="telephone">

        <label for="date">Date</label>
        <input type="date" id="date" name="date">

        <label for="message">Message</label>
        <textarea name="message" id="message"></textarea>

        <button type="submit">Envoyer</button>
    </form>
</body>
</html>