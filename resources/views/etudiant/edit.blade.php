@extends('layouts.base')
@section('content')
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Modifier un étudiant</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('etudiant.index') }}">Étudiant</a></li>
                        <li class="breadcrumb-item active" aria-current="page">modifier</li>
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
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <!--begin::Horizontal Form-->
                    <div class="card card-secondary card-outline mb-4">
                        <!--begin::Header-->
                        <div class="card-header">
                            <div class="card-title">Formulaire de modification d'un étudiant</div>
                        </div>

                        @session('success')
                            <div class="alert alert-success text-center">
                                {{ session('success') }}
                            </div>
                        @endsession
                        <!--end::Header-->
                        <!--begin::Form-->
                        <form action="{{ route('etudiant.update', $etudiant->id) }}" method="POST">
                            @csrf
                            <!--begin::Body-->
                            <div class="card-body">
                                <div class="row mb-3">
                                    <label for="prenom" class="col-sm-3 col-form-label">Prénom</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="prenom" value="{{ $etudiant->prenom }}" class="form-control" id="prenom" />
                                        @error('prenom')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="nom" class="col-sm-3 col-form-label">Nom</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nom" value="{{ $etudiant->nom }}" class="form-control" id="nom" />
                                        @error('nom')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="date_naissance" class="col-sm-3 col-form-label">Date de naissance</label>
                                    <div class="col-sm-9">
                                        <input type="date" name="date_naissance" value="{{ $etudiant->date_naissance }}" class="form-control" id="date_naissance" />
                                        @error('date_naissance')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!--end::Body-->
                            <!--begin::Footer-->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-secondary">Mettre à jour</button>
                                <a href="{{ route('etudiant.index') }}" class="btn float-end">Revenir sur la liste</a>
                            </div>
                            <!--end::Footer-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Horizontal Form-->
                </div>
            </div>
            <!--end::Row-->
        </div>
    </div>
    <!--end::App Content-->
@endsection
