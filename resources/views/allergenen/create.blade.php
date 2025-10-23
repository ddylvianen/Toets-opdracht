@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allergeen toevoegen</title>
</head>
<body>
    <div class="container d-flex justify-content-center">
        <div class="col-md-8">
            <h2 class="my-3">{{ $title }}</h2>

            <form method="POST" action="{{ route('allergeen.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="InputName" class="form-label">Naam allergeen</label>
                    <input name="name" type="text" class="form-control" id="InputName" aria-describedby="nameHelp">
                    <div id="nameHelp" class="form-text">Noteer hier de naam van de allergeen.</div>
                </div>
                <div class="mb-3">
                    <label for="InputDescription" class="form-label">Omschrijving allergeen</label>
                    <input name="description" type="text" class="form-control" id="InputDescription" aria-describedby="descriptionHelp">
                    <div id="descriptionHelp" class="form-text">Noteer hier de omschrijving van de allergeen.</div>
                </div>
                
                <button type="submit" class="btn btn-primary">Verzenden</button>
            </form>

        </div>
    </div>
</body>
</html>
