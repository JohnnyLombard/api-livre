@extends('base') <!-- Si vous avez un layout commun pour toutes vos pages -->

@section('title', $livre->titre)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <h1 class="text-center text-muted mb-5 mt-5">Détails du livre</h1>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Titre : {{ $livre->titre }}</h5>
                    <p class="card-text">Auteur : {{ $livre->auteur }}</p>
                    <p class="card-text">Date de Publication : {{ $livre->date_publication }}</p>
                </div>
            </div>
            <a href="{{ route('livres.index') }}" class="btn btn-primary mt-3">Retour à la liste</a>
        </div>
    </div>
</div>
@endsection
