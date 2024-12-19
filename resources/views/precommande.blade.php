<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Précommande</title>
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
                        <a class="nav-link active" href="precommande">Précommande</a>
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
        <h1>Précommande</h1>
        <p class="alert alert-info">À noter : vous ne pouvez pas supprimer ou modifier ces précommandes, c'est seulement pour consulter les précommandes éxistantes</p>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Courriel</th>
                        <th scope="col">Téléphone</th>
                        <th scope="col">Adresse</th>
                        <th scope="col">Code Postal</th>
                        <th scope="col">Pays</th>
                        <th scope="col">Produit</th>
                        <th scope="col">Quantité</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($precommandes as $precommande)
                    <tr>
                        <td>{{ $precommande->nom }}</td>
                        <td>{{ $precommande->prenom }}</td>
                        <td>{{ $precommande->courriel }}</td>
                        <td>{{ $precommande->telephone }}</td>
                        <td>{{ $precommande->adresse }}</td>
                        <td>{{ $precommande->postal }}</td>
                        <td>{{ $precommande->pays }}</td>
                        <td>{{ $precommande->produit->nom }}</td>
                        <td>{{ $precommande->quantite }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>