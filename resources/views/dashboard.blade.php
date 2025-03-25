@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Bienvenue, {{ auth()->user()->username }}</h1>

    {{-- Info sur le rôle --}}
    <div class="card mb-4">
        <div class="card-body">
            <p>Votre rôle : 
                @switch(auth()->user()->role)
                    @case(1) <strong>Administrateur</strong> @break
                    @case(2) <strong>Préposé résidentiel</strong> @break
                    @case(3) <strong>Préposé d’affaire</strong> @break
                    @default <strong>Inconnu</strong>
                @endswitch
            </p>
        </div>
    </div>

    {{-- Section admin seulement --}}
    @if(auth()->user()->role == 1)
        <div class="card border-danger mb-4">
            <div class="card-header bg-danger text-white">Paramètres de sécurité (Admin uniquement)</div>
            <div class="card-body">
                <ul>
                    <li>🛡️ Modifier les mots de passe</li>
                    <li>👥 Gérer les utilisateurs</li>
                    <li>⚙️ Réinitialiser les paramètres</li>
                </ul>
            </div>
        </div>
    @endif

    {{-- Récupération des clients --}}
    @php
        $clients = \App\Models\Client::all();
    @endphp

    {{-- Clients résidentiels (admin et préposé résidentiel) --}}
    @if(auth()->user()->role == 1 || auth()->user()->role == 2)
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                Clients résidentiels
            </div>
            <div class="card-body">
                @php
                    $clientsResidentiels = $clients->where('role', 2);
                @endphp

                @if($clientsResidentiels->count())
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Prénom</th>
                            <th>Nom</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clientsResidentiels as $client)
                            <tr>
                                <td>{{ $client->first_name }}</td>
                                <td>{{ $client->last_name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    <p>Aucun client résidentiel enregistré.</p>
                @endif
            </div>
        </div>
    @endif

    {{-- Clients d'affaire (admin et préposé d'affaire) --}}
    @if(auth()->user()->role == 1 || auth()->user()->role == 3)
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                Clients d’affaire
            </div>
            <div class="card-body">
                @php
                    $clientsAffaires = $clients->where('role', 1);
                @endphp

                @if($clientsAffaires->count())
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Prénom</th>
                            <th>Nom</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clientsAffaires as $client)
                            <tr>
                                <td>{{ $client->first_name }}</td>
                                <td>{{ $client->last_name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    <p>Aucun client d’affaire enregistré.</p>
                @endif
            </div>
        </div>
    @endif
</div>
@endsection
