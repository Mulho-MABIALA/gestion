#!/usr/bin/env php
<?php

/**
 * Script de vérification de la configuration Laravel
 * Lance ce script pour identifier les problèmes de configuration
 */

echo "🔍 Vérification de la configuration Laravel...\n\n";

// Vérifier si le fichier .env existe
if (!file_exists(__DIR__ . '/.env')) {
    echo "❌ ERREUR: Le fichier .env n'existe pas!\n";
    echo "   → Solution: Copiez .env.example vers .env\n";
    echo "   → Commande: cp .env.example .env\n\n";
    exit(1);
}

echo "✅ Fichier .env trouvé\n";

// Charger les variables d'environnement
$env = parse_ini_file(__DIR__ . '/.env');

// Vérifier APP_KEY
if (empty($env['APP_KEY'])) {
    echo "❌ ERREUR: APP_KEY n'est pas définie!\n";
    echo "   → Solution: Générez une clé d'application\n";
    echo "   → Commande: php artisan key:generate\n\n";
} else {
    echo "✅ APP_KEY configurée\n";
}

// Vérifier la configuration de la base de données
echo "\n📊 Configuration de la base de données:\n";
echo "   - Type: " . ($env['DB_CONNECTION'] ?? 'Non défini') . "\n";
echo "   - Hôte: " . ($env['DB_HOST'] ?? 'Non défini') . "\n";
echo "   - Port: " . ($env['DB_PORT'] ?? 'Non défini') . "\n";
echo "   - Base: " . ($env['DB_DATABASE'] ?? 'Non défini') . "\n";
echo "   - User: " . ($env['DB_USERNAME'] ?? 'Non défini') . "\n";

// Tester la connexion à la base de données
if ($env['DB_CONNECTION'] === 'mysql') {
    $host = $env['DB_HOST'] ?? '127.0.0.1';
    $port = $env['DB_PORT'] ?? '3306';
    $database = $env['DB_DATABASE'] ?? '';
    $username = $env['DB_USERNAME'] ?? 'root';
    $password = $env['DB_PASSWORD'] ?? '';

    try {
        $dsn = "mysql:host=$host;port=$port";
        $pdo = new PDO($dsn, $username, $password);
        echo "\n✅ Connexion au serveur MySQL réussie\n";

        // Vérifier si la base de données existe
        $stmt = $pdo->query("SHOW DATABASES LIKE '$database'");
        if ($stmt->rowCount() > 0) {
            echo "✅ La base de données '$database' existe\n";
        } else {
            echo "❌ ERREUR: La base de données '$database' n'existe pas!\n";
            echo "   → Solution: Créez la base de données\n";
            echo "   → Commande MySQL: CREATE DATABASE $database CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;\n";
            echo "   → Ou via CLI: mysql -u $username -p -e \"CREATE DATABASE $database;\"\n\n";
            exit(1);
        }
    } catch (PDOException $e) {
        echo "\n❌ ERREUR de connexion MySQL: " . $e->getMessage() . "\n";
        echo "   → Vérifiez que MySQL est démarré\n";
        echo "   → Vérifiez les identifiants dans le fichier .env\n\n";
        exit(1);
    }
}

// Vérifier les permissions des dossiers
echo "\n📁 Vérification des permissions:\n";
$directories = ['storage', 'bootstrap/cache'];
foreach ($directories as $dir) {
    $path = __DIR__ . '/' . $dir;
    if (is_writable($path)) {
        echo "✅ $dir est accessible en écriture\n";
    } else {
        echo "⚠️  ATTENTION: $dir n'est peut-être pas accessible en écriture\n";
        echo "   → Sur Linux/Mac: chmod -R 775 $dir\n";
    }
}

echo "\n✨ Vérification terminée!\n";
echo "\n📝 Prochaines étapes:\n";
echo "   1. php artisan migrate (pour créer les tables)\n";
echo "   2. npm install (pour installer les dépendances front-end)\n";
echo "   3. npm run build (pour compiler les assets)\n";
echo "   4. php artisan serve (pour lancer le serveur)\n\n";
