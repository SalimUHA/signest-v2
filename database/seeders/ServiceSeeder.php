<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('services')->truncate();

        $servicesData = $this->getServicesData();

        foreach ($servicesData as $data) {
            Service::create($data);
        }
    }

    // Source de vérité unique pour toutes les données
    private function getServicesData()
    {
        return [
            //======= 1. SIGNALÉTIQUE =======
            [
                'title' => 'Signalétique', 'slug' => 'signaletique', 'description' => 'Solutions de signalétique adaptées à tous environnements.', 'image' => 'images/panneaux-fond.webp', 'icon' => 'icons/signalisation.png', 'color' => 'lightyellow',
                'page_content' => [
                    'description' => [['type' => 'paragraph', 'content' => 'Chez Signest, nous réalisons une signalétique entièrement personnalisée pour chaque client. Qu’il s’agisse de bureaux, d\'usines, de commerces, d\'espaces publics ou de propriétés privées, nous concevons des supports visuels à la fois clairs, esthétiques et durables, parfaitement adaptés à leur environnement et à leur utilisation spécifique.'], ['type' => 'heading', 'content' => 'Nos Domaines d\'Intervention'], ['type' => 'list', 'items' => [['title' => 'Signalétique Intérieure', 'description' => 'Plaques de porte, plans d’évacuation, panneaux directionnels, marquages au sol.'], ['title' => 'Signalétique Extérieure', 'description' => 'Totems, panneaux directionnels, plaques d’entrée, poteaux de repérage en dibond ou PVC.'], ['title' => 'Parkings et Chantiers', 'description' => 'Signalétiques pour parkings et panneaux réglementaires temporaires pour chantiers.'], ['title' => 'Milieu Urbain et Industriel', 'description' => 'Solutions de balisage et de sécurisation conformes aux normes.'], ['title' => 'Particuliers', 'description' => 'Plaques de maison, panneaux décoratifs et signalétique pour événements.']]]],
                    'key_benefits' => ['Signalétique intérieure & extérieure', 'Adaptée aux entreprises et collectivités', 'Matériaux de qualité (dibond, PVC)', 'Respect des normes de sécurité'],
                    'portfolio_examples' => [['title' => 'E.Leclerc', 'image' => 'images/panneaux-leclerc.jpeg', 'description' => 'Panneau d\'information en vinyle.'], ['title' => 'Zone Industrielle Thann/Cernay', 'image' => 'images/signalisation-exterieur.jpeg', 'description' => 'Signalétique extérieure directionnelle.']]
                ]
            ],
            //======= 2. FLOCAGE VÉHICULES =======
            [
                'title' => 'Flocage de véhicules', 'slug' => 'flocage-vehicules', 'description' => 'Transformez vos véhicules en supports de communication.', 'image' => 'images/fond-fourgon.webp', 'icon' => 'icons/truck.png', 'color' => 'red',
                'page_content' => [
                    'description' => [['type' => 'paragraph', 'content' => 'Chez Signest, nous transformons vos véhicules en véritables supports de communication visuelle. Qu’il s’agisse d’un utilitaire, d’une flotte d’entreprise, ou même d’un véhicule personnel, nous vous accompagnons dans la création d’un flocage sur mesure, percutant et élégant.'], ['type' => 'heading', 'content' => 'Ce que nous proposons'], ['type' => 'list', 'items' => [['title' => 'Lettrage simple', 'description' => 'Pose de votre logo, slogan et coordonnées. Une solution discrète et efficace.'], ['title' => 'Habillage partiel (semi-covering)', 'description' => 'Ajout de visuels sur des zones stratégiques du véhicule (portières, capot, hayon…).'], ['title' => 'Total covering', 'description' => 'Recouvrement total de votre véhicule avec des matériaux de haute qualité.']]]],
                    'key_benefits' => ['Visibilité professionnelle mobile', 'Adapté à tous les véhicules', 'Accompagnement graphique sur mesure', 'Lettrage, semi ou total covering'],
                    'portfolio_examples' => [['title' => 'Auto-Ecole Abbatucci', 'image' => 'images/abbatuci-flocage.jpeg', 'description' => 'Marquage Audi A1.'], ['title' => 'Garage Zagula', 'image' => 'images/porsche-flocage.jpeg', 'description' => 'Covering Porsche GT3.'], ['title' => 'Mondial Piscine', 'image' => 'images/3.jpg', 'description' => 'Marquage Renault Master.']]
                ]
            ],
            //======= 3. VITRINES =======
            [
                'title' => 'Vitrines', 'slug' => 'vitrines', 'description' => 'Valorisez votre commerce avec des vitrines personnalisées.', 'image' => 'images/vitrines-fond.webp', 'icon' => 'icons/vitrines.png', 'color' => 'blue',
                'page_content' => [
                    'description' => [['type' => 'paragraph', 'content' => 'Chez Signest, nous donnons vie à vos vitrines qui reflètent votre image. Que ce soit pour une boutique, un salon, un restaurant ou un local professionnel, nous transformons vos surfaces vitrées en outils de communication visuelle efficaces.'], ['type' => 'heading', 'content' => 'Nos solutions pour vitrines'], ['type' => 'list', 'items' => [['title' => 'Film solaire anti-UV', 'description' => 'Filtre les rayons UV, réduit la chaleur et garde la luminosité.'], ['title' => 'Vitrine adhésive microperforée', 'description' => 'Affichez vos visuels tout en conservant la visibilité vers l\'extérieur.'], ['title' => 'Vinyle adhésif polymère durable', 'description' => 'Robuste et durable, il résiste efficacement aux contraintes extérieures et aux intempéries.']]]],
                    'key_benefits' => ['Haute visibilité jour et nuit', 'Protection UV & chaleur', 'Résistance extérieure longue durée', '100% personnalisable'],
                    'portfolio_examples' => [['title' => 'La Cafetière', 'image' => 'images/vitrines-lacafetiere.jpg', 'description' => 'Vitrines avec lettre collée.'], ['title' => 'Selectour', 'image' => 'images/vitrine-microperf.png', 'description' => 'Vitrines en vinyle microperforé.'], ['title' => 'EBY Services', 'image' => 'images/5.jpg', 'description' => 'Vitrines avec adhésif dépoli.']]
                ]
            ],
            //======= 4. ENSEIGNES =======
            [
                'title' => 'Enseignes de Façade', 'slug' => 'enseignes', 'description' => 'Sublimez vos façades commerciales.', 'image' => 'images/fond-cafe.webp', 'icon' => 'icons/shop.png', 'color' => 'yellow',
                'page_content' => [
                    'description' => [['type' => 'paragraph', 'content' => 'L\'enseigne est la première impression que vous donnez. C\'est un élément essentiel de votre identité visuelle qui doit attirer l\'œil et informer les passants. Nous concevons, fabriquons et posons des enseignes de façade sur mesure.'], ['type' => 'heading', 'content' => 'Nos Types d\'Enseignes'], ['type' => 'list', 'items' => [['title' => 'Enseignes Lumineuses (LED)', 'description' => 'Visibilité optimale de jour comme de nuit, en éclairage direct ou rétro-éclairage.'], ['title' => 'Panneaux d\'Enseigne', 'description' => 'Solution classique et polyvalente, généralement en Dibond.'], ['title' => 'Enseignes Drapeau', 'description' => 'Perpendiculaires à la façade, pour capter le regard des piétons.']]]],
                    'key_benefits' => ['Visibilité maximale', 'Conception 100% sur mesure', 'Solutions lumineuses (LED)', 'Matériaux durables et résistants'],
                    'portfolio_examples' => [['title' => 'Boulangerie Parlons Pains', 'image' => 'images/2.jpg', 'description' => 'Enseigne bandeau complète.'], ['title' => 'Brasserie La Bicephale', 'image' => 'images/la-bicephale.jpeg', 'description' => 'Pose de lettres découpées.'], ['title' => 'Institut Mel', 'image' => 'images/institutmel.jpeg', 'description' => 'Panneau d\'enseigne en Dibond.']]
                ]
            ],
            //======= 5. COVER STYL =======
            [
                'title' => 'Rénovation Adhésive', 'slug' => 'coverstyl', 'description' => 'Application de vinyles sur toutes surfaces.', 'image' => 'images/fond-bois.webp', 'icon' => 'icons/coverstyl.png', 'color' => 'darkblue',
                'page_content' => [
                    'description' => [['type' => 'paragraph', 'content' => 'Donnez une seconde vie à vos intérieurs sans les contraintes des gros travaux. Nous sommes spécialisés dans la pose de revêtements adhésifs Cover Styl\', une solution innovante pour moderniser votre mobilier, vos portes ou vos comptoirs.'], ['type' => 'heading', 'content' => 'Nos applications'], ['type' => 'list', 'items' => [['title' => 'Mobilier et Agencement', 'description' => 'Modernisez bureaux, comptoirs, étagères, et placards.'], ['title' => 'Portes et Huisseries', 'description' => 'Ne remplacez plus vos portes ! Nous les habillons avec la finition de votre choix.'], ['title' => 'Cuisines et Salles de bain', 'description' => 'Recouvrez les façades de vos placards. Nos films sont résistants à l\'humidité.']]]],
                    'key_benefits' => ['Rénovation rapide et sans poussière', 'Alternative économique au remplacement', 'Résistant à l\'eau et aux rayures', 'Pose experte pour un rendu parfait'],
                    'portfolio_examples' => [['title' => 'Rénovation d\'un îlot de cuisine', 'image' => 'images/coverstyl-particulier.jpeg', 'description' => 'Habillage des façades et du plan de travail.'], ['title' => 'Rénovation d\'une table', 'image' => 'images/table-coverstyle.jpeg', 'description' => 'Habillage d\'une table à manger.']]
                ]
            ],
            //======= 6. MARQUAGE ROUTIER =======
            [
                'title' => 'Marquage au sol', 'slug' => 'marquage-routier', 'description' => 'Organisez vos parkings et voies de circulation.', 'image' => 'images/fond-parking.webp', 'icon' => 'icons/route.png', 'color' => 'green',
                'page_content' => [
                    'description' => [['type' => 'paragraph', 'content' => 'Que vous soyez une entreprise, une collectivité ou un commerce, nous vous accompagnons avec sérieux, de l’identification des besoins à la mise en peinture sur site, en extérieur ou en parking souterrain.'], ['type' => 'heading', 'content' => 'Nos domaines d\'intervention'], ['type' => 'list', 'items' => [['title' => 'Parkings privés ou publics', 'description' => 'Traçage des emplacements, marquages PMR, zones interdites, flèches directionnelles.'], ['title' => 'Cours et voiries privées', 'description' => 'Bandes d’arrêt, pictogrammes au sol, et lignes de guidage.'], ['title' => 'Accès professionnels', 'description' => 'Entrées réservées, passages piétons, zones de livraison.']]]],
                    'key_benefits' => ['Marquages conformes aux normes', 'Intervention rapide sur site', 'Adapté à l’extérieur & parking souterrain', 'Reprise sur marquage usé'],
                    'portfolio_examples' => [['title' => 'Capi sécurité', 'image' => 'images/marquage-pmr.jpeg', 'description' => 'Marquage au sol PMR.'], ['title' => 'GK l\'artisan menuisier', 'image' => 'images/marquage-pieton.jpeg', 'description' => 'Marquage au sol piéton.'], ['title' => 'Sunny Uffikon', 'image' => 'images/marquage-parking.jpeg', 'description' => 'Marquage au sol en résine.']]
                ]
            ],
        ];
    }
}
