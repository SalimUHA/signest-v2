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
                        'title' => 'Test',
                        'image' => '../images/panneaux-leclerc.jpeg',
                        'description' => ' description test'
                    ],
                    [
                        'title' => 'Test',
                        'image' => '../images/signalisation-exterieur.jpeg',
                        'description' => ' description test'
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
                'description' => [['type' => 'paragraph', 'content' => 'Description à venir...']],
                'key_benefits' => [],
                'portfolio_examples' => [
                    [
                        'title' => 'Test',
                        'image' => '../images/abbatuci-flocage.jpeg',
                        'description' => ' description test'
                    ],
                    [
                        'title' => 'Test',
                        'image' => '../images/porsche-flocage.jpeg',
                        'description' => ' description test'
                    ],
                    [
                        'title' => 'Test',
                        'image' => '../images/fybat-flocage.jpeg',
                        'description' => ' description test'
                    ]
                ]
            ],
            [
                'slug' => 'vitrines',
                'title' => 'Vitrines',
                'image' => 'https://picsum.photos/id/211/1200/800',
                'description' => [['type' => 'paragraph', 'content' => 'Description à venir...']],
                'key_benefits' => [],
                'portfolio_examples' => []
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
                'title' => 'Marquage routier',
                'image' => 'https://picsum.photos/id/835/1200/800',
                'description' => [['type' => 'paragraph', 'content' => 'Description à venir...']],
                'key_benefits' => [],
                'portfolio_examples' => []
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
