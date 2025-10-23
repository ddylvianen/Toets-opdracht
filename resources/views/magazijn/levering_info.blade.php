<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leveringsinformatie Product</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="container mt-5">
    <h2>Leveringsinformatie Product</h2>

    @if(isset($message))
        <div class="alert alert-warning mt-3">
            {{ $message }}
        </div>
        <meta http-equiv="refresh" content="4;url={{ route('magazijn.index') }}">
    @elseif(isset($leveringen) && $leveringen->count() > 0)

        {{-- Toon leverancierinformatie één keer boven de tabel --}}
        @php
            $levering = $leveringen->first(); // pak de eerste levering
        @endphp
        <div class="mb-3 p-3 border rounded shadow-sm">
            <p><strong>Naam Leverancier:</strong> {{ $levering->LeverancierNaam }}</p>
            <p><strong>Contactpersoon:</strong> {{ $levering->Contactpersoon }}</p>
            <p><strong>Leveranciernummer:</strong> {{ $levering->Leveranciernummer }}</p>
            <p><strong>Mobiel:</strong> {{ $levering->Mobiel }}</p>
        </div>

        {{-- Tabel met alleen Allergeen Naam en Omschrijving --}}
        <table class="table table-striped table-bordered align-middle shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>Naam Product</th>
                    <th>Datum laaste levering</th>
                    <th>Aantal</th>
                    <th>Eerstvolgede levering</th>
                </tr>
            </thead>
            <tbody>
                @foreach($leveringen as $levering)
                    <tr>
                        <td>{{ $product->Naam }}</td>
                        <td>{{ $levering->DatumLevering  }}</td>
                        <td>{{ $levering->Aantal  }}</td>
                        <td>{{ $levering->DatumEerstVolgendeLevering }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('magazijn.index') }}" class="btn btn-secondary mt-3">Terug naar overzicht</a>
    @else
        <div class="alert alert-info mt-3">
            Er zijn geen leveringen bekend voor dit product.
        </div>
        <a href="{{ route('magazijn.index') }}" class="btn btn-secondary mt-3">Terug naar overzicht</a>
    @endif

</div>
</body>
</html>
