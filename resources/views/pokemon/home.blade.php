<!doctype html>
<html lang="en">

<head>
    <title>Pokemon</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container my-5">
        <div class="row ">
            @if (isset($pokemons))
            @foreach ($pokemons as $title => $pokemon)
           {{-- @php
            dd($pokemons);
           @endphp --}}
                <div class="col-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ $pokemon['image'] }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $pokemon['title'] }}</h5>
                            <a href="{{ route('pokemon.show', ['title' => $title]) }}"
                                class="btn btn-outline-dark">Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <a href="{{ route('pokemon.create') }}" class="btn btn-outline-dark mt-5">Make a new pokemon !!!</a>
            @else
            <p>“We don’t have any pokemons yet. <a href="{{ route('pokemon.create') }}">Would you like to add one?</a> </p>
            @endif 
           
           
           
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>