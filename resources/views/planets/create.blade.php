@extends('layouts.app')

@section('title', 'Créer une Planète')

@section('content')
    <h2>🪐 Ajouter une Planète</h2>
    <form action="{{ route('planets.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nom :</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Type :</label>
            <input type="text" name="type" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Taille (km) :</label>
            <input type="number" name="size" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Distance du Soleil (millions km) :</label>
            <input type="number" step="0.1" name="distance" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Gravité (m/s²) :</label>
            <input type="number" step="0.01" name="gravity" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Atmosphère :</label>
            <input type="text" name="atmosphere" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Créer</button>
    </form>
@endsection
