<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service; // On importe le modèle Service

class ServiceController extends Controller
{
    /**
     * Affiche la page de détail d'un service.
     */
    public function show($slug)
    {
        // Trouve le service dans la base de données par son slug.
        // S'il ne le trouve pas, il renvoie automatiquement une erreur 404.
        $service = Service::where('slug', $slug)->firstOrFail();

        // Renvoie la vue 'service' et lui donne l'objet $service
        return view('service', [
            'service' => $service
        ]);
    }
}
