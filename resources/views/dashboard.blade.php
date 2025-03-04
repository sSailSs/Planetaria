@extends('layouts.app')

@section('title', 'Tableau de bord')

@section('content')
    <h2>👤 Tableau de bord</h2>
    <p>Bienvenue, {{ auth()->user()->name }} !</p>
@endsection
