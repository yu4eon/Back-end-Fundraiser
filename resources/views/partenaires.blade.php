<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partenaires</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="documentation">Documentation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="nouvelles">Nouvelles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="statistiques">Statistiques</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="produits">Produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="precommande">Précommande</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="infolettre">Infolettre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="partenaires">Partenaires</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="textes_dynamiques">Textes Dynamiques</a>
                    </li>
                    <li>
                        <a class="btn btn-danger" href="logout" id="deconnexion">Déconnexion</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <div class="container mb-4">
        <h1 class="mb-4">Partenaires</h1>
        @if(count($partenaires) == 0)
        <h2 class="mt-5 mb-4">Aucun partenaire en ce moment</h2>
        @endif
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($partenaires as $partenaire)
            <div class="col">
                <div class="card">
                    <img src='{{$partenaire->url}}' class="card-img-top" alt="logo du partenaire">
                    <div class="card-body">
                        <h5 class="card-title">{{ $partenaire->nom }}</h5>
                        <p class="card-text">{{ $partenaire->description }}</p>
                        <a href="partenaires/modifier?id={{ $partenaire->id }}" class="btn btn-primary">Modifier</a>
                        <a href="partenaires/supprimer?id={{ $partenaire->id }}" class="btn btn-danger">Supprimer</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-4">
            <a href="partenaires/ajouter" class="btn btn-primary">Ajouter un partenaire</a>
        </div>
    </div>
</body>

</html>