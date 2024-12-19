<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifer Texte Dynamique</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Modifier un Texte dynamique</h1>
        <form action="modifier_submit" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $texte_dynamique->id }}">
            <div class="mb-3">
                <label for="soustitre" class="form-label">Sous-titre</label>
                <input type="text" class="form-control" name="soustitre" value="{{ $texte_dynamique->soustitre }}">
            </div>
            <div class="mb-3">
                <label for="contenu" class="form-label">Contenu</label>
                <textarea class="form-control" id="contenu" name="contenu" rows="6">{{ $texte_dynamique->contenu }}</textarea>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Modifier</button>
                <a href="../textes_dynamiques" class="btn btn-secondary">Annuler la modification</a>
            </div>
        </form>
    </div>
</body>
</html>