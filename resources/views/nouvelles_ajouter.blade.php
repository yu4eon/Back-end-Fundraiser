<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une nouvelle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <h1>Ajouter une nouvelle</h1>
        <form action="ajouter_submit" method="POST" enctype="multipart/form-data" class="mt-3">
            @csrf
            <div class="mb-3">
                <label for="titre" class="form-label">Titre</label>
                <input type="text" class="form-control" id="titre" name="titre">
            </div>
            <div class="mb-3">
                <label for="auteur" class="form-label">Auteur</label>
                <input type="text" class="form-control" id="auteur" name="auteur">
            </div>
            <div class="mb-3">
                <label for="date_publication" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date_publication">
            </div>
            <div class="mb-3">
                <label for="contenu" class="form-label">Contenu</label>
                <textarea class="form-control" id="contenu" name="contenu"></textarea>
            </div>
            <div class="mb-3">
                <label for="url" class="form-label">URL</label>
                <input type="file" class="form-control" id="url" name="url">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Ajouter</button>
                <a href="../nouvelles" class="btn btn-secondary">Annuler l'ajout</a>
            </div>
        </form>
    </div>
</body>

</html>