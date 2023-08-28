@extends('base')

@section('title', 'Supprimer')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <h1 class="text-center text-muted mb-5 mt-5">Confirmation de suppression</h1>

            <div class="alert alert-danger">
                <p>Êtes-vous sûr de vouloir supprimer ce livre : <br><strong>{{ $livre->titre }}</strong> ?</p>
            </div>

            <!-- Formulaire de suppression -->
            <form method="POST" action="{{ route('livres.destroy', ['id' => $livre->id]) }}">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Supprimer le livre</button>
                <a href="{{ route('livres.index') }}" class="btn btn-primary">Annuler</a>
            </form>
        </div>
    </div>
</div>
@endsection
