<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ServiceController extends Controller
{
    public function show($slug)
    {
        $realisationsController = new RealisationsController();
        $services = $realisationsController->getServicesData();

        $service = Arr::first($services, fn ($value) => $value['slug'] === $slug);

        if (!$service) {
            abort(404);
        }

        return view('service', [
            'service' => $service
        ]);
    }
}
