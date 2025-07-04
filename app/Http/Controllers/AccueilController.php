<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccueilController extends Controller
{
    private function getServicesData(): array
    {
        return [
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
                'slug' => 'coverstyl',
                'color' => 'darkblue',
                'image' => '../images/fond-bois.webp',
                'icon' => '/icons/coverstyl.png',
                'title' => 'Cover Styl',
                'description' => 'Application de vinyles adhésifs sur toutes surfaces : murs, portes, meubles.',
            ],
            [
                'slug' => 'marquage-routier',
                'color' => 'green',
                'image' => '../images/fond-parking.webp',
                'icon' => '/icons/route.png',
                'title' => 'Marquage au sol',
                'description' => 'Marquage au sol pour organiser vos parkings et voies de circulation.',
            ],
        ];
    }

    public function index()
    {
        return view('accueil', [
            'carouselItems' => $this->getServicesData()
        ]);
    }

    public function servicesPage()
    {
        return view('nosservices', [
            'services' => $this->getServicesData()
        ]);
    }
}
