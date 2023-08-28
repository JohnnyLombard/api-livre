@extends('base')

@section('title', 'Ajouter')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <h1 class="text-center text-muted mb-5 mt-5">Création d'un livre</h1>

            <!-- Formulaire de création -->
            <form method="POST" action="{{ route('livres.crea') }}">
                @csrf

                <div class="form-group">
                    <label for="titre">Titre :</label>
                    <input type="text" name="titre" id="titre" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="auteur">Auteur :</label>
                    <input type="text" name="auteur" id="auteur" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="date_publication">Date de Publication :</label>
                    <input type="date" name="date_publication" id="date_publication" class="form-control" required>
                </div>

                <br>
                <button type="submit" class="btn btn-primary">Créer le livre</button>
            </form>
        </div>
    </div>
</div>
@endsection
