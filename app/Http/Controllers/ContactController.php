<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail; // Assurez-vous d'avoir créé ce Mail (php artisan make:mail ContactMail)
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        // On valide maintenant 'prenom' et 'nom' comme deux champs obligatoires
        $validated = $request->validate([
            'prenom'    => 'required|string|max:50',
            'nom'       => 'required|string|max:50',
            'telephone' => 'nullable|string|max:20',
            'email'     => 'required|email|max:255',
            'message'   => 'required|string|min:10',
        ]);

        Mail::to(config('mail.from.address'))
            ->send(new ContactMail($validated));

        return back()->with('success', 'Votre message a bien été envoyé, merci !');
    }
}
