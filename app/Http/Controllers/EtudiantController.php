<?php

namespace App\Http\Controllers;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller

{
    // Affiche tous les étudiants
    public function index()
    {
        $etudiants = Etudiant::orderBy('nom', 'asc')->paginate(10);
        return view('etudiant.index', compact('etudiants'));
    }

    // Formulaire pour créer un étudiant
    public function create()
    {
        return view('etudiant.create');
    }

    // Enregistre un nouvel étudiant
    public function store(Request $request)
    {
        $request->validate([
            'prenom' => 'required|string|max:45',
            'nom' => 'required|string|max:45',
            'date_naissance' => 'required|date',
        ]);

        Etudiant::create([
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'date_naissance' => $request->date_naissance,
        ]);

        return redirect()->route('etudiant.index')
                         ->with('success', 'Étudiant ajouté avec succès.');
    }

    // Formulaire d’édition
    public function edit(Etudiant $etudiant)
    {
        return view('etudiant.edit', compact('etudiant'));
    }

    // Mise à jour des données d’un étudiant
    public function update(Request $request, Etudiant $etudiant)
    {
        $request->validate([
            'prenom' => 'required|string|max:100',
            'nom' => 'required|string|max:100',
            'date_naissance' => 'required|date',
        ]);

        $etudiant->update([
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'date_naissance' => $request->date_naissance,
        ]);

        return redirect()->route('etudiant.index')
                         ->with('success', 'Étudiant modifié avec succès.');
    }

    // Supprime un étudiant
    public function delete(Etudiant $etudiant)
    {
        $etudiant->delete();
        return redirect()->route('etudiant.index')
                         ->with('success', 'Étudiant supprimé avec succès.');
    }

    
    public function show(Etudiant $etudiant)
    {
        $notes = $etudiant->notes()->with('evaluation')->get();
        $moyenne = $notes->avg('note');

        return view('etudiant.show', compact('etudiant', 'notes', 'moyenne'));
    }
}


