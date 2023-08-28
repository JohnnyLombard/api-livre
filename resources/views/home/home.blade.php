@extends('base')

@section('title', 'Accueil')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <h1 class="text-center text-muted mb-5 mt-5">API BIBLIOTHEQUE</h1>

            <p>Avec Laravel, développer une API REST (fonctionnelle) de gestion de livres (CRUD), liée à une base de données SQL.</p><br>

            <p>Les routes à mettre en place sont les suivantes :</p>
            <ul>
                <li> Liste de tous les livres </li>
                <li> Création d'un livre </li>
                <li> Récupération d'un livre </li>
                <li> Mise à jour d'un livre </li>
                <li> Suppression d'un livre </li>
            </ul>


            <p>Un livre est composé d'un titre, d'un auteur, d'une date de publication et des dates de création & mise à jour.</p><br>

            <p>Chaque route doit être accompagnée d'un test fonctionnel à minima.</p>

        </div>
    </div>
</div>
@endsection
