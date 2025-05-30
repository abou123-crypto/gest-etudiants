@extends('layouts.base')

@section('content')
<div class="container p-4">
    <h1>Créer une nouvelle évaluation</h1>

    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif

    <form action="{{ route('evaluations.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" id="titre" name="titre" class="form-control" maxlength="45" value="{{ old('titre') }}" required>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" id="date" name="date" class="form-control" value="{{ old('date') }}" required>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select id="type" name="type" class="form-select" required>
                <option value="">-- Sélectionnez --</option>
                <option value="examen" {{ old('type') == 'examen' ? 'selected' : '' }}>Examen</option>
                <option value="devoir" {{ old('type') == 'devoir' ? 'selected' : '' }}>Devoir</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Créer</button>
        <a href="{{ route('evaluations.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
