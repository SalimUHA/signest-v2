<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function index()
    {
        $carouselItems = [
            [
                'color' => 'orange',
                'image' => 'https://picsum.photos/id/12/800/600',
                'icon' => '/icons/signalisation.png',
                'title' => 'Signalétique',
                'description' => 'Nous concevons et installons des solutions de signalétique adaptées à tous types d’environnements.',
            ],
            [
                'color' => 'red',
                'image' => 'https://picsum.photos/id/1043/800/600',
                'icon' => '/icons/truck.png',
                'title' => 'Flocage véhicules',
                'description' => 'Transformez vos véhicules en supports de communication efficaces.',
            ],
            [
                'color' => 'blue',
                'image' => 'https://picsum.photos/id/211/800/600',
                'icon' => '/icons/vitrines.png',
                'title' => 'Vitrines',
                'description' => 'Valorisez votre commerce avec des vitrines personnalisées et visibles.',
            ],
            [
                'color' => 'yellow',
                'image' => 'https://picsum.photos/id/219/800/600',
                'icon' => '/icons/shop.png',
                'title' => 'Enseignes',
                'description' => 'Création et pose d’enseignes pour sublimer vos façades commerciales.',
            ],
            [
                'color' => 'darkblue',
                'image' => 'https://picsum.photos/id/431/800/600',
                'icon' => '/icons/PMR.png',
                'title' => 'Accessibilité PMR',
                'description' => 'Signalétique conforme et claire pour personnes à mobilité réduite.',
            ],
            [
                'color' => 'green',
                'image' => 'https://picsum.photos/id/835/800/600',
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
