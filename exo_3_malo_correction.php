<?php

function dd($a) {
    echo("<pre>");
    echo("<code>");
    var_dump($a);
    echo("</code>");
    echo("</pre>");
}

class Input {
    public array $errors = [];
    
    // passer le $value en privé
    private string $value;
    
    public function __construct(string $value) {
        $this->value = $value;
        // optionnel
        // $this->checkValue();
    }
    
    // Getter / Accesseur
    public function getValue(): string {
        return $this->value;
    }

    // Setter / Mutateur
    public function setValue($value): bool {
        if($value == null) {
            return false;
        }
        $this->value = $value;
        return true;
    }

    public function isValid(): bool {
        return empty($this->errors);
    }

    public function checkValue() {
        // conditions ici pour remplir ou non le tableau d'erreur...
    }
}

class Name extends Input {
    // Surcharge de fonction / méthode
    public function checkValue() {
        if (empty($this->getValue()) || !preg_match("/^[a-zA-ZÀ-ÿ-]+$/", $this->getValue())) {
            $this->errors[] = "Le nom doit être valide.";
        }
    }
}

class Firstname extends Input {
    public function validate() {
        if (empty($this->getValue()) || !preg_match("/^[a-zA-ZÀ-ÿ-]+$/", $this->getValue())) {
            $this->errors[] = "Le prénom doit être valide.";
        }
    }
}

class Email extends Input {
    public function checkValue() {
        if (empty($this->getValue()) || !filter_var($this->getValue(), FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "L'adresse email n'est pas valide.";
        }
    }
}

class Phone extends Input {
    public function checkValue() {
        if (empty($this->getValue()) || !preg_match("/^\d{10}$/", $this->getValue())) {
            $this->errors[] = "Le numéro de téléphone doit être valide.";
        }
    }
}

class CustomDate extends Input {
    public function checkValue() {
        if (empty($this->getValue()) || !preg_match("/^\d{4}-\d{2}-\d{2}$/", $this->getValue())) {
            $this->errors[] = "Le format de la date est incorrect.";
        }
    }
}

class Message extends Input {
    public function checkValue() {
        if (empty($this->getValue()) || strlen($this->getValue()) < 50) {
            $this->errors[] = "Le message doit contenir au moins 50 caractères.";
        }
    }
}

class Form {
    private $fields = [];
    
    public function getFields() {
        return $this->fields;
    }

    public function addField($obj) {
        $this->fields[] = $obj;
    }

    public function validate() {
        foreach( $this->fields as $field ) {
            $field->checkValue();
        }
    }

    public function getErrors() {
        $errors = [];
        foreach( $this->fields as $field ) {
            array_merge($errors, $field->errors);
        }
        return $errors;
    }
}

// Je crée le formulaire
$form = new Form();
// J'intègre les champs
$form->addField(new Name("nom"));
$form->addField(new Firstname("prénom"));
$form->addField(new Email("toto@toto.fr"));
$form->addField(new Phone("0600000000"));
$form->addField(new Date("01/01/2001"));
$form->addField(new Message("Coucou"));
// je valide le contenu
$form->validate();
// Je récupère les erreurs
dd( $form->getErrors() );
