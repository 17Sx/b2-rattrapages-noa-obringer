# Projet Symfony

## Prérequis

- PHP 8.1 ou supérieur
- Composer
- MySQL/MariaDB
- Symfony CLI (optionnel mais recommandé)

## Installation

1. Cloner le projet

```bash
git clone https://github.com/17Sx/b2-rattrapages-noa-obringer
cd b2-rattrapages-noa-obringer
```

2. Installer les dépendances

```bash
composer install
```

3. Configuration de la base de données

- Créer un fichier `.env.local` à la racine du projet
- Ajouter la configuration de la base de données :

```
DATABASE_URL="mysql://user:password@127.0.0.1:3306/nom_de_la_base?serverVersion=8.0"
```

4. Créer la base de données

```bash
php bin/console doctrine:database:create
```

5. Exécuter les migrations

```bash
php bin/console doctrine:migrations:migrate
```

## Démarrer le projet

1. Lancer le serveur de développement

```bash
symfony server:start
```

ou

```bash
php -S 127.0.0.1:8000 -t public
```

2. Accéder au projet

- Ouvrir votre navigateur et aller à l'adresse : http://127.0.0.1:8000

## Commandes utiles

- Créer une migration : `php bin/console make:migration`
- Mettre à jour la base de données : `php bin/console doctrine:schema:update --force`
- Vider le cache : `php bin/console cache:clear`
- Lister les routes : `php bin/console debug:router`

## Structure du projet

- `src/` : Code source de l'application
- `config/` : Fichiers de configuration
- `templates/` : Templates Twig
- `public/` : Fichiers publics (CSS, JS, images)
- `migrations/` : Migrations de la base de données
