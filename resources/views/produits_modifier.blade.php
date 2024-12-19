<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <h1 class="mt-3">Modifier un Produit</h1>
        <form action="modifier_submit" method="POST" enctype="multipart/form-data" class="mt-3">
            @csrf
            <input type="hidden" name="id" value="{{ $produit->id }}">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="nom" value="{{ $produit->nom }}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="palier_id" class="form-label">Palier</label>
                <select name="palier_id" class="form-select">
                    @foreach($paliers as $palier)
                    <option value="{{ $palier->id }}" @if($palier->id == $produit->palier_id)
                        selected
                        @endif>
                        {{ $palier->nom }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="materiel_id">Matériel</label>
                <select name="materiel_id" class="form-select">
                    @foreach($materiaux as $materiel)
                    <option value="{{ $materiel->id }}" @if($materiel->id == $produit->materiel_id)
                        selected
                        @endif>
                        {{ $materiel->nom }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="taille">Taille (pouces)</label>
                <input type="number" name="taille" value="{{ $produit->taille }}" class="form-control" min=0>
            </div>
            <div class="mb-3">
                <label for="poids">Poids (kg)</label>
                <input type="number" name="poids" value="{{ $produit->poids }}" class="form-control" min=0 step="0.1">
            </div>
            <div class="mb-3">
                <label for="poids">Poids (kg)</label>
                <input type="number" name="poids" value="{{ $produit->poids }}" class="form-control" min=0 step="0.1">
            </div>
            <div class="mb-3">
                <label for="mot_inspiration">Mot d'inspiration</label>
                <input type="text" name="mot_inspiration" value="{{ $produit->mot_inspiration }}" class="form-control">
            </div>
            <div class="container">
                <h2>Avantages</h2>
                <div class="mb-3">
                    <label for="avantage1">Avantage 1</label>
                    <input type="text" name="avantage1" value="{{ $produit->avantage1 }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="avantage2">Avantage 2</label>
                    <input type="text" name="avantage2" value="{{ $produit->avantage2 }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="avantage3">Avantage 3</label>
                    <input type="text" name="avantage3" value="{{ $produit->avantage3 }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="avantage4">Avantage 4</label>
                    <input type="text" name="avantage4" value="{{ $produit->avantage4 }}" class="form-control">
                </div>
            </div>
            <div class="container">
                <h2>Caractéristiques</h2>
                <div class="mb-3">
                    <label for="caracteristique1">Caractéristique 1</label>
                    <input type="text" name="caracteristique1" value="{{ $produit->caracteristique1 }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="caracteristique2">Caractéristique 2</label>
                    <input type="text" name="caracteristique2" value="{{ $produit->caracteristique2 }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="caracteristique3">Caractéristique 3</label>
                    <input type="text" name="caracteristique3" value="{{ $produit->caracteristique3 }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="caracteristique4">Caractéristique 4</label>
                    <input type="text" name="caracteristique4" value="{{ $produit->caracteristique4 }}" class="form-control">
                </div>
            </div>
            <div class="container">
                <h2>Spécifications</h2>
                <div class="mb-3">
                    <label for="specification1">Spécification 1</label>
                    <input type="text" name="specification1" value="{{ $produit->specification1 }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="specification2">Spécification 2</label>
                    <input type="text" name="specification2" value="{{ $produit->specification2 }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="specification3">Spécification 3</label>
                    <input type="text" name="specification3" value="{{ $produit->specification3 }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="specification4">Spécification 4</label>
                    <input type="text" name="specification4" value="{{ $produit->specification4 }}" class="form-control">
                </div>
            </div>
            <div class="mb-3">
                <label for="date_sortie" class="form-label">Date de sortie</label>
                <input type="date" name="date_sortie" value="{{ $produit->date_sortie }}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control">{{ $produit->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="prix" class="form-label">Prix</label>
                <input type="number" name="prix" value="{{ $produit->prix }}" min=0 step=".01" class="form-control">
            </div>
            <div class="row">
                @if($produit->url1 != null)
                <div class="col">
                    <h2>Image 1</h2>
                    <img src='{{$produit->url1}}' alt="Image du produit" class="img-fluid" style="width:200px">
                </div>
                @endif
                @if($produit->url2 != null)
                <div class="col">
                    <h2>Image 2</h2>
                    <img src='{{$produit->url2}}' alt="Image du produit" class="img-fluid" style="width:200px">
                </div>
                @endif
                @if($produit->url3 != null)
                <div class="col">
                    <h2>Image 3</h2>
                    <img src='{{$produit->url3}}' alt="Image du produit" class="img-fluid" style="width:200px">
                </div>
                @endif
                @if($produit->url4 != null)
                <div class="col">
                    <h2>Image 4</h2>
                    <img src='{{$produit->url4}}' alt="Image du produit" class="img-fluid" style="width:200px">
                </div>
                @endif
            </div>

            <div class="mb-3">
                <label for="url1" class="form-label">Image 1</label>
                <input type="file" name="url1" class="form-control">
            </div>
            <div class="mb-3">
                <label for="url2" class="form-label">Image 2</label>
                <input type="file" name="url2" class="form-control">
            </div>
            <div class="mb-3">
                <label for="url3" class="form-label">Image 3</label>
                <input type="file" name="url3" class="form-control">
            </div>
            <div class="mb-3">
                <label for="url4" class="form-label">Image 4</label>
                <input type="file" name="url4" class="form-control">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Modifier</button>
                <a href="../produits" class="btn btn-secondary">Annuler la modification</a>
            </div>
        </form>
    </div>
</body>

</html>