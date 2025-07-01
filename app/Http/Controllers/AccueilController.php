<?php

namespace App\Http\Controllers;

// On importe le Modèle "Service" pour pouvoir l'utiliser
use App\Models\Service;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    /**
     * Affiche la page d'accueil.
     */
    public function index()
    {
        // On récupère TOUS les services depuis la base de données
        $services = Service::all();

        // On passe ces services à la vue de l'accueil
        return view('accueil', [
            'carouselItems' => $services
        ]);
    }

    /**
     * Affiche la page "Nos Services".
     */
    public function servicesPage()
    {
        $services = Service::all();

        return view('nosservices', [
            'services' => $services
        ]);
    }
}
