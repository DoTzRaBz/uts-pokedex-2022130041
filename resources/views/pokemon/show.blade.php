// show.blade.php

@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-5">Pokemon Detail</h1>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $pokemon->name }}</h5>
                    <p class="card-text text-center">Species: {{ $pokemon->species }}</p>
                    <p class="card-text text-center">Primary Type: {{ $pokemon->primary_type }}</p>
                    <p class="card-text text-center">Legendary Pokemon:
                        @if ($pokemon->is_legendary == 1)
                            <span class="badge badge-success">Yes</span>
                        @else
                            <span class="badge badge-danger">No</span>
                        @endif
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="card-text">Weight: {{ $pokemon->weight }} kg</p>
                            <p class="card-text">Height: {{ $pokemon->height }} m</p>
                        </div>
                        <div class="col-md-6">
                            <p class="card-text">HP: {{ $pokemon->hp }}</p>
                            <p class="card-text">Attack: {{ $pokemon->attack }}</p>
                            <p class="card-text">Defense: {{ $pokemon->defense }}</p>
                        </div>
                    </div>
                    <p class="card-text">Power: {{ $pokemon->hp + $pokemon->attack + $pokemon->defense }}</p>
                    <div class="text-center">
                        @if ($pokemon->photo)
                            <img src="{{ Storage::url($pokemon->photo) }}" alt="Pokemon Photo" class="img-fluid" style="width: 200px; height: 200px;">
                        @else
                            <p>No image</p>
                        @endif
                    </div>
                </div>
                <div class="card-footer text-center">
                    <div class="row">
                        <div class="col-md-3">
                            @php
                                $minId = App\Models\Pokemon::min('id');
                            @endphp
                            <a href="#" class="btn btn-primary btn-block" onclick="checkPrevId({{ $pokemon->id }})">Sebelumnya</a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('pokemon.index') }}" class="btn btn-secondary btn-block">Kembali ke Index</a>
                        </div>
                        <div class="col-md-3">
                            @php
                                $maxId = App\Models\Pokemon::max('id');
                            @endphp
                            <a href="#" class="btn btn-primary btn-block" onclick="checkNextId({{ $pokemon->id }})">Selanjutnya</a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('pokemon.edit', $pokemon->id) }}" class="btn btn-warning btn-block">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function checkPrevId(currentId) {
        @php
            $minId = App\Models\Pokemon::min('id');
        @endphp
        if (currentId > {{ $minId }}) {
            window.location.href = "{{ route('pokemon.show', 'prevId') }}".replace('prevId', currentId - 1);
        } else {
            window.location.href = "{{ route('pokemon.index') }}";
        }
    }

    function checkNextId(currentId) {
        @php
            $maxId = App\Models\Pokemon::max('id');
        @endphp
        if (currentId < {{ $maxId }}) {
            window.location.href = "{{ route('pokemon.show', 'nextId') }}".replace('nextId', currentId + 1);
        } else {
            window.location.href = "{{ route('pokemon.index') }}";
        }
    }
</script>
@endsection
