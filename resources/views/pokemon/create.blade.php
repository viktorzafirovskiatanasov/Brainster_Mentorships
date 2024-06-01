@extends('layout.master')
@section('content')
<div class="container my-5">
    <h1 class="mb-4">Create Pokemon</h1>
    <form method="post" action="{{ route('pokemon.store') }}">
        @csrf
        <div class="mb-3">
            @error('title')
                <div class="w-full rounded mb-3 bg-danger p-3 text-center">
                    <p class="m-0">{{ $message }}</p>
                </div>
            @enderror
            <label for="title" class="form-label">Title:</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            @error('image')
                <div class="w-full rounded mb-3 bg-danger p-3 text-center">
                    <p class="m-0">{{ $message }}</p>
                </div>
            @enderror
            <label for="url" class="form-label">Image URL:</label>
            <input type="text" name="url" class="form-control" id="url" value="{{ old('url') }}">
        </div>

        <div class="mb-3">
            @error('desc')
                <div class="w-full rounded mb-3 bg-danger p-3 text-center">
                    <p class="m-0">{{ $message }}</p>
                </div>
            @enderror
            <label for="desc" class="form-label">Description:</label>
            <textarea name="desc" class="form-control" id="desc" rows="3">{{ old('desc') }}</textarea>
        </div>
        <button type="submit" class="btn btn-outline-black">Create Pokemon</button>
    </form>
</div>
@endsection
