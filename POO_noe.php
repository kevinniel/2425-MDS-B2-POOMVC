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
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = htmlspecialchars(trim($_POST['nom'] ?? ''));
    $prenom = htmlspecialchars(trim($_POST['prenom'] ?? ''));
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $telephone = htmlspecialchars(trim($_POST['telephone'] ?? ''));
    $date = htmlspecialchars(trim($_POST['date'] ?? ''));
    $message = htmlspecialchars(trim($_POST['message'] ?? ''));

    if (empty($nom)) $errors[] = "Le champ 'Nom' est obligatoire.";
    if (empty($prenom)) $errors[] = "Le champ 'Prénom' est obligatoire.";
    if (empty($email)) $errors[] = "Le champ 'Email' est obligatoire.";
    if (empty($telephone)) $errors[] = "Le champ 'Téléphone' est obligatoire.";
    if (empty($date)) $errors[] = "Le champ 'Date' est obligatoire.";
    if (empty($message)) $errors[] = "Le champ 'Message' est obligatoire.";

    // téléphone
    if (!empty($telephone) && !preg_match('/^\d{10}$/', $telephone)) {
        $errors[] = "Le numéro de téléphone doit contenir exactement 10 chiffres.";
    }

    // email
    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Le format de l'email est invalide.";
    }

    //date dans le futur
    if (!empty($date) && strtotime($date) < time()) {
        $errors[] = "La date ne peut pas être dans le passé.";
    }

    // nombre de caractères
    if (!empty($message) && strlen($message) < 50) {
        $errors[] = "Le message doit contenir plus de 50 caractères.";
    }

    // résultat
    if (empty($errors)) {
        echo "<p style='color: green;'>Formulaire soumis avec succès !</p>";
    } else {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    }
} else {
    echo "<p style='color: red;'>Le formulaire n'a pas été soumis correctement.</p>";
}
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