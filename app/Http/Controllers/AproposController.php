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
                'color' => '#2ECC71'
            ],
            [
                'image' => 'icons/recyclage.png',
                'titre' => 'Recyclage',
                'texte' => 'Chez Signest, le recyclage fait partie intégrante de notre démarche. Nous réutilisons et valorisons les matériaux pour limiter le gaspillage.',
                'color' => '#3498DB'
            ],
            [
                'image' => 'icons/main.png',
                'titre' => 'Confiance',
                'texte' => 'La confiance est le fondement de toutes nos collaborations, basée sur l’écoute, la réactivité et la fiabilité.',
                'color' => '#E74C3C'
            ],
            [
                'image' => 'icons/savoirfaire.png',
                'titre' => 'Savoir-Faire',
                'texte' => 'Forts de notre expertise, nous allions maîtrise technique et sens du détail pour des prestations de qualité, sur mesure et durables.',
                'color' => '#F39C12'
            ],
        ];

        $equipe_data = [
            ['nom' => 'Bruno Viera', 'poste' => 'Gérant'],
            ['nom' => 'Luigi', 'poste' => 'Agent de production'],
            ['nom' => 'Alexis', 'poste' => 'Graphiste'],
            ['nom' => 'Erwan', 'poste' => 'Apprenti'],
        ];

        $equipe_filtered = array_filter($equipe_data, function($membre) {
            return $membre['nom'] !== 'Maelys';
        });

        $avatarMap = [
            'Luigi' => 'https://avataaars.io/?avatarStyle=Transparent&topType=ShortHairShortRound&accessoriesType=Blank&hairColor=BrownDark&facialHairType=BeardMedium&facialHairColor=BrownDark&clotheType=Hoodie&clotheColor=Blue03&eyeType=Default&eyebrowType=Default&mouthType=Default&skinColor=Light',
            'Alexis' => 'https://avataaars.io/?avatarStyle=Transparent&topType=ShortHairTheCaesarSidePart&accessoriesType=Blank&hairColor=Black&facialHairType=Blank&clotheType=ShirtCrewNeck&clotheColor=Gray02&eyeType=Default&eyebrowType=Default&mouthType=Serious&skinColor=Pale',
            'Erwan' => 'https://avataaars.io/?avatarStyle=Transparent&topType=ShortHairFrizzle&accessoriesType=Blank&hairColor=Brown&facialHairType=Blank&clotheType=Hoodie&clotheColor=PastelGreen&eyeType=Default&eyebrowType=Default&mouthType=Smile&skinColor=Light',
            'Bruno Viera' => 'https://avataaars.io/?avatarStyle=Transparent&topType=ShortHairShortFlat&accessoriesType=Prescription02&hairColor=Black&facialHairType=Blank&clotheType=Hoodie&clotheColor=Gray01&eyeType=Default&eyebrowType=Default&mouthType=Default&skinColor=Light'
        ];
        $defaultAvatar = 'https://avataaars.io/?avatarStyle=Transparent&topType=LongHairMiaWallace&accessoriesType=Blank&hairColor=BlondeGolden&facialHairType=Blank&clotheType=BlazerShirt&eyeType=Happy&eyebrowType=DefaultNatural&mouthType=Smile&skinColor=Pale';

        $equipe = array_map(function($membre) use ($avatarMap, $defaultAvatar) {
            $membre['avatar'] = $avatarMap[$membre['nom']] ?? $defaultAvatar;
            return $membre;
        }, $equipe_filtered);


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
