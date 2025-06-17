<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AproposController extends Controller
{
    public function index()
    {
        $valeurs = [
            [
                'image' => 'icons/ecoresp.png',
                'titre' => 'Éco-responsabilité',
                'texte' => 'Nous nous engageons à minimiser notre impact environnemental en privilégiant des matériaux durables et des pratiques responsables.',
                'color' => '#2ECC71' // Vert
            ],
            [
                'image' => 'icons/recyclage.png',
                'titre' => 'Recyclage',
                'texte' => 'Chez Signest, le recyclage fait partie intégrante de notre démarche. Nous réutilisons et valorisons les matériaux pour limiter le gaspillage.',
                'color' => '#3498DB' // Bleu
            ],
            [
                'image' => 'icons/main.png',
                'titre' => 'Confiance',
                'texte' => 'La confiance est le fondement de toutes nos collaborations, basée sur l’écoute, la réactivité et la fiabilité.',
                'color' => '#E74C3C' // Rouge
            ],
            [
                'image' => 'icons/savoirfaire.png',
                'titre' => 'Savoir-Faire',
                'texte' => 'Forts de notre expertise, nous allions maîtrise technique et sens du détail pour des prestations de qualité, sur mesure et durables.',
                'color' => '#F39C12' // Jaune/Orange
            ],
        ];

        $equipe = [
            [
                'photo' => 'images/membre1.png',
                'nom' => 'Bruno Viera',
                'poste' => 'Gérant'
            ],
            [
                'photo' => 'images/membre2.jpg',
                'nom' => 'Luigi',
                'poste' => 'Agent de production'
            ],
            [
                'photo' => 'images/membre3.jpg',
                'nom' => 'Alexis',
                'poste' => 'Graphiste'
            ],
            [
                'photo' => 'images/membre4.jpg',
                'nom' => 'Erwan',
                'poste' => 'Apprenti'
            ],

            [
                'photo' => 'images/team/membre5.jpg',
                'nom' => 'Maëlys',
                'poste' => 'Apprentie'
            ],
        ];

        $clients_logos = [ 'creditmutuel.png', 'stlouisagglo.png', 'veolia.png',
            'capisecurite.png', 'LK.png', 'primeoenergie.png', 'scatp.png', 'stlouis.png',
            'huningue.png', 'blotzheim.png', 'Leclerc.png', 'distribus.png', 'groupe-atlantic.png' ];

        $all_logos = array_merge($clients_logos, $clients_logos);


        return view('apropos', [
            'valeurs' => $valeurs,
            'equipe' => $equipe,
            'clients' => $all_logos
        ]);
    }
}
