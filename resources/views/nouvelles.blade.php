<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelles</title>
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
                        <a class="nav-link active" href="nouvelles">Nouvelles</a>
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
                        <a class="nav-link" href="partenaires">Partenaires</a>
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
    <div class="container">
        <h1>Nouvelles</h1>
        <div>
            @if(count($nouvelles) == 0)
            <h2 class="mt-5 mb-4">Aucune nouvelle en ce moment</h2>
            @endif
            <ul class="list-group">
                @foreach($nouvelles as $nouvelle)
                <li class="list-group-item">
                    <h2 class="h5">{{ $nouvelle->titre }}</h2>
                    <p class="badge bg-primary">{{ $nouvelle->auteur }}</p>
                    <p class="badge bg-primary">{{ $nouvelle->date_publication }}</p>
                    <p>{{ $nouvelle->contenu }}</p>
                    @if($nouvelle->url != null)
                    <div>
                        <img src='{{ asset($nouvelle->url) }}' alt="{{ $nouvelle->titre }}" class="img-fluid" style="width:200px">
                    </div>
                    @endif

                    <div class="mt-4">
                        <a href="nouvelles/modifier?id={{ $nouvelle->id }}" class="btn btn-primary">Modifier</a>
                        <a href="nouvelles/supprimer?id={{ $nouvelle->id }}" class="btn btn-danger">Supprimer</a>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        <a href="nouvelles/ajouter" class="btn btn-success mt-4">Ajouter une nouvelle</a>
    </div>
</body>

</html>