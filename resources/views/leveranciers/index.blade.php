@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht Leveranciers</title>
</head>

<body>
    <div class="container d-flex justify-content-center">
        <div class="col-md-10">

            <h2 class="my-4 text-center">Overzicht Leveranciers</h2>
            <a href="/allergeen" class="btn btn-primary my-3">Allergenen</a>
            <a href="/Magazijn" class="btn btn-primary my-3">Magazijn</a>

            <table class="table table-striped table-bordered align-middle shadow-sm">
                <thead class="table-dark text-center">
                    <tr>
                        <th>Naam</th>
                        <th>Contactpersoon</th>
                        <th>Leveranciernummer</th>
                        <th>Mobiel</th>
                        <th>Aantal verschillende producten</th>
                        <th>Toon producten</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                   
                    @forelse($leveranciers as $leverancier)
                        
                        <tr>
                            <td>{{ $leverancier->Naam}}</td>
                            <td>{{ $leverancier->Contactpersoon }}</td>
                            <td>{{ $leverancier->Leveranciernummer }}</td>
                            <td>{{ $leverancier->Mobiel }}</td>
                            <td>{{ $leverancier->Aantalproducten }}</td>
                            <td>
                                <a href="{{ route('leverancier.producteninfo', $leverancier->Id)}}" class="flex justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-box" viewBox="0 0 16 16">
                                        <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154
                                            3.5zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1
                                            4.239v7.923zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5
                                            0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372
                                            0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464z" />
                                    </svg>
                                </a>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Geen Leveranciers beschikbaar</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</body>

</html>
