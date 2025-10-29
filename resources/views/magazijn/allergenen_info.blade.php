<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magazijn</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="container mt-5">
    <h2>Magazijn</h2>
    @if(isset($product))
        <div class="mb-3 p-3 border rounded shadow-sm bg-light">
            <p><strong>Productnaam:</strong> {{ $product->Naam }}</p>
            <p><strong>Barcode:</strong> {{ $product->Barcode }}</p>
        </div>
    @endif

    @if(isset($message))
        <div class="alert alert-warning mt-3">
            {{ $message }}
        </div>
        <meta http-equiv="refresh" content="4;url={{ route('magazijn.index') }}">
    @elseif(isset($allergenen))
        <table class="table table-striped table-bordered align-middle shadow-sm mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Allergeen Naam</th>
                    <th>Omschrijving</th>
                </tr>
            </thead>
            <tbody>
                @foreach($allergenen as $allergeen)
                    <tr>
                        <td>{{ $allergeen->AllergeenNaam }}</td>
                        <td>{{ $allergeen->Omschrijving }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('magazijn.index') }}" class="btn btn-secondary mt-3">Terug naar overzicht</a>
    @endif

</div>
</body>
</html>
