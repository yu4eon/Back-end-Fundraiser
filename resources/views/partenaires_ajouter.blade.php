<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un partenaire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-3">Ajouter un partenaire</h1>
        <form action="ajouter_submit" method="POST" enctype="multipart/form-data" class="mt-3">
            @csrf
            <div class="mb-3">
                <label for="nom" class="form-label">Nom du partenaire*</label>
                <input type="text" name="nom" class="form-control" required placeholder="Nom">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description du partenaire*</label>
                <textarea name="description" class="form-control" required>Description du partenaire</textarea>
            </div>
            <div class="mb-3">
                <label for="url" class="form-label">Logo du partenaire*</label>
                <input type="file" name="url" class="form-control" required>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success mt-4">Ajouter</button>
                <a href="../partenaires" class="btn btn-secondary">Annuler l'ajout</a>
            </div>
        </form>
    </div>

</body>
</html>