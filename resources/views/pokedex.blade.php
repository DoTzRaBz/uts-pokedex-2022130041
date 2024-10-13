<!-- resources/views/pokedex.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Pokedex</h1>

    <div class="row">
        @foreach($pokemons as $pokemon)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ $pokemon->photo ? Storage::url($pokemon->photo) : 'https://placehold.co/200' }}" alt="{{ $pokemon->name }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('pokemon.show', $pokemon->id) }}">{{ $pokemon->name }}</a>
                        </h5>
                        <p class="card-text">
                            <span class="badge bg-secondary">{{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }}</span>
                        </p>
                        @if($pokemon->types)
                            <p class="card-text">
                                @foreach($pokemon->types as $type)
                                    <span class="badge rounded-pill bg-{{ $type->color }}">{{ $type->name }}</span>
                                @endforeach
                            </p>
                        @endif
                        <button class="btn btn-primary" data-toggle="modal" data-target="#pokemon-modal-{{ $pokemon->id }}">See Detail</button>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="pokemon-modal-{{ $pokemon->id }}" tabindex="-1" role="dialog" aria-labelledby="pokemon-modal-label-{{ $pokemon->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="pokemon-modal-label-{{ $pokemon->id }}">{{ $pokemon->name }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                            <h2>{{ $pokemon->name }}</h2>
                            <img src="{{ $pokemon->photo ? Storage::url($pokemon->photo) : 'https://placehold.co/200' }}" alt="{{ $pokemon->name }}">
                            <p>HP: {{ $pokemon->hp }}</p>
                            <p>Attack: {{ $pokemon->attack }}</p>
                            <p>Defense: {{ $pokemon->defense }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $pokemons->links() }}
    </div>
</div>
@endsection
