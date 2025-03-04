@extends('layouts.app')

@section('title', 'Liste des Planètes')

@section('content')
    <h2>🌍 Liste des Planètes</h2>

    {{-- Alignement parfait des boutons --}}
    <div class="page-content">
        <a href="{{ route('planets.create') }}" class="btn btn-primary">Ajouter une Planète</a>
    </div>

    {{-- Formulaire pour sélectionner les planètes à comparer --}}
    <form action="{{ route('planets.compare') }}" method="GET">
        <table class="table">
            <thead>
                <tr>
                    <th>Sélection</th> {{-- Nouvelle colonne pour les cases à cocher --}}
                    <th>Nom</th>
                    <th>Type</th>
                    <th>Taille (km)</th>
                    <th>Distance (millions km)</th>
                    <th>Gravité (m/s²)</th>
                    <th>Atmosphère</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($planets as $planet)
                <tr>
                    {{-- Case à cocher pour sélectionner une planète --}}
                    <td>
                        <input type="checkbox" name="planets[]" value="{{ $planet->id }}" class="planet-checkbox">
                    </td>

                    <td>{{ $planet->name }}</td>
                    <td>{{ $planet->type }}</td>
                    <td>{{ number_format($planet->size, 0, ',', ' ') }}</td>
                    <td>{{ $planet->distance }}</td>
                    <td>{{ $planet->gravity }}</td>
                    <td>{{ $planet->atmosphere }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Bouton pour comparer les planètes sélectionnées --}}
        <button type="submit" class="btn btn-warning mt-3" id="compare-btn" disabled>
            🔍 Lancer la comparaison
        </button>
    </form>

    {{-- Ajout d'un script pour activer/désactiver le bouton en fonction des cases cochées --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('.planet-checkbox');
            const compareBtn = document.getElementById('compare-btn');

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const checkedCount = document.querySelectorAll('.planet-checkbox:checked').length;
                    compareBtn.disabled = checkedCount < 2; // Activer si au moins 2 planètes sélectionnées
                });
            });
        });
    </script>
@endsection
