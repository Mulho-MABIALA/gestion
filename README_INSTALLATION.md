# Application de Gestion des Tâches et Projets Clients

Application web Laravel pour la gestion des demandes de prestations informatiques.

## Caractéristiques

- **Prestations** : Site web, Applications mobiles, Applications desktop, API REST
- **Gestion des demandes** : Suivi avec code couleur (Rouge, Violet, Bleu, Vert)
- **Espaces dédiés** : Admin et Client
- **Upload de fichiers** : Support PDF, DOC, images, etc.
- **Emails automatiques** : Factures et notifications
- **Design responsive** : Tailwind CSS avec les couleurs #2563EB et #1F2937

## Prérequis

- PHP 8.2+
- MySQL 5.7+
- Composer
- Node.js & NPM
- Serveur web (Apache/Nginx ou WAMP/XAMPP)

## Installation

### 1. Créer la base de données MySQL

Ouvrez phpMyAdmin ou votre client MySQL et exécutez :

```sql
CREATE DATABASE IF NOT EXISTS gestion CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 2. Configuration de la base de données

Le fichier `.env` est déjà configuré avec :

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gestion
DB_USERNAME=root
DB_PASSWORD=
```

Si votre configuration MySQL est différente, modifiez ces valeurs dans le fichier `.env`.

### 3. Exécuter les migrations et seeders

```bash
php artisan migrate:fresh --seed
```

Cela va créer toutes les tables et insérer les données initiales :
- 1 compte administrateur
- 4 prestations

### 4. Lancer l'application

```bash
php artisan serve
```

L'application sera accessible sur : `http://localhost:8000`

## Comptes par défaut

### Administrateur
- **Email** : admin@gestion.com
- **Mot de passe** : password

Les clients créent automatiquement leurs comptes lors de leur première demande de prestation.

## Structure de l'application

### Pages publiques
- `/` - Page d'accueil avec présentation des prestations
- `/prestations` - Liste complète des prestations
- `/prestation/{id}` - Détails d'une prestation
- `/qui-sommes-nous` - À propos
- `/contact` - Formulaire de contact
- `/faq` - Questions fréquentes
- `/politique-confidentialite` - Politique de confidentialité
- `/conditions-generales` - Conditions générales
- `/login` - Connexion

### Espace Admin (`/admin`)
- `/admin/dashboard` - Tableau de bord avec statistiques
- `/admin/demandes` - Liste des demandes
- `/admin/demande/{id}` - Détail d'une demande
  - Changer le statut (Rouge, Violet, Bleu, Vert)
  - Envoyer une facture
  - Ajouter des notes internes
- `/admin/clients` - Liste des clients
- `/admin/client/create` - Créer un utilisateur (Admin ou Client)
- `/admin/client/{id}` - Profil client avec ses demandes

### Espace Client (`/client`)
- `/client/dashboard` - Mes demandes
- `/client/demande/{id}` - Détails d'une demande

### Création de demande
- `/demande/{prestation_id}` - Formulaire de demande
  - Création automatique du compte client
  - Upload de fichiers
  - Connexion automatique après soumission

## Statuts des demandes

1. **Rouge** 🔴 - Demande envoyée
2. **Violet** 🟣 - Demande reçue
3. **Bleu** 🔵 - En cours de traitement
4. **Vert** 🟢 - Terminée, prête pour livraison

## Technologies utilisées

- **Backend** : Laravel 12
- **Frontend** : Tailwind CSS 4 + Blade
- **Base de données** : MySQL
- **Assets** : Vite
- **Authentification** : Laravel Auth
- **Upload** : Laravel Storage

## Fonctionnalités principales

✅ Système d'authentification sécurisé
✅ Gestion des rôles (Admin/Client)
✅ CRUD complet des demandes
✅ Upload et gestion de fichiers
✅ Système de facturation
✅ Suivi en temps réel des demandes
✅ Interface responsive
✅ Design personnalisé avec les couleurs du cahier des charges

## Déploiement en production

### Hébergement recommandé : byet.host

1. **Préparer l'application**
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

2. **Créer une archive**
```bash
# Créer un fichier ZIP de tout le projet
# Exclure : node_modules, .git, .env
```

3. **Sur l'hébergeur**
- Créer la base de données MySQL
- Uploader et extraire le ZIP
- Modifier le `.env` avec les informations de production
- Exécuter les migrations : `php artisan migrate --force`
- Exécuter les seeders : `php artisan db:seed --force`

4. **Configuration Apache/Nginx**
- Pointer le document root vers `/public`
- Activer mod_rewrite

### Variables d'environnement importantes

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://votre-domaine.com

# Configuration email pour les factures
MAIL_MAILER=smtp
MAIL_HOST=smtp.votre-serveur.com
MAIL_PORT=587
MAIL_USERNAME=votre-email@domaine.com
MAIL_PASSWORD=votre-mot-de-passe
MAIL_FROM_ADDRESS=noreply@votre-domaine.com
MAIL_FROM_NAME="Gestion Tech"
```

## Personnalisation

### Footer
Modifiez vos informations dans [resources/views/layouts/app.blade.php](resources/views/layouts/app.blade.php:116) :

```php
<strong>Nom:</strong> Votre Nom<br>
<strong>Email:</strong> votre.email@example.com<br>
<strong>Téléphone:</strong> +33 X XX XX XX XX
```

### Couleurs
Les couleurs personnalisées sont définies dans [resources/css/app.css](resources/css/app.css:12) :

```css
--color-primary: #2563EB;  /* Bleu principal */
--color-dark: #1F2937;      /* Gris foncé */
```

## Support

Pour toute question technique, consultez :
- Documentation Laravel : https://laravel.com/docs
- Documentation Tailwind CSS : https://tailwindcss.com/docs

## Licence

Ce projet a été créé pour un projet académique.
