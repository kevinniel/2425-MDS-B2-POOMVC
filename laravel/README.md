# Cours Laravel

on crée une table pour gérer des produits

## 1 - BDD

1. Mettre en place la migration

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

2. Créer un Factory pour populer la base de données (= créer les plans de datas fictives)
3. Seeder la base de données (= implanter les données dans la base)

