<?php
class Champ {
    protected $value;
    protected $errors = [];
    
    public function __construct($value) {
        $this->value = trim($value);
    }
    
    public function getValue() {
        return $this->value;
    }

    public function getErrors() {
        return $this->errors;
    }
    
    public function isValid() {
        return empty($this->errors);
    }
}

class Nom extends Champ {
    public function validate() {
        if (empty($this->value) || !preg_match("/^[a-zA-ZÀ-ÿ-]+$/", $this->value)) {
            $this->errors[] = "Le nom doit être valide.";
        }
    }
}

class Prenom extends Champ {
    public function validate() {
        if (empty($this->value) || !preg_match("/^[a-zA-ZÀ-ÿ-]+$/", $this->value)) {
            $this->errors[] = "Le prénom doit être valide.";
        }
    }
}

class Email extends Champ {
    public function validate() {
        if (empty($this->value) || !filter_var($this->value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "L'adresse email n'est pas valide.";
        }
    }
}

class Telephone extends Champ {
    public function validate() {
        if (empty($this->value) || !preg_match("/^\d{10}$/", $this->value)) {
            $this->errors[] = "Le numéro de téléphone doit être valide.";
        }
    }
}

class Date extends Champ {
    public function validate() {
        if (empty($this->value) || !preg_match("/^\d{4}-\d{2}-\d{2}$/", $this->value)) {
            $this->errors[] = "Le format de la date est incorrect.";
        }
    }
}

class Message extends Champ {
    public function validate() {
        if (empty($this->value) || strlen($this->value) < 50) {
            $this->errors[] = "Le message doit contenir au moins 50 caractères.";
        }
    }
}

class Formulaire {
    private $nom;
    private $prenom;
    private $email;
    private $numero;
    private $date;
    private $message;
    
    public function __construct($data) {
        $this->nom = new Nom($data['nom']);
        $this->prenom = new Prenom($data['prenom']);
        $this->email = new Email($data['email']);
        $this->numero = new Telephone($data['numero']);
        $this->date = new Date($data['date']);
        $this->message = new Message($data['message']);
    }
    
    public function validate() {
        $this->nom->validate();
        $this->prenom->validate();
        $this->email->validate();
        $this->numero->validate();
        $this->date->validate();
        $this->message->validate();
    }
    
    public function isValid() {
        return $this->nom->isValid() && $this->prenom->isValid() && $this->email->isValid() && $this->numero->isValid() && $this->date->isValid() && $this->message->isValid();
    }
    
    public function getErrors() {
        return array_merge(
            $this->nom->getErrors(),
            $this->prenom->getErrors(),
            $this->email->getErrors(),
            $this->numero->getErrors(),
            $this->date->getErrors(),
            $this->message->getErrors()
        );
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'email' => $_POST['email'],
        'numero' => $_POST['numero'],
        'date' => $_POST['date'],
        'message' => $_POST['message']
    ];

    $formulaire = new Formulaire($data);
    $formulaire->validate();
    
    if ($formulaire->isValid()) {
        echo "<script>alert('Merci, votre message a été envoyé.');</script>";
    } else {
        $errors = $formulaire->getErrors();
        foreach ($errors as $error) {
            echo "<script>alert('$error');</script>";
        }
    }
}
?>