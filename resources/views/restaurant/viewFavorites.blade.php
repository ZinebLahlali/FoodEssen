<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes restaurants favoris</title>

    {{-- Bootstrap (optionnel mais pratique) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <h1 class="mb-4 text-center">🍽️ Mes restaurants favoris</h1>

    {{-- Message si aucun favori --}}
    @if ($restaurants->isEmpty())
        <div class="alert alert-info text-center">
            Aucun restaurant en favori pour le moment ❤️
        </div>
    @else
        <div class="row">
            @foreach ($restaurants as $rest)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">

                        {{-- Image --}}
                        @if ($rest->image)
                            <img src="{{ asset('storage/' . $rest->image) }}"
                                 class="card-img-top"
                                 alt="{{ $rest->name }}">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">
                                {{ $rest->name }}
                            </h5>

                            <p class="card-text">
                                {{$rest->type_de_cuisine }}
                            </p>

                            <p class="text-muted mb-0">
                                📍 {{ $rest->localisation }}
                            </p>
                        </div>
                        
                    </div>
                </div>
            @endforeach
        </div>
    @endif

</div>

</body>
</html>
