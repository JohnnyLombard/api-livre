@extends('base')

@section('title', 'Collection complète')

@section('content')
<div class="container">
    <h1 class="text-center text-muted mb-5 mt-5">Liste de tous les livres</h1>

    @if(count($livres) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Date de Publication</th>
                </tr>
            </thead>
            <tbody>
                @foreach($livres as $livre)
                    <tr>
                        <td>{{ $livre->titre }}</td>
                        <td>{{ $livre->auteur }}</td>
                        <td>{{ $livre->date_publication }}</td>
                        <td>
                            <a href="{{ route('livres.show', ['id' => $livre->id]) }}" class="btn btn-primary">Voir</a>
                            <a href="{{ route('livres.edit', ['id' => $livre->id]) }}" class="btn btn-warning">Éditer</a>
                            <a href="{{ route('livres.delete', ['id' => $livre->id]) }}" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Bibliothèque vide.</p>
    @endif
</div>
@endsection
