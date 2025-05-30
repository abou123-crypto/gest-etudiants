@extends('layouts.base')

@section('content')
<div class="container p-4">
    <h1>Liste des notes</h1>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('notes.create') }}" class="btn btn-primary mb-3">Ajouter une note</a>

    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Étudiant</th>
                <th>Notes</th>
                <th>Moyenne</th>
            </tr>
        </thead>
        <tbody>
            @foreach($etudiants as $etudiant)
            <tr>
                <td>{{ $etudiant->prenom }} {{ $etudiant->nom }}</td>
                <td>
                    <ul class="mb-0">
                        @foreach($etudiant->notes as $note)
                        <li>{{ $note->evaluation->titre }} : {{ $note->note }}/20</li>
                        @endforeach
                    </ul>
                </td>
                <td>{{ number_format($etudiant->notes->avg('note'), 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
