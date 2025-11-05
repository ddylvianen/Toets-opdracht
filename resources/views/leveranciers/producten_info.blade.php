<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geleverde producten</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
<div class="container mt-5">
    <h2>Geleverde producten</h2>

    @if (!empty($producten))

        {{-- Leverancier info --}}
        <div class="mb-3 p-3 border rounded shadow-sm">
            <p><strong>Naam Leverancier:</strong> {{ $leverancier->Naam }}</p>
            <p><strong>Contactpersoon:</strong> {{ $leverancier->Contactpersoon }}</p>
            <p><strong>Leveranciernummer:</strong> {{ $leverancier->Leveranciernummer }}</p>
            <p><strong>Mobiel:</strong> {{ $leverancier->Mobiel }}</p>
        </div>

        <table class="table table-striped table-bordered align-middle shadow-sm">
            <thead class="table-dark">
            <tr>
                <th>Naam Product</th>
                <th>Aantal in Magazijn</th>
                <th>Verpakkingseenheid</th>
                <th>Laatste levering</th>
                <th>Nieuwe levering</th>
            </tr>
            </thead>

            <tbody>

            {{-- Eventueel melding --}}
            @if(isset($message))
                <tr>
                    <td colspan="5" class="alert alert-warning text-danger text-center">
                        {{ $message }}
                    </td>
                </tr>

                <meta http-equiv="refresh" content="4;url={{ route('magazijn.index') }}">

            @else

                @forelse ($producten as $product)
                    <tr>
                        <td>{{ $product->Naam }}</td>
                        <td>{{ $product->Aantal }}</td>
                        <td>{{ $product->Eenheid }}</td>
                        <td>{{ $product->DatumLevering }}</td>
                        <td>
                            <a href="{{ route('leverancier.create', ['lvrnid'=>$leverancier->Id,'prdid'=>$product->Id]) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                     fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1
                                        0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Geen producten gevonden.</td>
                    </tr>
                @endforelse

            @endif

            </tbody>
        </table>

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
