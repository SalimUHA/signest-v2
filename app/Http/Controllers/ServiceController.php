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
                'image' => '../images/pexels-didsss-29218000.jpg',
                'description' => 'Chez Signest, nous réalisons une signalétique entièrement personnalisée pour chaque client.
                Qu’il s’agisse de bureaux, d\'usines, de commerces, d\'espaces publics ou de propriétés privées,
                nous concevons des supports visuels à la fois clairs,
                esthétiques et durables, parfaitement adaptés à leur environnement et à leur utilisation spécifique.
                En intérieur, nous créons des plaques de porte, des marquages au sol, des plans d’évacuation et des
                panneaux directionnels qui s’intègrent parfaitement à vos locaux.
                En extérieur, nous installons des enseignes, des totems, des panneaux de signalisation ou d\'information,
                visibles et durables.
                Nous réalisons également des signalétiques pour parking privé ou public, avec des panneaux de stationnement,
                de circulation,
                d’accès réservé ou d’interdiction.
                Pour les chantiers, nous fabriquons des panneaux réglementaires temporaires (port du casque, accès interdit,
                danger, etc.).
                En milieu urbain ou routier, nous proposons des solutions de balisage, de fléchage, de
                sécurisation et d’orientation conformes aux normes en vigueur.
                Dans l’industrie, nous assurons le marquage des zones de production, l’identification des machines,
                ainsi que la mise en place de panneaux de sécurité normalisés.
                Et pour les particuliers, nous proposons des plaques de maison, des panneaux décoratifs ou informatifs,
                et même de la signalétique personnalisée pour les événements.',

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
                        'image' => 'https://picsum.photos/id/22/800/600',
                        'description' => ' description test'
                    ],
                    [
                        'title' => 'Test',
                        'image' => 'https://picsum.photos/id/23/800/600',
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
                'image' => 'https://picsum.photos/id/1043/1200/800',
                'description' => 'Description à venir...',
                'key_benefits' => [],
                'portfolio_examples' => []
            ],
            [
                'slug' => 'vitrines',
                'title' => 'Vitrines',
                'image' => 'https://picsum.photos/id/211/1200/800',
                'description' => 'Description à venir...',
                'key_benefits' => [],
                'portfolio_examples' => []
            ],
            [
                'slug' => 'enseignes',
                'title' => 'Enseignes',
                'image' => 'https://picsum.photos/id/219/1200/800',
                'description' => 'Description à venir...',
                'key_benefits' => [],
                'portfolio_examples' => []
            ],
            [
                'slug' => 'accessibilite-pmr',
                'title' => 'Accessibilité PMR',
                'image' => 'https://picsum.photos/id/431/1200/800',
                'description' => 'Description à venir...',
                'key_benefits' => [],
                'portfolio_examples' => []
            ],
            [
                'slug' => 'marquage-routier',
                'title' => 'Marquage routier',
                'image' => 'https://picsum.photos/id/835/1200/800',
                'description' => 'Description à venir...',
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
