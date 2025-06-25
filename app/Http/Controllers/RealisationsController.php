<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class RealisationsController extends Controller
{

    public function index()
    {
        $expertises = $this->getExpertiseData();


        $services = $this->getServicesData();
        $serviceProjects = [];
        foreach ($services as $service) {
            if (!empty($service['portfolio_examples'])) {
                foreach ($service['portfolio_examples'] as $project) {
                    $project['category'] = $service['title'];
                    $serviceProjects[] = $project;
                }
            }
        }


        $galleryOnlyProjects = $this->getGalleryOnlyProjects();

        $allProjects = array_merge($serviceProjects, $galleryOnlyProjects);


        $perPage = 9;
        $currentPage = Paginator::resolveCurrentPage('page');
        $collection = new Collection($allProjects);
        $currentPageProjects = $collection->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $projetsPaginator = new LengthAwarePaginator($currentPageProjects, count($collection), $perPage, $currentPage, [
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => 'page',
        ]);
        $projetsPaginator->fragment('galerie');

        return view('realisations', [
            'expertises' => $expertises,
            'projets' => $projetsPaginator
        ]);
    }

    private function getGalleryOnlyProjects()
    {
        return [
            ['title' => 'Distribus', 'image' => 'images/1.jpg', 'category' => 'Panneau'],
            ['title' => 'Déchèterie', 'image' => 'images/4.jpg', 'category' => 'Panneau'],
            ['title' => 'Entrepotes', 'image' => 'images/enseigne-entrepote.jpg', 'category' => 'Vitrines'],
            ['title' => 'Fybat', 'image' => 'images/fybat-flocage.jpeg', 'category' => 'Vehicules'],
            ['title' => 'SCATP', 'image' => 'images/scatp-flocage.jpeg', 'category' => 'Vehicule'],
            ['title' => 'Bricolage E.Leclerc', 'image' => 'images/panneau-brico.jpeg', 'category' => 'Panneau'],
            ['title' => 'Panneau', 'image' => 'images/panneau-videosurveillance.jpg', 'category' => 'Panneau'],
        ];
    }

    private function getExpertiseData()
    {
        return [
            [
                'slug' => 'habillage-sur-mesure',
                'title' => 'Habillage sur Mesure : Stands & Machines',
                'icon' => 'fa-solid fa-box-open',
                'description' => 'Au-delà du covering de véhicule, notre savoir-faire s\'étend à l\'habillage sur mesure de tout type de support : stand d\'exposition, machine de distribution, mobilier...',
                'example_images' => ['images/machine-sport.jpg']
            ],
            [
                'slug' => 'marquage-publicitaire',
                'title' => 'Marquage Publicitaire sur Véhicules',
                'icon' => 'fa-solid fa-bus',
                'description' => 'Nous réalisons des campagnes publicitaires à fort impact, notamment sur les arrières de bus ("cul de bus"), une surface de choix pour toucher un large public dans l\'environnement urbain.',
                'example_images' => ['images/dos-bus.jpeg']
            ],
            [
                'slug' => 'projets-transfrontaliers',
                'title' => 'Collaboration Transfrontalière',
                'icon' => 'fa-solid fa-earth-europe',
                'description' => 'Notre position géographique nous permet de collaborer sur des projets d\'envergure. Nous avons par exemple mené à bien la signalétique du sentier des poètes \'Dreyland Dichterweg\', un projet unique unissant la France, la Suisse et l\'Allemagne.',
                'example_images' => ['images/panneaux-rhin.jpeg', 'images/trois-pays.jpeg']
            ],
            [
                'slug' => 'habillage-vitrages',
                'title' => 'Habillage & Traitement de Vitrages',
                'icon' => 'fa-solid fa-layer-group',
                'description' => 'Nous transformons vos surfaces vitrées pour répondre à vos besoins de sécurité (bandes de vigilance ERP), confidentialité (films dépolis), décoration ou protection solaire.',
                'example_images' => ['images/bande-vigilance.jpeg']
            ]
        ];
    }

    public function getServicesData()
    {
        return [
            [
                'slug' => 'signaletique',
                'title' => 'Signalétique',
                'image' => 'images/panneaux-fond.webp',
                'description' => [
                    [
                        'type' => 'paragraph',
                        'content' => 'Chez Signest, nous réalisons une signalétique entièrement personnalisée pour chaque client.
                        Qu’il s’agisse de bureaux, d\'usines, de commerces, d\'espaces publics ou de propriétés privées, nous
                        concevons des supports visuels à la fois clairs, esthétiques et durables, parfaitement adaptés à leur
                        environnement et à leur utilisation spécifique.'
                    ],
                    [
                        'type' => 'heading',
                        'content' => 'Nos Domaines d\'Intervention'
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            ['title' => 'Signalétique Intérieure', 'description' =>
                                'Nous concevons une large gamme de signalétiques intérieures sur mesure : plaques de porte,
                                plans d’évacuation conformes aux normes, panneaux directionnels, marquages au sol,
                                signalétique adhésive, et bien d’autres supports personnalisables. Chaque élément est pensé pour
                                s’intégrer harmonieusement à vos locaux.'],

                            ['title' => 'Signalétique Extérieure', 'description' =>
                                'Nous réalisons une signalétique extérieure sur mesure : totems, panneaux directionnels,
                                 plaques d’entrée, poteaux de repérage ou encore signalétique réglementaire. Installés sur les façades,
                                  en bord de route ou dans les parkings, nos supports sont fabriqués à partir de matériaux tel que
                                   le dibond ou le PVC.'],

                            ['title' => 'Parkings et Chantiers', 'description' => 'Nous fournissons des signalétiques pour parkings
                            (publics ou privés) et des panneaux réglementaires temporaires pour les chantiers
                            (port du casque, accès interdit, etc.).'],

                            ['title' => 'Milieu Urbain et Industriel', 'description' => 'Nous proposons des solutions de balisage et
                            de sécurisation conformes aux normes, ainsi que le marquage des zones de production et l’identification
                            des machines.'],

                            ['title' => 'Particuliers', 'description' => 'Nous réalisons également des plaques de maison, des
                            panneaux décoratifs et de la signalétique personnalisée pour tous vos événements.']
                        ]
                    ]
                ],
                'key_benefits' => [
                    ' Signalétique intérieure, extérieure, urbaine, industrielle et privée',
                    'Adaptée aux entreprises, collectivités et particuliers',
                    'Matériaux de qualité : dibond, PVC, vinyles professionnels',
                    'Large choix de finitions : brillante, mate, anti-UV',
                    'Respect des normes de sécurité, d’accessibilité et de lisibilité'
                ],
                'portfolio_examples' => [
                    [
                        'title' => 'E.Leclerc',
                        'image' => 'images/panneaux-leclerc.jpeg',
                        'description' => 'Conception d\'un panneau d\'information avec du vinyle et de l\'impression.'
                    ],
                    [
                        'title' => 'Communauté Thann/Cernay',
                        'image' => 'images/signalisation-exterieur.jpeg',
                        'description' => 'Conception de la signéalétique extérieur de la zone industrielle de Thann/Cernay en mettant en place plusieurs panneaux directionnels.'
                    ],

                ]
            ],
            [
                'slug' => 'flocage-vehicules',
                'title' => 'Flocage de véhicules',
                'image' => 'images/fond-fourgon.webp',
                'description' => [
                    ['type' => 'paragraph', 'content' =>
                        'Chez Signest, nous transformons vos véhicules en véritables supports de communication visuelle. Qu’il s’agisse
                         d’un utilitaire, d’une flotte d’entreprise, ou même d’un véhicule personnel, nous vous accompagnons dans la
                         création d’un flocage sur mesure, à la fois percutant, élégant et durable.
                        Chaque projet est pensé pour refléter votre identité visuelle tout en tenant compte des contraintes techniques du véhicule et de vos
                        objectifs de visibilité.Vous avez déjà un design ? Parfait, nous l\'adaptons pour une pose optimale. Vous partez de zéro ?
                        Notre équipe graphique vous accompagne pour créer un visuel à votre image.'],
                    ['type' => 'heading', 'content' => 'Ce que nous proposons'],
                    [
                        'type' => 'list',
                        'items' => [
                            ['title' => 'Lettrage simple', 'description' =>
                                'Pose de votre logo, slogan et coordonnées sous forme de lettrage découpé.
                                Une solution discrète, efficace et accessible pour les professionnels qui veulent se faire remarquer
                                sans surcharger.'],

                            ['title' => 'Habillage partiel (semi-covering)', 'description' =>
                                'Ajout de visuels sur des zones stratégiques du véhicule (portières, capot, hayon…).'],

                            ['title' => 'Total covering', 'description' => 'Nous proposons aussi un service de covering total qui
                            permet de recouvrir toute les zones de votre vehicule. Nous mettons un point d\'honneur à utiliser des matériaux de haute
                            qualité et à travailler avec précision afin d\'assurer un résultat impeccable. Que vous souhaitiez opter pour une couleur audacieuse ou un design unique,
                            notre équipe est là pour vous accompagner dans votre projet et réaliser vos idées avec soin et professionnalisme.'],

                        ]
                    ]],


                'key_benefits' => ['Visibilité professionnelle : véhicule transformé en support de communication mobile.',
                    'Adapté à tous les profils : utilitaire, flotte, véhicule personnel.',
                    'Projet sur mesure : design personnalisé selon votre image et vos objectifs.',
                    'Accompagnement complet : vous venez avec un visuel ou on le crée pour vous.',
                    'Solutions flexibles : lettrage simple, habillage partiel ou total covering.'],
                'portfolio_examples' => [
                    [
                        'title' => 'Auto-Ecole Abbatucci',
                        'image' => 'images/abbatuci-flocage.jpeg',
                        'description' => 'Marquage d\'un véhicule type Audi A1 avec le logo et les cordonnées de l\'entreprise (mail, numéro de téléphone).'
                    ],
                    [
                        'title' => 'Garage Zagula',
                        'image' => 'images/porsche-flocage.jpeg',
                        'description' => 'Covering semi-intégral d\'une Porsche GT3 pour une course.'
                    ],
                    [
                        'title' => 'Mondial Piscine',
                        'image' => 'images/3.jpg',
                        'description' => 'Marquage traditionnel d\'un véhicule de type Renault Master avec le logo, site internet et coordonnées mobiles.'
                    ]
                ],
            ],

            [
                'slug' => 'vitrines',
                'title' => 'Vitrines',
                'image' => 'images/vitrines-fond.webp',
                'description' => [
                    ['type' => 'paragraph', 'content' =>
                        'Chez Signest, nous donnons vie à vos vitrines qui reflètent votre image.
                        Que ce soit pour une boutique, un salon, un restaurant ou un local professionnel, nous transformons vos surfaces vitrées en outils de communication visuelle efficaces.
                        Qu’il s’agisse d’un marquage discret ou d’un visuel grand format, nous adaptons chaque création à votre
                        façade, à vos objectifs et à votre univers graphique.
                        Vous avez déjà une maquette ? On s’occupe de l’impression et de la pose. Pas d’idée précise ?
                        On vous accompagne de la création au résultat final.'],
                    [
                        'type' => 'heading',
                        'content' => 'Ce que nous proposons'
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            ['title' => 'Film solaire anti-UV', 'description' =>
                                ' Le film solaire est une solution pratique et esthétique, permettant de filtrer efficacement les
                                rayons UV afin
                                de réduire la chaleur dans vos locaux tout en gardant la  luminosité à l\'intérieur.'],

                            ['title' => 'Vitrine adhésive microperforée', 'description' =>
                                'Les vitrines microperforées permettent d\'afficher vos visuels tout en conservant la luminosité intérieure
                                 et la visibilité vers l\'extérieur. Vos messages restent parfaitement
                                visibles depuis l\'extérieur sans gêner votre confort intérieur.'],

                            ['title' => 'Vinyle adhésif polymère durable', 'description' => 'Le vinyle polymère que nous utilisons pour l’habillage de vos vitrines
                            est reconnu pour sa robustesse et sa longue durée de vie. Spécialement conçu pour résister efficacement aux contraintes
                            extérieures, ce vinyle supporte sans difficulté les variations climatiques importantes, les intempéries et l’exposition prolongée
                            à l’eau.'],

                        ]
                    ]],
                'key_benefits' => ['Haute visibilité jour et nuit.',' Protection UV & chaleur','Résistance extérieure longue durée',
                    '100% personnalisable','Mise en place par nos soins'],
                'portfolio_examples' => [
                    [
                        'title' => 'La Cafetière',
                        'image' => 'images/vitrines-lacafetiere.jpg',
                        'description' => 'Vitrines contenant de la lettre collée.'
                    ],
                    [
                        'title' => 'Agence de voyage Selectour',
                        'image' => 'images/vitrine-microperf.png',
                        'description' => 'Vitrines contenant du vinyle microperforée.'
                    ],
                    [
                        'title' => 'EBY Services Serrure & clef',
                        'image' => 'images/5.jpg',
                        'description' => 'Vitrines contenant de l\'adhésif dépoli qui permettent de pacifier partiellement l\'intérieur couplés à de la lettre collée.'
                    ]
                ],
            ],
            [
                'slug' => 'enseignes',
                'title' => 'Enseignes de Façade',
                'image' => 'images/fond-cafe.webp',
                'description' => [
                    [
                        'type' => 'paragraph',
                        'content' => 'L\'enseigne est la première impression que vous donnez. C\'est un élément essentiel de votre identité visuelle qui doit attirer l\'œil et informer les passants. Chez Signest, nous concevons, fabriquons et posons des enseignes de façade sur mesure, pensées pour valoriser votre image et garantir votre visibilité. Chaque projet est unique et adapté à votre charte graphique, à l\'architecture de votre bâtiment et à votre budget.'
                    ],
                    [
                        'type' => 'heading',
                        'content' => 'Nos Types d\'Enseignes de Façade'
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            ['title' => 'Enseignes Lumineuses (LED)', 'description' => 'Pour une visibilité optimale de jour comme de nuit. Nous proposons des lettres boîtiers à éclairage direct (par l\'avant) ou en rétro-éclairage (halo lumineux à l\'arrière) pour un effet plus élégant et subtil.'],
                            ['title' => 'Panneaux d\'Enseigne', 'description' => 'Une solution classique, polyvalente et économique. Le panneau, généralement en Dibond, est imprimé avec votre logo et vos informations. Il peut être plat ou plié pour former un caisson, s\'adaptant à de nombreuses configurations.'],
                            ['title' => 'Enseignes Drapeau', 'description' => 'Perpendiculaires à la façade, elles captent le regard des piétons dans les rues commerçantes. Lumineuses ou non, elles sont un excellent complément à votre enseigne principale pour une visibilité accrue.']
                        ]
                    ]
                ],
                'key_benefits' => [
                    'Visibilité maximale pour votre commerce ou entreprise',
                    'Conception 100% sur mesure : formes, couleurs et matériaux',
                    'Solutions lumineuses (LED) pour être vu de jour comme de nuit',
                    'Matériaux durables et résistants aux intempéries',
                    'Pose sécurisée sur tous types de façades par notre équipe'
                ],
                'portfolio_examples' => [
                    [
                        'title' => 'Boulangerie Parlons Pains',
                        'image' => 'images/2.jpg',
                        'description' => 'Création d\'une enseigne bandeau complète avec habillage de façade, lettrage et logos.'
                    ],
                    [
                        'title' => 'Brasserie La Bicephale',
                        'image' => 'images/la-bicephale.jpeg',
                        'description' => 'Pose de lettres découpées et d\'un logo directement sur la façade du bâtiment.'
                    ],
                    [
                        'title' => 'Institut Mel - Soins & Beauté',
                        'image' => 'images/institutmel.jpeg',
                        'description' => 'Fabrication et pose d\'un panneau d\'enseigne type bandeau en Dibond avec impression numérique.'
                    ]
                ]
            ],
            [
                'slug' => 'coverstyl',
                'title' => 'Rénovation Adhésive (Cover Styl )',
                'image' => 'images/fond-bois.webp',
                'description' => [
                    [
                        'type' => 'paragraph',
                        'content' => 'Donnez une seconde vie à vos intérieurs sans les contraintes des gros travaux. Chez Signest, nous sommes spécialisés dans la pose de revêtements adhésifs Cover Styl\', une solution innovante pour moderniser votre mobilier, vos portes ou vos comptoirs. Offrez-vous une rénovation rapide, économique et au rendu impeccable, avec un large choix de finitions réalistes (bois, marbre, métal, cuir, etc.).'
                    ],
                    [
                        'type' => 'heading',
                        'content' => 'Nos applications pour la rénovation adhésive'
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            ['title' => 'Mobilier et Agencement', 'description' => 'Modernisez vos bureaux, comptoirs d\'accueil, étagères, et placards. C\'est la solution idéale pour les hôtels, restaurants et boutiques souhaitant renouveler leur look à moindre coût.'],
                            ['title' => 'Portes et Huisseries', 'description' => 'Ne remplacez plus vos portes ! Nous les habillons avec la finition de votre choix pour une intégration parfaite dans votre nouvelle décoration intérieure.'],
                            ['title' => 'Cuisines et Salles de bain', 'description' => 'Recouvrez les façades de vos placards de cuisine ou les meubles de salle de bain. Nos films sont résistants à l\'humidité et faciles à nettoyer, garantissant un résultat esthétique et durable.']
                        ]
                    ]
                ],
                'key_benefits' => [
                    'Rénovation rapide et sans poussière',
                    'Alternative économique au remplacement de mobilier',
                    'Résistant à l\'eau, aux rayures et facile d\'entretien',
                    'Pose experte pour un rendu parfait, sans bulle ni raccord visible'
                ],
                'portfolio_examples' => [
                    [
                        'title' => 'Rénovation d\'un îlot de cuisine',
                        'image' => 'images/coverstyl-particulier.jpeg',
                        'description' => 'Habillage des façades et du plan de travail d\'un îlot de cuisine avec un revêtement adhésif effet bois naturel.'
                    ],

                    ['title' => 'Rénovation d\'une table',
                    'image' => 'images/table-coverstyle.jpeg',
                        'description' => 'Habillage d\'une table à salle à manger effet bois.']
                ],
            ],
            [
                'slug' => 'marquage-routier',
                'title' => 'Marquage au sol',
                'image' => 'images/fond-parking.webp',
                'description' => [
                    ['type' => 'paragraph', 'content' =>
                        'Chez Signest, que vous soyez une entreprise, une copropriété, une collectivité ou un commerce,
                        nous vous accompagnons avec sérieux, de l’identification des besoins à la mise en peinture sur site.
                         Nous réalisons vos marquages au sol avec rigueur et précision, exclusivement en extérieur
                        ou en parking souterrain. Chaque projet est adapté aux contraintes du site, aux réglementations en vigueur
                        et à vos préférences esthétiques. Nous intervenons aussi bien sur des chantiers neufs que dans le cadre de
                        rénovations ou de rafraîchissement de traçages existants.'],
                    [
                        'type' => 'heading',
                        'content' => 'Nos domaines d\'intervention'
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            ['title' => 'Parkings privés ou publics ', 'description' =>
                                ' Traçage net des emplacements, marquages PMR normés, délimitations claires des zones interdites,
                                flèches directionnelles alignées à la configuration du site.'],

                            ['title' => 'Parkings souterrains ', 'description' =>
                                'Tracés haute visibilité, marquage des accès véhicules et piétons, flèches, numérotation et rappels de
                                consignes visuelles.'],

                            ['title' => 'Cours et voiries privées ', 'description' => 'Bandes d’arrêt, pictogrammes au sol,
                             lignes de guidage, marquages personnalisés sur enrobé ou béton.'],

                            ['title' => 'Accès professionnels ou commerciaux ', 'description' => 'Entrées réservées,
                            passages piétons marqués, zones de livraison et d’attente, logos ou lettrages spécifiques à l’entreprise.'],

                        ]
                    ]],
                'key_benefits' => ['Marquages conformes aux normes','Intervention rapide sur site','Adapté à l’extérieur & parking souterrain',
                    'Possibilité de reprise sur marquage effacé ou usé'],
                'portfolio_examples' => [
                    [
                        'title' => 'Capi sécurité',
                        'image' => 'images/marquage-pmr.jpeg',
                        'description' => 'Conception du marquage au sol PMR.'
                    ],
                    [
                        'title' => 'GK l\'artisan menuisier',
                        'image' => 'images/marquage-pieton.jpeg',
                        'description' => 'Marquage au sol avec un pictogramme piéton.'
                    ],
                    [
                        'title' => 'Sunny Uffikon',
                        'image' => 'images/marquage-parking.jpeg',
                        'description' => 'Marquage au sol (résine) pour un parking souterrain.'
                    ]
                ],
            ],
        ];
    }
}
