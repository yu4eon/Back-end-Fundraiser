<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Produits</title>
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
                        <a class="nav-link active" href="produits">Produits</a>
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
    <div class="container mb-4">
        <h1 class="mb-4">Produit</h1>
        @if(count($produits) == 0)
        <h2 class="mt-5 mb-4">Aucun produit en ce moment</h2>
        @endif
        <div>
            <ul class="list-group">
                @foreach($produits as $produit)
                <li class="list-group-item">
                    <h2>{{ $produit->nom }}</h2>
                    <p class="badge bg-primary">{{$produit->palier->nom}}</p>
                    <p class="badge bg-primary">{{$produit->materiel->nom}}</p>
                    <p class="badge bg-primary">{{$produit->date_sortie}}</p>
                    <p><i>{{ $produit->mot_inspiration }}</i></p>
                    <div class="row">
                        @if($produit->url1 != null)
                        <h2>Images</h2>
                        <div class="col">
                            <img src='{{$produit->url1}}' alt="{{ $produit->nom }}" class="img-fluid" style="width:200px">
                        </div>
                        @endif
                        @if($produit->url2 != null)
                        <div class="col">
                            <img src='{{$produit->url2}}' alt="{{ $produit->nom }}" class="img-fluid" style="width:200px">
                        </div>
                        @endif
                        @if($produit->url3 != null)
                        <div class="col">
                            <img src='{{$produit->url3}}' alt="{{ $produit->nom }}" class="img-fluid" style="width:200px">
                        </div>
                        @endif
                        @if($produit->url4 != null)
                        <div class="col">
                            <img src='{{$produit->url4}}' alt="{{ $produit->nom }}" class="img-fluid" style="width:200px">
                        </div>
                        @endif
                    </div>

                    <div class="container">
                        <h3>Avantages</h3>
                        <p>{{$produit->avantage1}}</p>
                        @if($produit->avantage2 != null)
                        <p>{{$produit->avantage2}}</p>
                        @endif
                        @if($produit->avantage3 != null)
                        <p>{{$produit->avantage3}}</p>
                        @endif
                        @if($produit->avantage4 != null)
                        <p>{{$produit->avantage4}}</p>
                        @endif
                    </div>
                    <div class="container">
                        <h3>Caractéristiques</h3>
                        <p>{{$produit->caracteristique1}}</p>
                        @if($produit->caracteristique2 != null)
                        <p>{{$produit->caracteristique2}}</p>
                        @endif
                        @if($produit->caracteristique3 != null)
                        <p>{{$produit->caracteristique3}}</p>
                        @endif
                        @if($produit->caracteristique4 != null)
                        <p>{{$produit->caracteristique4}}</p>
                        @endif
                    </div>
                    <div class="container">
                        <h3>Spécifications</h3>
                        <p>{{$produit->specification1}}</p>
                        @if($produit->specification2 != null)
                        <p>{{$produit->specification2}}</p>
                        @endif
                        @if($produit->specification3 != null)
                        <p>{{$produit->specification3}}</p>
                        @endif
                        @if($produit->specification4 != null)
                        <p>{{$produit->specification4}}</p>
                        @endif
                    </div>
                    <p>Taille : {{ $produit->taille }}"</p>
                    <p>Poids : {{ $produit->poids }}kg</p>
                    <div>
                        <p>{{ $produit->caracteristique1 }}</p>
                    </div>
                    <p>Description : {{ $produit->description }}</p>
                    <p>Prix : {{ $produit->prix }}$</p>
                    <a href="produits/modifier?id={{ $produit->id }}" class="btn btn-primary">Modifier</a>
                    <a href="produits/supprimer?id={{ $produit->id }}" class="btn btn-danger">Supprimer</a>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="mt-4">
            <a href="produits/ajouter" class="btn btn-success mt-4">Ajouter un produit</a>
            <a href="produits/paliers" class="btn btn-primary mt-4">Paliers</a>
        </div>
    </div>
</body>

</html>