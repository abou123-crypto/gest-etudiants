@extends('layouts.base')

@section('content')
<div class="container py-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>Ajouter une note</h4>
        </div>
        <div class="card-body">

            {{-- Affichage des erreurs --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Erreur !</strong> Veuillez corriger les champs suivants :
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Formulaire --}}
            <form action="{{ route('notes.store') }}" method="POST">
                @csrf

                {{-- Étudiant --}}
                <div class="mb-3">
                    <label for="etudiant_id" class="form-label">Étudiant</label>
                    <select id="etudiant_id" name="etudiant_id" class="form-select" required>
                        <option value="">-- Sélectionnez un étudiant --</option>
                        @foreach($etudiants as $etudiant)
                            <option value="{{ $etudiant->id }}" {{ old('etudiant_id') == $etudiant->id ? 'selected' : '' }}>
                                {{ $etudiant->prenom }} {{ $etudiant->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Évaluation --}}
                <div class="mb-3">
                    <label for="evaluation_id" class="form-label">Évaluation</label>
                    <select id="evaluation_id" name="evaluation_id" class="form-select" required>
                        <option value="">-- Sélectionnez une évaluation --</option>
                        @foreach($evaluations as $evaluation)
                            <option value="{{ $evaluation->id }}" {{ old('evaluation_id') == $evaluation->id ? 'selected' : '' }}>
                                {{ $evaluation->titre }} ({{ \Carbon\Carbon::parse($evaluation->date)->format('d/m/Y') }})
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Note --}}
                <div class="mb-3">
                    <label for="note" class="form-label">Note (sur 20)</label>
                    <input
                        type="number"
                        id="note"
                        name="note"
                        class="form-control"
                        step="0.01"
                        min="0"
                        max="20"
                        placeholder="ex : 15.5"
                        value="{{ old('note') }}"
                        required
                    >
                    <small class="form-text text-muted">Veuillez entrer une note comprise entre 0 et 20.</small>
                </div>

                {{-- Boutons --}}
                <div class="d-flex justify-content-between">
                    <a href="{{ route('notes.index') }}" class="btn btn-secondary">Annuler</a>
                    <button type="submit" class="btn btn-success">Enregistrer</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
