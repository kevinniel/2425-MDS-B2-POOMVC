# Cours Laravel

on crée une table pour gérer des produits

## 1 - BDD

### 1. Mettre en place la migration

Créer le fichier
```
php artisan make:migration create_products_table
```

Déchlencher les migrations
```
php artisan migrate
```

Tout remettre à zéro et déclencher toutes les migrations
```
php artisan migrate:fresh
```

### 2. Créer un Factory pour populer la base de données (= créer les plans de datas fictives)

Créer le fichier Factory
```
php artisan make:factory ProductFactory
```

Créer le fichier Model correspondant
```
php artisan make:model Product
```

Ne pas oublier d'ajouter le `hasfactory` dans le model comme suit : 

```
use Illuminate\Database\Eloquent\Factories\HasFactory;
use HasFactory;
```


### 3. Seeder la base de données (= implanter les données dans la base)

Déclencher le tout en remettant à 0 la BDD
```
php artisan migrate:fresh --seed
```

## 2 - Routes

fichier `resources/routes/web.php`

exemple de création de route : 
```
Route::get("/products", [ProductController::class, 'index']);
```

## 3 - Controller

Créer le fichier
```
php artisan make:controller ProductController
```

Puis créer la méthode 'index'

## 4 - Créer la vue

Dans le dossier `resources/views/products/index.blade.php`

Renseignez le HTML dans votre PHP