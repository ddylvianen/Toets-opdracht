<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Levering product</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
<div class="container mt-5">
    <h2>Levering product</h2>

    @if (!empty($product) || !empty($leverancier))

        {{-- Leverancier info --}}
        <div class="mb-3 p-3 border rounded shadow-sm">
            <p><strong>Product:</strong> {{ $product->Naam }}</p>
            <p><strong>Contactpersoon:</strong> {{ $leverancier->Contactpersoon }}</p>
            <p><strong>Mobiel:</strong> {{ $leverancier->Mobiel }}</p>
        </div>

        <div class="mb-3 p-3 border rounded shadow-sm">
            <form action="{{ route('leverancier.store') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="InputName" class="form-label">Aantal producteenheden</label>
                    <input name="name" type="text" class="form-control" id="eenheid" aria-describedby="nameHelp">
                </div>
                <div class="mb-3">
                    <label for="InputDescription" class="form-label">Datum eerstvolgende levering</label>
                    <input name="description" type="date" class="form-control" id="eerstvolgendelevering" aria-describedby="descriptionHelp">
                </div>
            </form>
        </div>
        <a href="{{ route('leverancier.index') }}" class="btn btn-secondary mt-3">Terug naar overzicht</a>

    @else
        <div class="alert alert-info mt-3">
            Er zijn geen leveringen bekend voor dit product.
        </div>

        <a href="{{ route('leverancier.index') }}" class="btn btn-secondary mt-3">Terug naar overzicht</a>
    @endif

</div>
</body>
</html>
