<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <h1 class="mt-3">Ajouter un Produit</h1>
        <form action="ajouter_submit" method="POST" enctype="multipart/form-data" class="mt-3">
            @csrf
            <div class="mb-3">
                <label for="nom" class="form-label">Nom*</label>
                <input type="text" name="nom" class="form-control" required placeholder="Nom">
            </div>
            <div class="mb-3">
                <label for="palier_id" class="form-label">Palier*</label>
                <select name="palier_id" class="form-select" required>
                    @foreach($paliers as $palier)
                    <option value="{{ $palier->id }}">
                        {{ $palier->nom }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="materiel_id">Matériel*</label>
                <select name="materiel_id" class="form-select" required>
                    @foreach($materiaux as $materiel)
                    <option value="{{ $materiel->id }}">
                        {{ $materiel->nom }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="date_sortie" class="form-label">Date de sortie*</label>
                <input type="date" name="date_sortie" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="taille">Taille (pouces)*</label>
                <input type="number" name="taille" class="form-control" min=0 required>
            </div>
            <div class="mb-3">
                <label for="poids">Poids (kg)*</label>
                <input type="number" name="poids" class="form-control" min=0 step="0.1" required>
            </div>
            <div class="mb-3">
                <label for="mot_inspiration">Mot d'inspiration*</label>
                <input type="text" name="mot_inspiration" class="form-control" required>
            </div>
            <div class="container">
                <h2>Avantages</h2>
                <div class="mb-3">
                    <label for="avantage1">Avantage 1*</label>
                    <input type="text" name="avantage1" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="avantage2">Avantage 2</label>
                    <input type="text" name="avantage2" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="avantage3">Avantage 3</label>
                    <input type="text" name="avantage3" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="avantage4">Avantage 4</label>
                    <input type="text" name="avantage4" class="form-control">
                </div>
            </div>
            <div class="container">
                <h2>Caractéristiques</h2>
                <div class="mb-3">
                    <label for="caracteristique1">Caractéristique 1*</label>
                    <input type="text" name="caracteristique1" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="caracteristique2">Caractéristique 2</label>
                    <input type="text" name="caracteristique2" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="caracteristique3">Caractéristique 3</label>
                    <input type="text" name="caracteristique3" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="caracteristique4">Caractéristique 4</label>
                    <input type="text" name="caracteristique4" class="form-control">
                </div>
            </div>
            <div class="container">
                <h2>Spécifications</h2>
                <div class="mb-3">
                    <label for="specification1">Spécification 1*</label>
                    <input type="text" name="specification1" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="specification2">Spécification 2</label>
                    <input type="text" name="specification2" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="specification3">Spécification 3</label>
                    <input type="text" name="specification3" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="specification4">Spécification 4</label>
                    <input type="text" name="specification4" class="form-control">
                </div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description*</label>
                <textarea name="description" class="form-control" required>Description</textarea>
            </div>
            <div class="mb-3">
                <label for="prix" class="form-label">Prix*</label>
                <input type="number" name="prix" min=0 step=".01" class="form-control" required>
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
                <button type="submit" class="btn btn-primary">Ajouter</button>
                <a href="../produits" class="btn btn-secondary">Annuler l'ajout</a>
            </div>
        </form>
    </div>
    </form>
</body>
</html>