<?php

namespace App\Http\Controllers;

use App\Models\AbonneInfolettre;
use App\Models\Page;
use App\Models\Nouvelle;
use App\Models\Palier;
use App\Models\Partenaire;
use App\Models\Precommande;
use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Texte;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    // Augemente le nombre de consultation de 1 de la page spécifiée avec “nom_page”.
    // URL : http://127.0.0.1:8000/api/ajouter_consulation
    // GET : nom_page en get, qui incrémente le nombre de consultation de la page spécifiée
    function ajouter_consultation()
    {
        $nom_page = $_GET["nom_page"];
        $page = Page::where("nom", $nom_page)->first();
        $page->consultations++;
        $page->save();
    }

    // Ajouter une transaction
    // URL : http://127.0.0.1:8000/api/ajouter_transaction
    // GET : user_id et montant en get, qui ajoute une transaction avec le bon user_id et le bon montant
    function ajouter_transaction()
    {
        $user_id = $_GET["user_id"];
        $montant = $_GET["montant"];
        $transaction = new Transaction();
        $transaction->user_id = $user_id;
        $transaction->montant = $montant;
        $transaction->save();
    }

    // Récupérer les transactions d'un utilisateur
    // URL : http://127.0.0.1:8000/api/transactions
    // GET : user_id en get, qui retourne les transactions de l'utilisateur avec le bon user_id
    function transactions()
    {
        $user_id = $_GET["user_id"];
        $transactions = Transaction::where("user_id", $user_id)->get();
        return response()->json($transactions, 200, [], JSON_PRETTY_PRINT);
    }

    // S'abonner à l'infolettre
    // URL : /api/abonner_infolettre
    // GET : courriel en get, qui ajoute un abonné à l'infolettre avec le bon courriel
    function abonner_infolettre()
    {
        $abonne = new AbonneInfolettre();
        $abonne->courriel = $_GET["courriel"];
        $abonne->save();
    }
    
    // Ajouter une précommande
    // URL : http://127.0.0.1:8000/api/ajouter_precommande
    // GET : aucun
    // POST : user_id, produit_id, quantite
    // Token : oui
    function api_ajouter_precommande()
    {
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $courriel = $_POST["courriel"];
        $telephone = $_POST["telephone"];
        $adresse = $_POST["adresse"];
        $postal = $_POST["postal"];
        $pays = $_POST["pays"];
        $produit_id = $_POST["produit_id"];
        $quantite = $_POST["quantite"];

        $precommande = new Precommande();
        $precommande->nom = $nom;
        $precommande->prenom = $prenom;
        $precommande->courriel = $courriel;
        $precommande->telephone = $telephone;
        $precommande->adresse = $adresse;
        $precommande->postal = $postal;
        $precommande->pays = $pays;
        $precommande->produit_id = $produit_id;
        $precommande->quantite = $quantite;
        $success = $precommande->save();

        return ["success" => $success];
    }

    // Récupérer les précommandes d'un utilisateur
    // URL : http://127.0.0.1:8000/api/precommandes
    // GET : courriel en get, qui retourne les précommandes de 
    // l'utilisateur avec le bon courriel, obligatoire
    // POST : aucun
    // Token : oui
    function api_precommandes()
    {
        $courriel = $_GET["courriel"];
        $precommandes = Precommande::where("courriel", "=" ,$courriel)->get();
        return response()->json($precommandes, 200, [], JSON_PRETTY_PRINT);
    }

    // Fonction pour s'inscrire, créer un user
    // URL : http://127.0.0.1:8000/api/login
    // GET : aucun 
    // POST : courriel, mot_de_passe, nom
    // Token : non
    function api_register()
    {
        $courriel = $_POST["courriel"];
        $mot_de_passe = $_POST["mot_de_passe"];
        $nom = $_POST["nom"];

        $user = new User();
        $user->name = $nom;
        $user->email = $courriel;
        $user->password = Hash::make($mot_de_passe);
        $user->role = 'user';
        $user->save();
    }

    // Fonction pour se connecter
    // URL : http://127.0.0.1:8000/api/login
    // GET : aucun
    // POST : courriel, mot_de_passe
    // Token : non (créé un token pour le frontend)
    function api_login()
    {
        $courriel = $_POST["courriel"];
        $mot_de_passe = $_POST["mot_de_passe"];
        $nom_token = "site_v1"; // nom arbitraire

        $user = User::where('email', $courriel)->first();

        // Si le user n'existe pas ou que le mdp est incorrect
        if (!$user || !Hash::check($mot_de_passe, $user->password)) {
            $resultat = [
                "erreur" => "Informations d'authentification invalides"
            ];
            return $resultat;
        }

        // Si le user est ok, on crée un token pour le frontend
        $resultat = [
            "token" => $user->createToken($nom_token)->plainTextToken
        ];
        return $resultat;
    }

    // Récupérer toutes les nouvelles
    // URL : http://127.0.0.1:8000/api/nouvelles
    // GET : date_publication en get, qui retourne les nouvelles avec une date de 
    //      publication supérieure ou égale à date_publication
    //      Donc, par exemple : http://http://127.0.0.1:8000/api/nouvelles?date_publication=2024-04-01 
    //      retourne les nouvelles avec une date de publication supérieure ou égale à 2024-04-01
    // POST : aucun
    // Token : non
    function api_nouvelles()
    {
        if (isset($_GET['date_publication'])) {
            $date_publication = $_GET['date_publication'];
            $nouvelles = Nouvelle::where('date_publication', '>=', $date_publication)->get();
            return response()->json($nouvelles, 200, [], JSON_PRETTY_PRINT);
        } else {
            $nouvelles = Nouvelle::all();
            return response()->json($nouvelles, 200, [], JSON_PRETTY_PRINT);
        }
    }

    // Récupérer tous les produits
    // URL : http://127.0.0.1:8000/api/produits
    // GET : palier_id en get, qui retourne les produits avec le bon palier_id
    //      Donc, par exemple : http://127.0.0.1:8000/api/produits?palier_id=1 
    //      retourne les produits avec palier_id = 1
    // POST : aucun
    // Token : non
    function api_produits()
    {

        if (isset($_GET['palier_id'])) {
            $palier_id = $_GET['palier_id'];
            $produits = Produit::with('palier')->where('palier_id', '=', $palier_id)->get();
            return response()->json($produits, 200, [], JSON_PRETTY_PRINT);
        } else {
            $produits = Produit::with('palier')->get();
            return response()->json($produits, 200, [], JSON_PRETTY_PRINT);
        }
    }

    // Récupérer tous les paliers
    // URL : http://127.0.0.1:8000/api/paliers
    // GET : aucun paramètre
    // POST : aucun
    // Token : non
    function api_paliers()
    {
        $paliers = Palier::all();
        return response()->json($paliers, 200, [], JSON_PRETTY_PRINT);
    }

    // Récupérer tous les partenaires
    // URL : http://127.0.0.1:8000/api/partenaires
    // GET : aucun paramètre
    // POST : aucun
    // Token : non
    function api_partenaires()
    {
        $partenaires = Partenaire::all();
        return response()->json($partenaires, 200, [], JSON_PRETTY_PRINT);
    }
    
    // Récupérer tous les textes dynamiques
    // URL : http://127.0.0.1:8000/api/textes_dynamiques
    // GET : vous pouvez ajouter un id en get pour 
    // récupérer un texte dynamique spécifique. 
    // Ex: http://127.0.0.1:8000/api/textes_dynamiques?id=1 retourne le texte dynamique avec id = 1
    // POST : aucun
    // Token : non
    function api_textes_dynamiques()
    {
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $texte_dynamique = Texte::where('id', '=', $id)->get();
            return response()->json($texte_dynamique, 200, [], JSON_PRETTY_PRINT);
        }
        else
        {
            $textes_dynamiques = Texte::all();
            return response()->json($textes_dynamiques, 200, [], JSON_PRETTY_PRINT);
        }
    }

    // Télécharger les abonnés à l'infolettre
    function telecharger_abonnes()
    {
        $headers = [
            'Content-type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=abonnes.csv'
        ];

        $abonnes = AbonneInfolettre::all()->pluck('courriel')->toArray();

        $callback = function() use ($abonnes) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $abonnes, "\n");
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
