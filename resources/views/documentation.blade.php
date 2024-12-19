<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentation</title>
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
                        <a class="nav-link active" href="documentation">Documentation</a>
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
    <h2 class="text-center mt-3 mb-5">Bienvenue au tabeau de bord d'administration, {{$nom_admin}}</h2>
    <h1>Documentation</h1>
    <div class="accordion" id="accordion">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#consultation" aria-expanded="true" aria-controls="collapseOne">
                    Ajouter une consultation
                </button>
            </h2>
            <div id="consultation" class="accordion-collapse collapse" data-bs-parent="#accordion">
                <div class="accordion-body">
                    <p>URL : https://2281936.tim-cstj.ca/web4/synthese/api/ajouter_consultation</p>
                    <p>GET : nom_page en get, qui incrémente le nombre de consultation de la page spécifiée</p>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#transaction" aria-expanded="true" aria-controls="collapseOne">
                    Ajouter une transaction
                </button>
            </h2>
            <div id="transaction" class="accordion-collapse collapse" data-bs-parent="#accordion">
                <div class="accordion-body">
                    <p>URL : https://2281936.tim-cstj.ca/web4/synthese/api/ajouter_transaction</p>
                    <p>GET : user_id et montant en get, qui ajoute une transaction avec le bon user_id et le bon montant</p>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#transactions" aria-expanded="true" aria-controls="collapseOne">
                    Récupérer les transactions d'un utilisateur
                </button>
            </h2>
            <div id="transactions" class="accordion-collapse collapse" data-bs-parent="#accordion">
                <div class="accordion-body">
                    <p>URL : https://2281936.tim-cstj.ca/web4/synthese/api/transactions</p>
                    <p>GET : user_id en get, qui retourne les transactions de l'utilisateur avec le bon user_id</p>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#infolettre" aria-expanded="true" aria-controls="collapseOne">
                    S'abonner à l'infolettre
                </button>
            </h2>
            <div id="infolettre" class="accordion-collapse collapse" data-bs-parent="#accordion">
                <div class="accordion-body">
                    <p>URL : https://2281936.tim-cstj.ca/web4/synthese/api/abonner_infolettre</p>
                    <p>GET : courriel en get, qui ajoute un abonné à l'infolettre avec le bon courriel</p>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nouvelles" aria-expanded="false" aria-controls="collapseTwo">
                    Récupérer toutes les nouvelles
                </button>
            </h2>
            <div id="nouvelles" class="accordion-collapse collapse" data-bs-parent="#accordion">
                <div class="accordion-body">
                    <p>URL : https://2281936.tim-cstj.ca/web4/synthese/api/nouvelles</p>
                    <p>GET : date_publication en get, qui retourne les nouvelles avec une date de publication supérieure ou égale à date_publication.
                        Donc, par exemple : /api/nouvelles?date_publication=2024-04-01
                        retourne les nouvelles avec une date de publication supérieure ou égale à 2024-04-01. Ce paramètre est optionnelle.
                    </p>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#produits" aria-expanded="false" aria-controls="collapseThree">
                    Récupérer tous les produits
                </button>
            </h2>
            <div id="produits" class="accordion-collapse collapse" data-bs-parent="#accordion">
                <div class="accordion-body">
                    <p>URL : https://2281936.tim-cstj.ca/web4/synthese/api/produits</p>
                    <p>GET : palier_id en get, qui retourne les produits avec le bon palier_id.
                        Donc, par exemple : /api/produits?palier_id=1
                        retourne les produits avec palier_id = 1. Ce paramètre est optionnelle.
                    </p>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#paliers" aria-expanded="false" aria-controls="collapseFour">
                    Récupérer tous les paliers
                </button>
            </h2>
            <div id="paliers" class="accordion-collapse collapse" data-bs-parent="#accordion">
                <div class="accordion-body">
                    <p>URL : https://2281936.tim-cstj.ca/web4/synthese/api/paliers</p>
                    <p>GET : Aucune paramètres</p>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#inscrire" aria-expanded="false" aria-controls="collapseSix">
                    Fonction pour s'inscrire
                </button>
            </h2>
            <div id="inscrire" class="accordion-collapse collapse" data-bs-parent="#accordion">
                <div class="accordion-body">
                    <p>Crée un user, pour ajouter un admin, veuillez nous consulter</p>
                    <p>URL : https://2281936.tim-cstj.ca/web4/synthese/api/register
                    <p>POST : nom, courriel, mot_de_passe</p>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#connecter" aria-expanded="false" aria-controls="collapseSeven">
                    Fonction pour se connecter
                </button>
            </h2>
            <div id="connecter" class="accordion-collapse collapse" data-bs-parent="#accordion">
                <div class="accordion-body">
                    <div class="accordion-body">
                        <p>URL : https://2281936.tim-cstj.ca/web4/synthese/api/login</p>
                        <p>POST : courriel et mot_de_passe</p>
                        <p>Retourne un token si l'info est correcte</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#precommandes" aria-expanded="false" aria-controls="collapseNine">
                    Réccupérer les précommandes d'un utilisateur
                </button>
            </h2>
            <div id="precommandes" class="accordion-collapse collapse" data-bs-parent="#accordion">
                <div class="accordion-body">
                    <div class="accordion-body">
                        <p>URL : https://2281936.tim-cstj.ca/web4/synthese/api/precommandes</p>
                        <p>GET : courriel en get, qui retourne les précommandes de l'utilisateur avec le bon courriel, obligatoire</p>
                        <p>POST : aucun</p>
                        <p>Token : oui</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#precommande" aria-expanded="false" aria-controls="collapseTen">
                    Fonction pour ajouter une précommande
                </button>
            </h2>
            <div id="precommande" class="accordion-collapse collapse" data-bs-parent="#accordion">
                <div class="accordion-body">
                    <div class="accordion-body">
                        <p>URL : https://2281936.tim-cstj.ca/web4/synthese/api/ajouter_precommande</p>
                        <p>GET : aucun</p>
                        <p>POST : user_id, produit_id, quantite</p>
                        <p>Token : oui</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#partenaires" aria-expanded="false" aria-controls="collapseEleven">
                Récupérer tous les partenaires
                </button>
            </h2>
            <div id="partenaires" class="accordion-collapse collapse" data-bs-parent="#accordion">
                <div class="accordion-body">
                    <div class="accordion-body">
                        <p>URL : https://2281936.tim-cstj.ca/web4/synthese/api/partenaires</p>
                        <p>GET : aucun</p>
                        <p>POST : aucun</p>
                        <p>Token : non</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dynamiques" aria-expanded="false" aria-controls="collapseTwelve">
                Récupérer tous les textes dynamiques
                </button>
            </h2>
            <div id="dynamiques" class="accordion-collapse collapse" data-bs-parent="#accordion">
                <div class="accordion-body">
                    <div class="accordion-body">
                        <p>URL : https://2281936.tim-cstj.ca/web4/synthese/api/textes_dynamiques</p>
                        <p>GET : vous pouvez ajouter un id en get pour récupérer un texte dynamique spécifique. Ex: http://127.0.0.1:8000/api/textes_dynamiques?id=1 retourne le texte dynamique avec id = 1</p>
                        <p>POST : aucun</p>
                        <p>Token : non</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>