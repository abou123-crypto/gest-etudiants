<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Etudiant;
use Illuminate\Support\Facades\DB;

class StatistiquesController extends Controller
{
    public function index()
    {
        // Moyenne générale de toutes les notes
        $moyenneGenerale = Note::avg('note');

        // Moyenne par étudiant
        $moyennesParEtudiant = Note::select('etudiant_id', DB::raw('AVG(note) as moyenne'))
                                    ->groupBy('etudiant_id')
                                    ->orderByDesc('moyenne')
                                    ->get();

        // Meilleur étudiant (celui avec la meilleure moyenne)
        $meilleurEtudiant = null;
        $meilleureMoyenne = null;

        if ($moyennesParEtudiant->count() > 0) {
            $top = $moyennesParEtudiant->first();
            $meilleurEtudiant = Etudiant::find($top->etudiant_id);
            $meilleureMoyenne = $top->moyenne;
        }

        return view('statistiques.index', [
            'moyenneGenerale' => $moyenneGenerale,
            'moyennesParEtudiant' => $moyennesParEtudiant,
            'meilleurEtudiant' => $meilleurEtudiant,
            'meilleureMoyenne' => $meilleureMoyenne,
        ]);
    }
}
