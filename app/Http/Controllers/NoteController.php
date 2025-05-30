<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Etudiant;
use App\Models\Evaluation;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    // Affiche le formulaire de saisie des notes
    public function create()
    {
        $etudiants = Etudiant::all();
        $evaluations = Evaluation::all();
        return view('notes.create', compact('etudiants', 'evaluations'));
    }

    // Enregistre une note (création ou mise à jour)
    public function store(Request $request)
    {
        $request->validate([
            'etudiant_id' => 'required|exists:etudiants,id',
            'evaluation_id' => 'required|exists:evaluations,id',
            'note' => 'required|numeric|min:0|max:20',
        ]);

        Note::updateOrCreate(
            [
                'etudiant_id' => $request->etudiant_id,
                'evaluation_id' => $request->evaluation_id
            ],
            ['note' => $request->note]
        );

        return redirect()->route('notes.index')->with('success', 'Note enregistrée');
    }

    // Affiche la liste des notes par étudiant avec la moyenne
    public function index()
    {
        $etudiants = Etudiant::with('notes.evaluation')->get();

        return view('notes.index', compact('etudiants'));
    }

    // Affiche les statistiques (moyenne générale, meilleur étudiant)
    public function stats()
    {
        $moyenneGenerale = Note::avg('note');

        $meilleurEtudiant = Etudiant::with('notes')
            ->get()
            ->sortByDesc(function ($etudiant) {
                return $etudiant->notes->avg('note');
            })
            ->first();

        return view('statistiques.index', compact('moyenneGenerale', 'meilleurEtudiant'));
    }
}
