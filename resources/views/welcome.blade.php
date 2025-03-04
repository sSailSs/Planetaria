@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
    <div class="hero-section">
        <h2>Bienvenue sur Planétaria</h2>
        <p>Explorez et comparez les planètes du système solaire</p>
        <a href="{{ route('planets.index') }}" class="btn btn-primary">Voir les planètes</a>
    </div>
@endsection
