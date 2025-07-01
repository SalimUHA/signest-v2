<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // Affiche la liste de tous les services
    public function index()
    {
        $services = Service::all(); // On récupère tous les services depuis la BDD
        return view('dashboard.services.index', ['services' => $services]);
    }

    // Affiche le formulaire de modification pour UN service
    public function edit(Service $service) // Laravel injecte automatiquement le bon service grâce à son ID dans l'URL
    {
        return view('dashboard.services.edit', ['service' => $service]);
    }

    // Traite la soumission du formulaire et met à jour le service
    public function update(Request $request, Service $service)
    {
        // 1. Valider les données du formulaire
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:255',
            // Ajoutez ici les règles de validation pour les autres champs si nécessaire
        ]);

        // 2. Mettre à jour le service dans la base de données
        $service->update($validatedData);

        // 3. Rediriger vers la liste avec un message de succès
        return redirect()->route('dashboard.services.index')->with('success', 'Service mis à jour avec succès !');
    }
}
