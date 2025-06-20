<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ServiceController extends Controller
{

    private function getServicesData()
    {
        return [
            [
                'slug' => 'signaletique',
                'title' => 'Signalétique',
                'image' => '../images/panneaux-fond.webp',
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
                        'image' => '../images/panneaux-leclerc.jpeg',
                        'description' => 'Conception d\'un panneau d\'information avec du vinyle et de l\'impression'
                    ],
                    [
                        'title' => 'Communauté Thann/Cernay',
                        'image' => '../images/signalisation-exterieur.jpeg',
                        'description' => 'Conception de la signéalétique extérieur de la zone industrielle de Thann/Cernay en mettant
                        en place plusieurs panneaux directionnel.'
                    ],
                    [
                        'title' => 'Test',
                        'image' => 'https://picsum.photos/id/25/800/600',
                        'description' => ' description test'
                    ]
                ]
            ],
            [
                'slug' => 'flocage-vehicules',
                'title' => 'Flocage de véhicules',
                'image' => '../images/fond-fourgon.webp',
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
                        'image' => '../images/abbatuci-flocage.jpeg',
                        'description' => ' Marquage d\'un véhicule type Audi A1 avec le logo et les cordonnées de l\'entreprise (
                        mail, numéro de téléphone ).'
                    ],
                    [
                        'title' => 'Garage Zagula',
                        'image' => '../images/porsche-flocage.jpeg',
                        'description' => 'Covering semi-intégral d\'une Porsche GT3 pour une course.'
                    ],
                    [
                        'title' => 'Mondial Piscine',
                        'image' => '../images/3.jpg',
                        'description' => 'Marquage traditionnel d\'un véhicule de type Renault Master avec le logo, site internet et
                        coordonnées mobiles


'
                    ]
                ],
                ],

            [
                'slug' => 'vitrines',
                'title' => 'Vitrines',
                'image' => '../images/vitrines-fond.webp',
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
                        'image' => '../images/vitrines-lacafetiere.jpg',
                        'description' => ' Vitrines contenant de la lettre collée'
                    ],
                    [
                        'title' => 'Agence de voyage Selectour',
                        'image' => '../images/vitrine-microperf.png',
                        'description' => ' Vitrines contenant du vinyle microperforée.'
                    ],
                    [
                        'title' => 'EBY Services Serrure & clef',
                        'image' => '../images/5.jpg',
                        'description' => 'Vitrines contenant de l\'adhésif dépoli qui permettent de pacifier partiellement l\'intérieur
                        couplés à de la lettre collée.'
                    ]
                ],
            ],
            [
                'slug' => 'enseignes',
                'title' => 'Enseignes',
                'image' => 'https://picsum.photos/id/219/1200/800',
                'description' => [['type' => 'paragraph', 'content' => 'Description à venir...']],
                'key_benefits' => [],
                'portfolio_examples' => []
            ],
            [
                'slug' => 'accessibilite-pmr',
                'title' => 'Accessibilité PMR',
                'image' => 'https://picsum.photos/id/431/1200/800',
                'description' => [['type' => 'paragraph', 'content' => 'Description à venir...']],
                'key_benefits' => [],
                'portfolio_examples' => []
            ],
            [
                'slug' => 'marquage-routier',
                'title' => 'Marquage au sol',
                'image' => '../images/fond-parking.webp',
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
                        'image' => '../images/marquage-pmr.jpeg',
                        'description' => 'Conception du marquage au sol PMR.'
                    ],
                    [
                        'title' => 'GK l\'artisan menuisier',
                        'image' => '../images/marquage-pieton.jpeg',
                        'description' => 'Marquage au sol avec un pictogramme piéton.'
                    ],
                    [
                        'title' => 'Sunny Uffikon',
                        'image' => '../images/marquage-parking.jpeg',
                        'description' => 'Marquage au sol (résine) pour un parking souterrain.'
                    ]
                ],
            ],
        ];
    }

    public function show($slug)
    {
        $services = $this->getServicesData();
        $service = Arr::first($services, fn ($value) => $value['slug'] === $slug);

        if (!$service) {
            abort(404);
        }

        return view('service', [
            'service' => $service
        ]);
    }
}
