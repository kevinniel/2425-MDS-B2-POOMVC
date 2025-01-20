<?php

class Formulaire
{
    // Attributs
    public $nom;
    public $prenom;
    public $email;
    public $telephone;
    public $date;
    public $message;
    public $errors = [];

    public function __construct($isPost)
    {
        if ($isPost) {
            $this->nom = htmlspecialchars(trim($_POST['nom'] ?? ''));
            $this->prenom = htmlspecialchars(trim($_POST['prenom'] ?? ''));
            $this->email = htmlspecialchars(trim($_POST['email'] ?? ''));
            $this->telephone = htmlspecialchars(trim($_POST['telephone'] ?? ''));
            $this->date = htmlspecialchars(trim($_POST['date'] ?? ''));
            $this->message = htmlspecialchars(trim($_POST['message'] ?? ''));
        }
        $this->validate();
        $this->displayErrors();
    }

    public function validate()
    {
        $this->validateName();
        $this->validateFirstName();
        $this->validateEmail();
        $this->validatePhone();
        $this->validateDate();
        $this->validateMessage();
        
        // on ne renvoie rien car pas de nécessité
        // return $this->errors;
    }

    public function validateName() {
        if (empty($this->nom)) {
            $this->errors[] = "Le champ 'Nom' est obligatoire.";
        }
    }

    public function validateFirstName() {
        if (empty($this->prenom)) {
            $this->errors[] = "Le champ 'Prénom' est obligatoire.";
        }
    }

    public function validateEmail() {
        if (empty($this->email)) {
            $this->errors[] = "Le champ 'Email' est obligatoire.";
        } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "Le champ 'Email' n'est pas valide.";
        }
    }

    public function validatePhone() {
        if (empty($this->telephone)) {
            $this->errors[] = "Le champ 'Téléphone' est obligatoire.";
        } elseif (!preg_match('/^\d{10}$/', $this->telephone)) {
            $this->errors[] = "Le numéro de téléphone doit contenir exactement 10 chiffres.";
        }
    }

    public function validateDate() {
        if (empty($this->date)) {
            $this->errors[] = "Le champ 'Date' est obligatoire.";
        } elseif (strtotime($this->date) < time()) {
            $this->errors[] = "La date ne peut pas être dans le passé.";
        }
    }

    public function validateMessage() {
        if (empty($this->message)) {
            $this->errors[] = "Le champ 'Message' est obligatoire.";
        } elseif (strlen($this->message) < 50) {
            $this->errors[] = "Le message doit contenir au moins 50 caractères.";
        }
    }

    public function displayErrors()
    {
        if (!empty($this->errors)) {
            foreach ($this->errors as $error) {
                echo "<p style='color: red;'>$error</p>";
            }
        } else {
            echo "<p style='color: green;'>Formulaire soumis avec succès !</p>";
        }
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form = new Formulaire(true);
} else {
    echo "<p style='color: red;'>Le formulaire n'a pas été soumis correctement.</p>";
}
?>
