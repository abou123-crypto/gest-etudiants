<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluation;  // <-- Ajouté

class EvaluationController extends Controller
{
    public function index()
    {
        $evaluations = Evaluation::all();
        return view('evaluations.index', compact('evaluations'));
    }

    public function create()
    {
        return view('evaluations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:45',
            'date' => 'required|date',
            'type' => 'required|in:examen,devoir',
        ]);

        Evaluation::create($request->all());

        return redirect()->route('evaluations.index')->with('success', 'Evaluation créée avec succès');
    }

    public function edit(Evaluation $evaluation)
    {
        return view('evaluations.edit', compact('evaluation'));
    }

    public function update(Request $request, Evaluation $evaluation)
    {
        $request->validate([
            'titre' => 'required|string|max:45',
            'date' => 'required|date',
            'type' => 'required|in:examen,devoir',
        ]);

        $evaluation->update($request->all());

        return redirect()->route('evaluations.index')->with('success', 'Evaluation mise à jour');
    }

    public function destroy(Evaluation $evaluation)
    {
        $evaluation->delete();
        return redirect()->route('evaluations.index')->with('success', 'Evaluation supprimée');
    }
}
