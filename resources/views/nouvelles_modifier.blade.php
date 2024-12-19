<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une nouvelle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Modifier une nouvelle</h1>
        <form action="modifier_submit" method="POST" enctype="multipart/form-data" class="mt-3">
            @csrf
            <input type="hidden" name="id" value="{{ $nouvelle->id }}">
            <div class="mb-3">
                <label for="titre" class="form-label">Titre</label>
                <input type="text" class="form-control" id="titre" name="titre" value="{{ $nouvelle->titre }}">
            </div>
            <div class="mb-3">
                <label for="auteur" class="form-label">Auteur</label>
                <input type="text" class="form-control" id="auteur" name="auteur" value="{{ $nouvelle->auteur }}">
            </div>
            <div class="mb-3">
                <label for="date_publication" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date_publication" value="{{ $nouvelle->date_publication }}">
            </div>
            <div class="mb-3">
                <label for="contenu" class="form-label">Contenu</label>
                <textarea class="form-control" id="contenu" name="contenu">{{ $nouvelle->contenu }}</textarea>
            </div>
            @if($nouvelle->url != null)
            <div>
                <h2>Image actuelle</h2>
                <img src='{{ asset($nouvelle->url) }}' alt="Image du produit" class="img-fluid" style="width:200px">
            </div>
            @endif
            <div class="mb-3">
                <label for="url" class="form-label">URL</label>
                <input type="file" class="form-control" id="url" name="url">
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Modifier</button>
                <a href="../nouvelles" class="btn btn-secondary">Annuler la modification</a>
            </div>
        </form>
</body>
</html>