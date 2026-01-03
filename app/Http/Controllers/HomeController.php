<?php

namespace App\Http\Controllers;

use App\Models\Prestation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $prestations = Prestation::all();
        return view('home.index', compact('prestations'));
    }

    public function prestations()
    {
        $prestations = Prestation::all();
        return view('home.prestations', compact('prestations'));
    }

    public function prestation($id)
    {
        $prestation = Prestation::findOrFail($id);
        return view('home.prestation-detail', compact('prestation'));
    }

    public function about()
    {
        return view('home.about');
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function sendContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Logique d'envoi d'email ici
        return back()->with('success', 'Votre message a été envoyé avec succès !');
    }

    public function faq()
    {
        return view('home.faq');
    }

    public function privacy()
    {
        return view('home.privacy');
    }

    public function terms()
    {
        return view('home.terms');
    }
}
