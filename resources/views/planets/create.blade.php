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
            <select name="type" class="form-control" required>
                <option value="" disabled selected>-- Sélectionner un type --</option>
                <option value="Gas Giant">Gas Giant</option>
                <option value="Ice Giant">Ice Giant</option>
                <option value="Terrestrial">Terrestrial</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Taille (km) :</label>
            <input type="number" name="size" class="form-control" required min="1">
        </div>

        <div class="mb-3">
            <label class="form-label">Distance du Soleil (millions km) :</label>
            <input type="number" step="0.1" name="distance" class="form-control" required min="0.1">
        </div>

        <div class="mb-3">
            <label class="form-label">Gravité (m/s²) :</label>
            <input type="number" step="0.01" name="gravity" class="form-control" required min="0.1">
        </div>

        <div class="mb-3">
                <label class="form-label">Atmosphère :</label>
            <input type="text" name="atmosphere" class="form-control" required
                placeholder="Ex: N 78% - O₂ 21%"
                pattern="[A-Z][a-z]? \d+% - [A-Z][a-z]? \d+%"
                title="Format attendu : Élément1 % - Élément2 % (Ex: CO₂ 95% - Ar 2%)">
            <small class="text-gray-400">Format : Élément1 % - Élément2 % (Ex: CO₂ 95% - Ar 2%)</small>
            @error('atmosphere')
                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Créer</button>
    </form>
@endsection
