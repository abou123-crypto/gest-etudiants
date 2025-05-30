@extends('layouts.base')

@section('content')
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Liste des étudiants</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Étudiants</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->

    <!--begin::App Content-->
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <a href="{{ route('etudiant.create') }}" class="btn btn-primary">Ajouter un étudiant</a>
                        </div>

                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success text-center">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Prénom</th>
                                            <th>Nom</th>
                                            <th>Date de naissance</th>
                                            <th style="width: 175px">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($etudiants as $etudiant)
                                            <tr class="align-middle">
                                                <td>{{ $etudiant->id }}</td>
                                                <td>{{ $etudiant->prenom }}</td>
                                                <td>{{ $etudiant->nom }}</td>
                                                <td>
                                                    @if ($etudiant->date_naissance)
                                                        {{ \Carbon\Carbon::parse($etudiant->date_naissance)->format('d/m/Y') }}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('etudiant.edit', $etudiant->id) }}" class="btn btn-warning btn-sm">
                                                        Modifier
                                                    </a>
                                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $etudiant->id }}">
                                                        Supprimer
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Aucun étudiant trouvé.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer clearfix">
                            {{ $etudiants->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modals en fin de page pour respecter la structure HTML --}}
    @foreach ($etudiants as $etudiant)
        <div class="modal fade" id="deleteModal{{ $etudiant->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $etudiant->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel{{ $etudiant->id }}">Confirmation de suppression</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                    </div>
                    <div class="modal-body">
                        Voulez-vous vraiment supprimer <strong>{{ $etudiant->prenom }} {{ $etudiant->nom }}</strong> ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <form action="{{ route('etudiant.destroy', $etudiant->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Confirmer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
