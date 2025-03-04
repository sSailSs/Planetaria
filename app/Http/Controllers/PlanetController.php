<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Planet;
use Illuminate\Http\Request;

class PlanetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $planets = Planet::all();
        return view('planets.index', compact('planets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Vérifier si l'utilisateur est connecté
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Vous devez être connecté pour ajouter une planète.');
    }

    return view('planets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'size' => 'required|integer',
            'distance' => 'required|numeric',
            'gravity' => 'required|numeric',
            'atmosphere' => 'required|string',
            'image' => 'nullable|string',

        ]);

        // L'utilisateur doit être connecté pour enregistrer
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Vous devez être connecté pour ajouter une planète.');
    }

    Planet::create([
        'name' => $request->name,
        'type' => $request->type,
        'size' => $request->size,
        'distance' => $request->distance,
        'gravity' => $request->gravity,
        'atmosphere' => $request->atmosphere,
        'user_id' => Auth::id(), // Associer la planète à l'utilisateur connecté
    ]);

    return redirect()->route('planets.index')->with('success', 'Planète ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Planet $planet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Planet $planet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Planet $planet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Planet $planet)
    {
        //
    }

    public function compare(Request $request)
    {
        $planetIds = $request->input('planets', []);
        
        if (count($planetIds) < 2) {
            return redirect()->route('planets.index')->with('error', 'Sélectionne au moins deux planètes à comparer.');
        }
    
        $selectedPlanets = Planet::whereIn('id', $planetIds)->get();
    
        return view('planets.compare', compact('selectedPlanets'));
    }
}   



