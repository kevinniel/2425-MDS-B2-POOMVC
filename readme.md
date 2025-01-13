# POO & MVC

## Exo 1

À partir du fichier `index.php`, traiter le formulaire en PHP pour sécuriser l'ensemble des informations qui y sont présentes et pour informer les utilisateurs des potentielles erreurs s'il en existe.

Liste des erreurs à traiter : 

- vérification des champs obligatoires
- numéro de telephone : que des numéros + le nombre de numéro
- email : format
- date : future
- nb caractères message au moins 50

## Exo 2

Implémenter une classe et un objet pour traiter l'ensemble des erreurs du formulaire. Vous allez aussi exporter votre code PHP dans une autre fichier. Vous l'importerez ensuite dans le HTML avec un `include_once()`.
Le fichier `index.php` ne doit contenir comme code PHP **QUE** l'import et l'instanciation de votre object (ex: `new Object();`).

## Exo 3

Vous allez devoir refaire le même travail que pour les deux exercices précédents. MAIS, en utilissant de l'héritage **obligatoirement**. Vous devrez également traiter vos champs du formulaire 1 par 1, en réalisant un objet pour traiter chacun de ces champs.