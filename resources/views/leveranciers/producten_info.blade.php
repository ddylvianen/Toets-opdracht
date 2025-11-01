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

        @if (isset($leveringen) && count($leveringen) > 0)

            {{-- Toon leverancierinformatie één keer boven de tabel --}}
            @php
                $levering = $leveringen[0]; // pak de eerste levering
            @endphp
            <div class="mb-3 p-3 border rounded shadow-sm">
                <p><strong>Naam Leverancier:</strong> {{ $levering->LeverancierNaam }}</p>
                <p><strong>Contactpersoon:</strong> {{ $levering->Contactpersoon }}</p>
                <p><strong>Leveranciernummer:</strong> {{ $levering->Leveranciernummer }}</p>
                <p><strong>Mobiel:</strong> {{ $levering->Mobiel }}</p>
            </div>

            <table class="table table-striped table-bordered align-middle shadow-sm">
                <thead class="table-dark">
                    <tr>
                        <th>Naam Product</th>
                        <th>Aantal in Magazijn</th>
                        <th>verpakkingeenheid</th>
                        <th>Laatste levering</th>
                        <th>Nieuwe levering</th>
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
                        @foreach ($producten as $product)
                            <tr>
                                <td>{$product->Naam}</td>
                                <td>{$product->Aantalinmagazijn}</td>
                                <td>{$product->verpakkingseenheid}</td>
                                <td>{$product->Laatstelevering}</td>
                                <td>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1
                                            0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                    </svg>
                                </td>
                            </tr>
                            @empty
                                <tr>
                            @endforeach
                        @endif
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
