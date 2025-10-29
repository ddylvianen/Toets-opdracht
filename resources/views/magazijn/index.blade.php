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
                                <a href="{{ route('magazijn.allergenen', $product->Id) }}" class="flex justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-question-lg" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.475 5.458c-.284 0-.514-.237-.47-.517C4.28 3.24 5.576 2 7.825 2c2.25 0 3.767 1.36 3.767 3.215 0 1.344-.665 2.288-1.79 2.973-1.1.659-1.414 1.118-1.414 2.01v.03a.5.5 0 0 1-.5.5h-.77a.5.5 0 0 1-.5-.495l-.003-.2c-.043-1.221.477-2.001 1.645-2.712 1.03-.632 1.397-1.135 1.397-2.028 0-.979-.758-1.698-1.926-1.698-1.009 0-1.71.529-1.938 1.402-.066.254-.278.461-.54.461h-.777ZM7.496 14c.622 0 1.095-.474 1.095-1.09 0-.618-.473-1.092-1.095-1.092-.606 0-1.087.474-1.087 1.091S6.89 14 7.496 14" />
                                    </svg>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('magazijn.levering', $product->Id) }}" class="flex justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-question-lg" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.475 5.458c-.284 0-.514-.237-.47-.517C4.28 3.24 5.576 2 7.825 2c2.25 0 3.767 1.36 3.767 3.215 0 1.344-.665 2.288-1.79 2.973-1.1.659-1.414 1.118-1.414 2.01v.03a.5.5 0 0 1-.5.5h-.77a.5.5 0 0 1-.5-.495l-.003-.2c-.043-1.221.477-2.001 1.645-2.712 1.03-.632 1.397-1.135 1.397-2.028 0-.979-.758-1.698-1.926-1.698-1.009 0-1.71.529-1.938 1.402-.066.254-.278.461-.54.461h-.777ZM7.496 14c.622 0 1.095-.474 1.095-1.09 0-.618-.473-1.092-1.095-1.092-.606 0-1.087.474-1.087 1.091S6.89 14 7.496 14" />
                                    </svg>
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
