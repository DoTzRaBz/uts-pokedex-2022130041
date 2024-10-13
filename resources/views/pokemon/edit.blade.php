@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Pokemon</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pokemon.update', $pokemon->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $pokemon->name) }}" required>
        </div>
        <div class="mb-3">
            <label for="species" class="form-label">Species</label>
            <input type="text" name="species" class="form-control" value="{{ old('species', $pokemon->species) }}" required>
        </div>
        <div class="mb-3">
            <label for="primary_type" class="form-label">Primary Type</label>
            <select name="primary_type" class="form-select" required>
                <option value="">Select Type</option>
                @foreach(['Grass', 'Fire', 'Water', 'Bug', 'Normal', 'Poison', 'Electric', 'Ground', 'Fairy', 'Fighting', 'Psychic', 'Rock', 'Ghost', 'Ice', 'Dragon', 'Dark', 'Steel', 'Flying'] as $type)
                    <option value="{{ $type }}" {{ old('primary_type', $pokemon->primary_type) == $type ? 'selected' : '' }}>{{ $type }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="weight" class="form-label">Weight</label>
            <input type="number" name="weight" class="form-control" value="{{ old('weight', $pokemon->weight) }}" step="0.01">
        </div>
        <div class="mb-3">
            <label for="height" class="form-label">Height</label>
            <input type="number" name="height" class="form-control" value="{{ old('height', $pokemon->height) }}" step="0.01">
        </div>
        <div class="mb-3">
            <label for="hp" class="form-label">HP</label>
            <input type="number" name="hp" class="form-control" value="{{ old('hp', $pokemon->hp) }}" required>
        </div>
        <div class="mb-3">
            <label for="attack" class="form-label">Attack</label>
            <input type="number" name="attack" class="form-control" value="{{ old('attack', $pokemon->attack) }}" required>
        </div>
        <div class="mb-3">
            <label for="defense" class="form-label">Defense</label>
            <input type="number" name="defense" class="form-control" value="{{ old('defense', $pokemon->defense) }}" required>
        </div>
        <div class="mb-3">
            <label for="is_legendary" class="form-label">Is Legendary</label>
            <input type="checkbox" name="is_legendary" class="form-check-input" value="1" {{ old('is_legendary', $pokemon->is_legendary) ? 'checked' : '' }}>
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input type="file" name="photo" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update Pokemon</button>
    </form>
</div>
@endsection
