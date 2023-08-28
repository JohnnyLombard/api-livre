@extends('base')

@section('title', 'Editer')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <h1 class="text-center text-muted mb-5 mt-5">Mise à jour du livre</h1>

            <!-- Formulaire de mise à jour -->
            <form method="POST" action="{{ route('livres.update', ['id' => $livre->id]) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="titre">Titre :</label>
                    <input type="text" name="titre" id="titre" class="form-control" value="{{ $livre->titre }}">
                </div>

                <div class="form-group">
                    <label for="auteur">Auteur :</label>
                    <input type="text" name="auteur" id="auteur" class="form-control" value="{{ $livre->auteur }}">
                </div>

                <div class="form-group">
                    <label for="date_publication">Date de Publication :</label>
                    <input type="date" name="date_publication" id="date_publication" class="form-control" value="{{ $livre->date_publication }}">
                </div>

                <br>
                <button type="submit" class="btn btn-primary" mt-2 >Mettre à jour le livre</button><br>
                <a href="{{ route('livres.index') }}" class="btn btn-primary mt-3">Retour à la liste</a>
            </form>
        </div>
    </div>
</div>
@endsection
