@extends('layouts.base')
@section('content')
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Tableau de bord</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--end::App Content Header-->

    <!--begin::App Content-->
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">

                <!-- Carte: Nombre d'étudiants -->
                <div class="col-md-3 col-sm-6">
                    <div class="card bg-primary text-white">
                        <div class="card-header">
                            <h3 class="card-title">Étudiants</h3>
                        </div>
                        <div class="card-body">
                            <h2>{{ $etudiantsCount ?? 0 }}</h2>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('etudiant.index') }}" class="text-white">Gérer les étudiants</a>
                        </div>
                    </div>
                </div>

                <!-- Carte: Nombre d'évaluations -->
                <div class="col-md-3 col-sm-6">
                    <div class="card bg-success text-white">
                        <div class="card-header">
                            <h3 class="card-title">Évaluations</h3>
                        </div>
                        <div class="card-body">
                            <h2>{{ $evaluationsCount ?? 0 }}</h2>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('evaluations.index') }}" class="text-white">Gérer les évaluations</a>
                        </div>
                    </div>
                </div>

                <!-- Carte: Moyenne générale -->
                <div class="col-md-3 col-sm-6">
                    <div class="card bg-info text-white">
                        <div class="card-header">
                            <h3 class="card-title">Moyenne générale</h3>
                        </div>
                        <div class="card-body">
                            <h2>{{ number_format($moyenneGenerale ?? 0, 2) }}</h2>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('etudiant.index') }}" class="text-white">Voir les etudiants</a>
                        </div>
                    </div>
                </div>

                <!-- Carte: Meilleur étudiant -->
                <div class="col-md-3 col-sm-6">
                    <div class="card bg-warning text-white">
                        <div class="card-header">
                            <h3 class="card-title">Meilleur étudiant</h3>
                        </div>
                        <div class="card-body">
                            <h5>{{ $meilleurEtudiant->prenom ?? 'Aucun' }}</h5>
                            <h2>{{ number_format($meilleurEtudiant->moyenne ?? 0, 2) }}</h2>
                        </div>
                        <div class="card-footer">
                            @if(isset($meilleurEtudiant))
                                <a href="{{ route('etudiants.show', $meilleurEtudiant->id) }}" class="text-white">Détails</a>
                            @else
                                <span>Aucun détail</span>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--end::App Content-->
@endsection
