<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('title')->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validatedData = $this->validateService($request);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('services/images', 'public');
            $validatedData['image'] = 'storage/' . $path;
        }

        if ($request->hasFile('icon')) {
            $path = $request->file('icon')->store('services/icons', 'public');
            $validatedData['icon'] = 'storage/' . $path;
        }

        $validatedData['page_content'] = json_decode($request->page_content, true);

        Service::create($validatedData);

        return redirect()->route('admin.services.index')->with('success', 'Service créé avec succès.');
    }

    public function edit(Service $service)
    {
        // On définit la liste des couleurs ici
        $colors = ['lightyellow', 'red', 'blue', 'yellow', 'darkblue', 'green', 'orange'];

        // On envoie les DEUX variables à la vue
        return view('admin.services.edit', compact('service', 'colors'));
    }

    public function update(Request $request, Service $service)
    {
        $validatedData = $this->validateService($request, $service->id);

        if ($request->hasFile('image')) {
            if ($service->image) Storage::disk('public')->delete(str_replace('storage/', '', $service->image));
            $path = $request->file('image')->store('services/images', 'public');
            $validatedData['image'] = 'storage/' . $path;
        }

        if ($request->hasFile('icon')) {
            if ($service->icon) Storage::disk('public')->delete(str_replace('storage/', '', $service->icon));
            $path = $request->file('icon')->store('services/icons', 'public');
            $validatedData['icon'] = 'storage/' . $path;
        }

        $validatedData['page_content'] = json_decode($request->page_content, true);

        $service->update($validatedData);

        return redirect()->route('admin.services.index')->with('success', 'Service mis à jour avec succès.');
    }

    public function destroy(Service $service)
    {
        if ($service->image) Storage::disk('public')->delete(str_replace('storage/', '', $service->image));
        if ($service->icon) Storage::disk('public')->delete(str_replace('storage/', '', $service->icon));
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service supprimé avec succès.');
    }

    // Fonction privée pour ne pas répéter les règles de validation
    private function validateService(Request $request, $serviceId = null)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:services,slug,' . $serviceId,
            'description' => 'required|string',
            'page_content' => 'required|json',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:1024',
            'color' => 'required|string|max:50',
        ];

        // Rendre l'image et l'icône obligatoires seulement à la création
        if (!$serviceId) {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048';
            $rules['icon'] = 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:1024';
        }

        return $request->validate($rules);
    }

    // La fonction pour notre JavaScript
    public function getPageContent(Service $service)
    {
        return response()->json($service->page_content ?? []);
    }

} // <-- Fin de la classe ServiceController
