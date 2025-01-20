<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <style>
        div {margin: 10px 0;}
    </style>
</head>
<body>
    <h1>Formulaire de contact pour prise de RDV</h1>
    <form action="">
        <div>
            <label for="lastname">Nom<sup>*</sup> : </label>
            <input id="lastname" type="text" name="lastname" placeholder="Nom">
        </div>
        <div>
            <label for="firstname">Prénom : </label>
            <input id="firstname" type="text" name="firstname" placeholder="Nom">
        </div>
        <div>
            <label for="mail">Mail<sup>*</sup> : </label>
            <input id="mail" type="text" name="mail" placeholder="Nom">
        </div>
        <div>
            <label for="phone">Téléphone<sup>*</sup> : </label>
            <input id="phone" type="text" name="phone" placeholder="Nom">
        </div>
        <div>
            <label for="date">Date du RDV souhaité<sup>*</sup> : </label>
            <input id="date" type="date" name="date" placeholder="Nom">
        </div>
        <div>
            <label for="message">Message<sup>*</sup> : </label>
            <textarea id="message" type="text" name="message"></textarea>
        </div>
        <div>
            <button type="submit">Envoyer</button>
        </div>
    </form>
</body>
</html>