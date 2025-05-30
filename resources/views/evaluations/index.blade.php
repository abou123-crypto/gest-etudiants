@extends('layouts.base')

@section('content')
<div class="container p-4">
    <h1>Liste des évaluations</h1>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('evaluations.create') }}" class="btn btn-primary mb-3">Ajouter une évaluation</a>

    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Titre</th>
                <th>Date</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($evaluations as $evaluation)
            <tr>
                <td>{{ $evaluation->titre }}</td>
                <td>{{ \Carbon\Carbon::parse($evaluation->date)->format('d/m/Y') }}</td>
                <td>{{ ucfirst($evaluation->type) }}</td>
                <td>
                    <a href="{{ route('evaluations.edit', $evaluation) }}" class="btn btn-sm btn-warning">Modifier</a>
                    <form action="{{ route('evaluations.destroy', $evaluation) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Confirmer la suppression ?')" class="btn btn-sm btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="4">Aucune évaluation trouvée.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
