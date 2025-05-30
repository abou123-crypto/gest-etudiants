@extends('layouts.base')

@section('content')
<div class="container">
    <h1>Statistiques des étudiants</h1>

    <p><strong>Moyenne générale :</strong> {{ number_format($moyenneGenerale, 2) }}</p>

    @if($meilleurEtudiant)
        <p><strong>Meilleur étudiant :</strong> {{ $meilleurEtudiant->prenom }} {{ $meilleurEtudiant->nom }} 
        (Moyenne : {{ number_format($meilleureMoyenne, 2) }})</p>
    @else
        <p>Aucun étudiant trouvé.</p>
    @endif

    <h3>Moyennes par étudiant :</h3>
    <ul>
        @foreach($moyennesParEtudiant as $etudiantMoyenne)
            @php
                $etudiant = \App\Models\Etudiant::find($etudiantMoyenne->etudiant_id);
            @endphp
            <li>
                {{ $etudiant ? $etudiant->prenom . ' ' . $etudiant->nom : 'Étudiant inconnu' }} :
                {{ number_format($etudiantMoyenne->moyenne, 2) }}
            </li>
        @endforeach
    </ul>
</div>
@endsection
