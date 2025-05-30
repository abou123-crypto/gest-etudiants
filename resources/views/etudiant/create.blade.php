@extends('layouts.base')
@section('content')
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Enregistrer un étudiant</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('etudiant.index') }}">Étudiants</a></li>
                        <li class="breadcrumb-item active" aria-current="page">ajouter</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card card-secondary card-outline mb-4">
                        <div class="card-header">
                            <div class="card-title">Formulaire d'ajout d'un étudiant</div>
                        </div>

                        @session('success')
                            <div class="alert alert-success text-center">{{ session('success') }}</div>
                        @endsession

                        <form action="{{ route('etudiant.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row mb-3">
                                    <label for="prenom" class="col-sm-3 col-form-label">Prénom</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="prenom" id="prenom" class="form-control" value="{{ old('prenom') }}" />
                                        @error('prenom')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="nom" class="col-sm-3 col-form-label">Nom</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom') }}" />
                                        @error('nom')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="date_naissance" class="col-sm-3 col-form-label">Date de naissance</label>
                                    <div class="col-sm-9">
                                        <input type="date" name="date_naissance" id="date_naissance" class="form-control" value="{{ old('date_naissance') }}" />
                                        @error('date_naissance')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-secondary">Enregistrer</button>
                                <a href="{{ route('etudiant.index') }}" class="btn float-end">Revenir sur la liste</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
