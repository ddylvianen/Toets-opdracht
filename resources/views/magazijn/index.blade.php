@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht Magazijn Jamin</title>
</head>

<body>
    <div class="container d-flex justify-content-center">
        <div class="col-md-10">

            <h2 class="my-4 text-center">Overzicht Magazijn Jamin</h2>
            <a href="/allergeen" class="btn btn-primary my-3">Allergenen</a>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Sluiten"></button>
                </div>
                <meta http-equiv="refresh" content="3;url={{ route('magazijn.index') }}">
            @elseif (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Sluiten"></button>
                </div>
                <meta http-equiv="refresh" content="3;url={{ route('magazijn.index') }}">
            @endif

            <table class="table table-striped table-bordered align-middle shadow-sm">
                <thead class="table-dark text-center">
                    <tr>
                        <th>Barcode</th>
                        <th>Naam</th>
                        <th>Verpakkingseenheid</th>
                        <th>Aantal aanwezig</th>
                        <th>Allergenen Info</th>
                        <th>Leverantie Info</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse($producten as $product)
                        <tr>
                            <td>{{ $product->Barcode }}</td>
                            <td>{{ $product->Naam }}</td>
                            <td>{{ $product->VerpakkingsEenheid ?? '' }}</td>
                            <td>{{ $product->AantalAanwezig }}</td>
                            <td>
                                <a href="{{ route('magazijn.allergenen', $product->Id) }}"
                                   class="btn btn-warning btn-sm">
                                   Allergenen Info
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('magazijn.levering', $product->Id) }}"
                                   class="btn btn-info btn-sm">
                                   Leverantie Info
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Geen producten beschikbaar</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</body>
</html>
