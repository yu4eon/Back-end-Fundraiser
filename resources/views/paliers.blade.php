<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paliers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container mb-4">
        <h1 class="mb-4">Paliers</h1>
        @if(count($paliers) == 0)
        <h2 class="mt-5 mb-4">Aucun palier en ce moment</h2>
        @endif
        <div>
            <ul class="list-group">
                @foreach($paliers as $palier)
                <li class="list-group-item">
                    <h2 class="h5">{{ $palier->nom }}</h2>
                    <p>Description : {{ $palier->description}}</p>
                    <a href="paliers/modifier?id={{ $palier->id }}" class="btn btn-primary">Modifier</a>
                    <a href="paliers/supprimer?id={{ $palier->id }}" class="btn btn-danger">Supprimer</a>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="mt-4">
            <a href="paliers/ajouter" class="btn btn-success mt-4">Ajouter un palier</a>
            <a href="../produits" class="btn btn-primary mt-4">Retour aux produits</a>
        </div>
    </div>
</body>

</html>