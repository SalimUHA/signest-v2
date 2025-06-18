<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function index()
    {
        $carouselItems = [
            [
                'slug' => 'signaletique',
                'color' => 'lightyellow',
                'image' => '../images/panneaux-fond.webp',
                'icon' => '/icons/signalisation.png',
                'title' => 'Signalétique',
                'description' => 'Nous concevons et installons des solutions de signalétique adaptées à tous types d’environnements.',
            ],
            [
                'slug' => 'flocage-vehicules',
                'color' => 'red',
                'image' => '../images/fond-fourgon.webp',
                'icon' => '/icons/truck.png',
                'title' => 'Flocage véhicules',
                'description' => 'Transformez vos véhicules en supports de communication efficaces.',
            ],
            [
                'slug' => 'vitrines',
                'color' => 'blue',
                'image' => '../images/vitrines-fond.webp',
                'icon' => '/icons/vitrines.png',
                'title' => 'Vitrines',
                'description' => 'Valorisez votre commerce avec des vitrines personnalisées et visibles.',
            ],
            [
                'slug' => 'enseignes',
                'color' => 'yellow',
                'image' => '../images/fond-cafe.webp',
                'icon' => '/icons/shop.png',
                'title' => 'Enseignes',
                'description' => 'Création et pose d’enseignes pour sublimer vos façades commerciales.',
            ],
            [
                'slug' => 'accessibilite-pmr',
                'color' => 'darkblue',
                'image' => '../images/fond-pmr.webp',
                'icon' => '/icons/PMR.png',
                'title' => 'Accessibilité PMR',
                'description' => 'Signalétique conforme et claire pour personnes à mobilité réduite.',
            ],
            [
                'slug' => 'marquage-routier',
                'color' => 'green',
                'image' => '../images/fond-parking.webp',
                'icon' => '/icons/route.png',
                'title' => 'Marquage routier',
                'description' => 'Marquage au sol pour organiser vos parkings et voies de circulation.',
            ],
        ];
        return view('accueil', [
            'carouselItems' => $carouselItems
        ]);
    }
}
