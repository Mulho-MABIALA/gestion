# Guide d'installation du projet

## Prérequis
- PHP >= 8.2
- Composer
- MySQL ou MariaDB
- Node.js et npm

## Étapes d'installation

### 1. Installer les dépendances
```bash
composer install
npm install
```

### 2. Configurer la base de données

#### Créer la base de données MySQL
Connectez-vous à MySQL et exécutez:
```sql
CREATE DATABASE gestion CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

Ou via la ligne de commande:
```bash
mysql -u root -p -e "CREATE DATABASE gestion CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
```

### 3. Configurer le fichier .env

Copiez le fichier .env.example:
```bash
cp .env.example .env
```

Vérifiez que ces lignes sont correctement configurées dans votre fichier `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gestion
DB_USERNAME=root
DB_PASSWORD=
```

**Important**: Modifiez `DB_USERNAME` et `DB_PASSWORD` selon votre configuration MySQL.

### 4. Générer la clé d'application
```bash
php artisan key:generate
```

### 5. Exécuter les migrations
```bash
php artisan migrate
```

Cette commande va créer toutes les tables nécessaires (sessions, cache, users, etc.)

### 6. Compiler les assets
```bash
npm run build
```

### 7. Lancer le serveur
```bash
php artisan serve
```

L'application sera accessible sur: http://localhost:8000

## Mode développement

Pour lancer en mode développement avec hot-reload:
```bash
composer dev
```

## Problèmes courants

### Erreur 500: Base 'gestion' inconnue
- Vérifiez que la base de données a bien été créée
- Vérifiez les paramètres DB_* dans le fichier .env
- Testez la connexion: `php artisan migrate:status`

### Erreur: La table 'sessions' n'existe pas
- Exécutez: `php artisan migrate`

### Erreur de permissions (Linux/Mac)
```bash
chmod -R 775 storage bootstrap/cache
```

### Problème avec la clé APP_KEY
```bash
php artisan key:generate
```

## Installation rapide (via composer)

Si vous préférez, utilisez la commande setup:
```bash
composer setup
```

Cette commande exécute automatiquement:
- Installation des dépendances
- Copie du .env
- Génération de la clé
- Migration de la base de données
- Installation des dépendances npm
- Build des assets

**Note**: Vous devez quand même créer la base de données MySQL manuellement avant de lancer `composer setup`.
