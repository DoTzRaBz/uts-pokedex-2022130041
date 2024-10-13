@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        @if ($pokemon->photo)
            <img src="{{ asset('storage/' . $pokemon->photo) }}" class="card-img-top" alt="Pokemon Image">
        @else
            <img src="https://placehold.co/200" class="card-img-top" alt="Pokemon Image Placeholder">
        @endif
    </div>
    <div class="container">
        <div class="row">
            @foreach ($pokemons as $pokemon)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ $pokemon->photo ? Storage::url($pokemon->photo) : 'https://placehold.co/200' }}"
                            class="card-img-top" alt="Pokemon Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $pokemon->name }}</h5>
                            <p class="card-text">ID: {{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }}</p>
                            <p class="card-text">Type: @foreach ($pokemon->types as $type)
                                    <span class="badge badge-pill badge-{{ $type->name }}">{{ $type->name }}</span>
                                @endforeach
                            </p>
                            <a href="{{ route('pokemon.show', $pokemon) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $pokemons->links() }}
    </div>
@endsection
