<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'slug' => 'required|string|unique:services,slug',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'color' => 'required|string',
            'content' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
            $validatedData['image'] = 'images/' . $fileName;
        }

        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('icons'), $fileName);
            $validatedData['icon'] = 'icons/' . $fileName;
        }

        Service::create($validatedData);

        return redirect()->route('admin.services.index')->with('success', 'Service ajouté avec succès.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validatedData = $request->validate([
            'slug' => ['required', 'string', Rule::unique('services')->ignore($service->id)],
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'color' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            if ($service->image && File::exists(public_path($service->image))) {
                File::delete(public_path($service->image));
            }
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
            $validatedData['image'] = 'images/' . $fileName;
        }

        if ($request->hasFile('icon')) {
            if ($service->icon && File::exists(public_path($service->icon))) {
                File::delete(public_path($service->icon));
            }
            $file = $request->file('icon');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('icons'), $fileName);
            $validatedData['icon'] = 'icons/' . $fileName;
        }

        $service->update($validatedData);

        return redirect()->route('admin.services.index')->with('success', 'Service mis à jour avec succès.');
    }

    public function destroy(Service $service)
    {
        if ($service->image && File::exists(public_path($service->image))) {
            File::delete(public_path($service->image));
        }
        if ($service->icon && File::exists(public_path($service->icon))) {
            File::delete(public_path($service->icon));
        }

        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service supprimé avec succès.');
    }
}
