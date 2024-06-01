<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Pokemon</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="bg-light">
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
                <label for="image" class="form-label">Image URL:</label>
                <input type="text" name="image" class="form-control" id="image" value="{{ old('image') }}">
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

    <!-- Include Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
