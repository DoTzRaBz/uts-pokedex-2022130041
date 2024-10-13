@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-5">Pokemon List</h1>
    <a href="{{ route('pokemon.create') }}" class="btn btn-primary mb-3">Add New Pokemon</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Species</th>
                    <th scope="col">Primary Type</th>
                    <th scope="col">Legendary Pokemon</th>
                    <th scope="col">Power</th>
                    <th scope="col">Image</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pokemons as $pokemon)
                <tr>
                    <td><a href="{{ route('pokemon.show', $pokemon->id) }}">{{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }}</a></td>
                    <td>{{ $pokemon->name }}</td>
                    <td>{{ $pokemon->species }}</td>
                    <td>{{ $pokemon->primary_type }}</td>
                    <td>
                        @if ($pokemon->is_legendary == 1)
                            <span style="background-color: #ffd700; color: #333;" class="badge">Yes</span>
                        @else
                            <span style="background-color: #ff0000; color: #000;" class="badge">No</span>
                        @endif
                    </td>
                    <td>{{ $pokemon->hp + $pokemon->attack + $pokemon->defense }}</td>
                    <td class="text-center">
                        @if ($pokemon->photo)
                            <img src="{{ Storage::url($pokemon->photo) }}" alt="Pokemon Photo" class="img-fluid" style="width: 50px; height: 50px;">
                        @else
                            <p>No image</p>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('pokemon.edit', $pokemon->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('pokemon.destroy', $pokemon->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $pokemons->links() }}
</div>
@endsection
