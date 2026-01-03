<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prestation;

class PrestationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prestations = [
            [
                'titre' => 'Développement de sites web',
                'description' => 'Création de sites web modernes, responsive et optimisés pour le référencement. Nous développons des sites vitrines, e-commerce et applications web sur mesure.',
                'fonctionnalites' => json_encode([
                    'Design responsive',
                    'Optimisation SEO',
                    'Panel d\'administration',
                    'Système de paiement en ligne',
                    'Multilingue',
                    'Blog intégré'
                ]),
                'tarif_base' => 2500.00,
                'icone' => 'web',
            ],
            [
                'titre' => 'Développement d\'applications mobiles',
                'description' => 'Développement d\'applications mobiles natives et hybrides pour iOS et Android. Solutions performantes et ergonomiques adaptées à vos besoins.',
                'fonctionnalites' => json_encode([
                    'Application iOS',
                    'Application Android',
                    'Design personnalisé',
                    'Notifications push',
                    'Géolocalisation',
                    'Paiement intégré'
                ]),
                'tarif_base' => 5000.00,
                'icone' => 'mobile',
            ],
            [
                'titre' => 'Développement d\'applications desktop',
                'description' => 'Création d\'applications de bureau performantes pour Windows, macOS et Linux. Solutions professionnelles adaptées à vos processus métier.',
                'fonctionnalites' => json_encode([
                    'Multi-plateforme',
                    'Interface intuitive',
                    'Base de données locale',
                    'Synchronisation cloud',
                    'Rapports et exports',
                    'Gestion des droits'
                ]),
                'tarif_base' => 4000.00,
                'icone' => 'desktop',
            ],
            [
                'titre' => 'Développement d\'API REST',
                'description' => 'Conception et développement d\'API REST sécurisées et performantes. Documentation complète et support technique inclus.',
                'fonctionnalites' => json_encode([
                    'Architecture REST',
                    'Authentification sécurisée',
                    'Documentation interactive',
                    'Versionning',
                    'Rate limiting',
                    'Monitoring'
                ]),
                'tarif_base' => 3000.00,
                'icone' => 'api',
            ],
        ];

        foreach ($prestations as $prestation) {
            Prestation::create($prestation);
        }
    }
}
