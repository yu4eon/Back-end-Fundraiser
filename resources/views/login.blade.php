<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1 class="mb-4">Connexion de compte administrateur</h1>
    <div class="container">
        @if(isset($_GET['erreur']))
        <div class="alert alert-danger" role="alert">
            <p style="margin-bottom: 0">Votre courriel ou mot de passe incorrect, veuillez réessayer.</p>
        </div>
        @endif
        <form action="login_submit" class="mb-3" method="POST">
            @csrf
            <div class="mb-3">
                <label for="courriel" class="form-label">Courriel</label>
                <input type="email" name="courriel" class="form-control" id="courriel">
            </div>
            <div class="mb-3">
                <label for="mot_de_passe" class="form-label">Mot de passe</label>
                <input type="password" name="mot_de_passe" class="form-control" id="mot_de_passe">
            </div>
            <button type="submit" class="btn btn-primary">Connexion</button>
        </form>
    </div>
</body>
</html>