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
        @if (isset($product))
            <div class="mb-3 p-3 border rounded shadow-sm bg-light">
                <p><strong>Productnaam:</strong> {{ $product->Naam }}</p>
                <p><strong>Barcode:</strong> {{ $product->Barcode }}</p>
            </div>
        @endif
        <table class="table table-striped table-bordered align-middle shadow-sm mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Allergeen Naam</th>
                    <th>Omschrijving</th>
                </tr>

                
            </thead>
            <tbody>
                @if (isset($message))
                    <tr>
                        <td colspan="4" class="alert alert-warning text-danger">
                            {{ $message }}
                        </td>
                    </tr>
                    <meta http-equiv="refresh" content="4;url={{ route('magazijn.index') }}">
                @else
                    @foreach ($allergenen as $allergeen)
                        <tr>
                            <td>{{ $allergeen->AllergeenNaam }}</td>
                            <td>{{ $allergeen->Omschrijving }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

        <a href="{{ route('magazijn.index') }}" class="btn btn-secondary mt-3">Terug naar overzicht</a>
    </div>
</body>

</html>
