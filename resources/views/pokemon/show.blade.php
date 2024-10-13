@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pokemon Detail</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $pokemon->name }}</h5>
            <p class="card-text">Species: {{ $pokemon->species }}</p>
            <p class="card-text">Primary Type: {{ $pokemon->primary_type }}</p>
            <p class="card-text">Weight: {{ $pokemon->weight }}</p>
            <p class="card-text">Height: {{ $pokemon->height }}</p>
            <p class="card-text">HP: {{ $pokemon->hp }}</p>
            <p class="card-text">Attack: {{ $pokemon->attack }}</p>
            <p class="card-text">Defense: {{ $pokemon->defense }}</p>
            <p class="card-text">Is Legendary: {{ $pokemon->is_legendary ? 'Yes' : 'No' }}</p>
            <img src="{{ asset('storage/' . $pokemon->photo) }}" alt="Pokemon Photo" class="img-fluid">
        </div>
    </div>
</div>
@endsection
