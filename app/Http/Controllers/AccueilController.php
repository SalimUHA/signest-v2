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
                'image' => '../images/pexels-didsss-29218000.jpg',
                'icon' => '/icons/signalisation.png',
                'title' => 'Signalétique',
                'description' => 'Nous concevons et installons des solutions de signalétique adaptées à tous types d’environnements.',
            ],
            [
                'slug' => 'flocage-vehicules',
                'color' => 'red',
                'image' => '../images/3.jpg',
                'icon' => '/icons/truck.png',
                'title' => 'Flocage véhicules',
                'description' => 'Transformez vos véhicules en supports de communication efficaces.',
            ],
            [
                'slug' => 'vitrines',
                'color' => 'blue',
                'image' => '../images/vitrines-fond.jpg',
                'icon' => '/icons/vitrines.png',
                'title' => 'Vitrines',
                'description' => 'Valorisez votre commerce avec des vitrines personnalisées et visibles.',
            ],
            [
                'slug' => 'enseignes',
                'color' => 'yellow',
                'image' => '../images/pexels-el-gringo-photo-116752370-29300402.jpg',
                'icon' => '/icons/shop.png',
                'title' => 'Enseignes',
                'description' => 'Création et pose d’enseignes pour sublimer vos façades commerciales.',
            ],
            [
                'slug' => 'accessibilite-pmr',
                'color' => 'darkblue',
                'image' => '../images/pexels-jakub-pabis-147246622-11074304.jpg',
                'icon' => '/icons/PMR.png',
                'title' => 'Accessibilité PMR',
                'description' => 'Signalétique conforme et claire pour personnes à mobilité réduite.',
            ],
            [
                'slug' => 'marquage-routier',
                'color' => 'green',
                'image' => '../images/pexels-mikebirdy-6584498.jpg',
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
