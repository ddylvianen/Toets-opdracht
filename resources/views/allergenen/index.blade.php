@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allergenen</title>
</head>
<body>
    <div class="container d-flex justify-content-center">
        <div class="col-md-8">

        
            <h2 class="my-3">{{ $title }}</h2>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Sluiten"></button>
                </div>
                <meta http-equiv="refresh" content="3;url={{ route('allergeen.index') }}">
                @elseif (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Sluiten"></button>
                </div>
                <meta http-equiv="refresh" content="3;url={{ route('allergeen.index') }}">
            @endif

            <a href="{{ route('allergeen.create') }}" class="btn btn-primary my-3">Nieuw Allergeen</a>
            <a href="/magazijn" class="btn btn-primary my-3">magazijn</a>
        
            <table class="table table-striped table-bordered align-middle shadow-sm">
                <thead>
                    <th>Naam</th>
                    <th>Omschrijving</th>
                    <th class="text-center">Verwijder</th>
                    <th class="text-center">Wijzig</th>
                    <th class="text-center">Details</th>
                </thead>
                <tbody>            
                    @forelse ($allergenen as $allergeen) 
                        <tr>
                            <td>{{ $allergeen->Naam }}</td>
                            <td>{{ $allergeen->Omschrijving }} </td>
                            <td class="text-center">
                                <form action="{{ route('allergeen.destroy', $allergeen->Id) }}" method="POST" 
                                    onsubmit="return confirm('Weet je zeker dat je dit allergeen wilt verwijderen?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Verwijderen</button>
                                </form>
                            </td>
                            <td class="text-center">
                                <form action="{{ route('allergeen.edit', $allergeen->Id) }}" method="POST">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn btn-success btn-sm">Wijzig</button>
                                </form>
                            </td>
                            <td class="text-center">
                                <form action="{{ route('allergeen.show', $allergeen->Id) }}" method="POST">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn btn-warning btn-sm">Details</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">Geen allergenen beschikbaar</td>
                        </tr>  
                    @endforelse          
                </tbody>
            </table>

        </div>
    </div>
</body>
</html>
