<?php

namespace App\Http\Controllers;

use App\Models\AbonneInfolettre;
use App\Models\Materiel;
use App\Models\Page;
use App\Models\Nouvelle;
use App\Models\Palier;
use App\Models\Partenaire;
use App\Models\Precommande;
use App\Models\Produit;
use App\Models\Texte;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\select;

class UserController extends Controller
{
    function documentation()
    {
        $nom_admin = Auth::user()->name;
        return view('documentation', [
            "nom_admin" => $nom_admin
        ]);
    }

    // ====================================================
    // =================== Login Admin ====================
    // ====================================================

    function cms_login()
    {
        return view("login");
    }

    function cms_login_submit(Request $request)
    {
        // Récupère les inputs name="courriel" et name="mot_de_passe"
        $courriel = $_POST["courriel"];
        $mot_de_passe = $_POST["mot_de_passe"];

        // Vérifie les informations de connexion
        $succes = Auth::attempt([
            "email" => $courriel,
            "password" => $mot_de_passe,
            "role" => "admin"
        ]);

        if ($succes) {
            // Si l'utilisateur est valide, on redirige
            $request->session()->regenerate();
            return redirect("/");
        } else {
            return redirect("/login?erreur");
        }
    }

    function cms_logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/login");
    }

    // ====================================================
    // ==================== Nouvelles =====================
    // ====================================================

    function nouvelles()
    {
        $nouvelles = Nouvelle::all();
        return view(
            "nouvelles",
            [
                "nouvelles" => $nouvelles
            ]
        );
    }

    function ajouter_nouvelle()
    {
        return view("nouvelles_ajouter");
    }

    function ajouter_nouvelle_submit()
    {
        // === Début upload ===
        $dossier = "images/";
        $extensions = ["png", "avif", "jpg", "jpeg", "gif", "webp"];
        $image_url = null;

        // Upload s'est bien passé
        if ($_FILES['url']['error'] === UPLOAD_ERR_OK) {

            // Récupère l'extension de l'image
            $infos_image = getimagesize($_FILES['url']['tmp_name']);
            $extension = explode("/", $infos_image["mime"])[1];

            // Si l'extension est valide
            if (in_array($extension, $extensions)) {
                $nom_rnd = time() . "_" . rand(1000, 9999);
                $image_url = $dossier . $nom_rnd . "." . $extension;
                move_uploaded_file($_FILES['url']['tmp_name'], $image_url);
            }
        }
        // === Fin upload ===

        $nouvelle = new Nouvelle();
        $nouvelle->titre = $_POST["titre"];
        $nouvelle->contenu = $_POST["contenu"];
        $nouvelle->url = $image_url;
        $nouvelle->auteur = $_POST["auteur"];
        $nouvelle->date_publication = $_POST["date_publication"];
        $nouvelle->save();

        return redirect("/nouvelles");
    }

    function modifier_nouvelle()
    {
        $nouvelle = Nouvelle::find($_GET["id"]);
        return view(
            "nouvelles_modifier",
            [
                "nouvelle" => $nouvelle
            ]
        );
    }

    function modifier_nouvelle_submit()
    {
        // === Début upload ===
        $dossier = "images/";
        $extensions = ["png", "avif", "jpg", "jpeg", "gif", "webp"];
        $image_url = null;

        // Upload s'est bien passé
        if ($_FILES['url']['error'] === UPLOAD_ERR_OK) {

            // Récupère l'extension de l'image
            $infos_image = getimagesize($_FILES['url']['tmp_name']);
            $extension = explode("/", $infos_image["mime"])[1];

            // Si l'extension est valide
            if (in_array($extension, $extensions)) {
                $nom_rnd = time() . "_" . rand(1000, 9999);
                $image_url = $dossier . $nom_rnd . "." . $extension;
                move_uploaded_file($_FILES['url']['tmp_name'], $image_url);
            }
        }
        // === Fin upload ===

        $nouvelle = Nouvelle::find($_POST["id"]);
        $nouvelle->titre = $_POST["titre"];
        $nouvelle->contenu = $_POST["contenu"];
        $nouvelle->auteur = $_POST["auteur"];
        $nouvelle->date_publication = $_POST["date_publication"];

        if ($image_url != null) {
            unlink($nouvelle->url);
            $nouvelle->url = $image_url;
        }
        $nouvelle->save();

        return redirect("/nouvelles");
    }

    function supprimer_nouvelle()
    {
        $nouvelle = Nouvelle::find($_GET["id"]);

        if ($nouvelle->url != null) {
            unlink($nouvelle->url);
        }

        $nouvelle->delete();
        return redirect("/nouvelles");
    }


    // ====================================================
    // ================== Précommandes ====================
    // ====================================================
    function precommande()
    {
        $precommandes = Precommande::all();
        return view(
            "precommande",
            [
                "precommandes" => $precommandes
            ]
        );
    }

    // ====================================================
    // ==================== Produits ======================
    // ====================================================
    function produits()
    {
        $produits = Produit::all();
        $paliers = Palier::all();
        $materiaux = Materiel::all();
        return view(
            "produits",
            [
                "produits" => $produits,
                "paliers" => $paliers,
                "materiaux" => $materiaux
            ]
        );
    }

    function ajouter_produit()
    {
        $paliers = Palier::all();
        $materiaux = Materiel::all();
        return view(
            "produits_ajouter",
            [
                "paliers" => $paliers,
                "materiaux" => $materiaux,
            ]
        );
    }

    function ajouter_produit_submit()
    {
        // === Début upload ===
        $dossier = "images/";
        $extensions = ["png", "avif", "jpg", "jpeg", "gif", "webp"];
        $image_url1 = null;
        $image_url2 = null;
        $image_url3 = null;
        $image_url4 = null;

        // Upload s'est bien passé
        if ($_FILES['url1']['error'] === UPLOAD_ERR_OK) {

            // Récupère l'extension de l'image
            $infos_image = getimagesize($_FILES['url1']['tmp_name']);
            $extension = explode("/", $infos_image["mime"])[1];

            // Si l'extension est valide
            if (in_array($extension, $extensions)) {
                $nom_rnd = time() . "_" . rand(1000, 9999);
                $image_url1 = $dossier . $nom_rnd . "." . $extension;
                move_uploaded_file($_FILES['url1']['tmp_name'], $image_url1);
            }
        }

        if ($_FILES['url2']['error'] === UPLOAD_ERR_OK) {

            // Récupère l'extension de l'image
            $infos_image = getimagesize($_FILES['url2']['tmp_name']);
            $extension = explode("/", $infos_image["mime"])[1];

            // Si l'extension est valide
            if (in_array($extension, $extensions)) {
                $nom_rnd = time() . "_" . rand(1000, 9999);
                $image_url2 = $dossier . $nom_rnd . "." . $extension;
                move_uploaded_file($_FILES['url2']['tmp_name'], $image_url2);
            }
        }

        if ($_FILES['url3']['error'] === UPLOAD_ERR_OK) {

            // Récupère l'extension de l'image
            $infos_image = getimagesize($_FILES['url3']['tmp_name']);
            $extension = explode("/", $infos_image["mime"])[1];

            // Si l'extension est valide
            if (in_array($extension, $extensions)) {
                $nom_rnd = time() . "_" . rand(1000, 9999);
                $image_url3 = $dossier . $nom_rnd . "." . $extension;
                move_uploaded_file($_FILES['url3']['tmp_name'], $image_url3);
            }
        }

        if ($_FILES['url4']['error'] === UPLOAD_ERR_OK) {

            // Récupère l'extension de l'image
            $infos_image = getimagesize($_FILES['url4']['tmp_name']);
            $extension = explode("/", $infos_image["mime"])[1];

            // Si l'extension est valide
            if (in_array($extension, $extensions)) {
                $nom_rnd = time() . "_" . rand(1000, 9999);
                $image_url4 = $dossier . $nom_rnd . "." . $extension;
                move_uploaded_file($_FILES['url4']['tmp_name'], $image_url4);
            }
        }

        
        // === Fin upload ===

        $produit = new Produit();
        $produit->nom = $_POST["nom"];
        $produit->prix = $_POST["prix"];
        $produit->taille = $_POST["taille"];
        $produit->poids = $_POST["poids"];
        $produit->mot_inspiration = $_POST["mot_inspiration"];
        $produit->avantage1 = $_POST["avantage1"];
        $produit->avantage2 = $_POST["avantage2"];
        $produit->avantage3 = $_POST["avantage3"];
        $produit->avantage4 = $_POST["avantage4"];
        $produit->caracteristique1 = $_POST["caracteristique1"];
        $produit->caracteristique2 = $_POST["caracteristique2"];
        $produit->caracteristique3 = $_POST["caracteristique3"];
        $produit->caracteristique4 = $_POST["caracteristique4"];
        $produit->specification1 = $_POST["specification1"];
        $produit->specification2 = $_POST["specification2"];
        $produit->specification3 = $_POST["specification3"];
        $produit->specification4 = $_POST["specification4"];
        $produit->date_sortie = $_POST["date_sortie"];
        $produit->description = $_POST["description"];
        $produit->url1 = $image_url1;
        $produit->url2 = $image_url2;
        $produit->url3 = $image_url3;
        $produit->url4 = $image_url4;
        $produit->materiel_id = $_POST["materiel_id"];
        $produit->palier_id = $_POST["palier_id"];
        $produit->save();

        return redirect("/produits");
    }

    function modifier_produit()
    {
        $produit = Produit::find($_GET["id"]);
        $paliers = Palier::all();
        $materiaux = Materiel::all();

        return view(
            "produits_modifier",
            [
                "produit" => $produit,
                "paliers" => $paliers,
                "materiaux" => $materiaux
            ]
        );
    }

    function modifier_produit_submit()
    {
        // === Début upload ===
        $dossier = "images/";
        $extensions = ["png", "avif", "jpg", "jpeg", "gif", "webp"];
        $image_url1 = null;
        $image_url2 = null;
        $image_url3 = null;
        $image_url4 = null;

        // Upload s'est bien passé
        if ($_FILES['url1']['error'] === UPLOAD_ERR_OK) {

            $infos_image = getimagesize($_FILES['url1']['tmp_name']);
            $extension = explode("/", $infos_image["mime"])[1];

            if (in_array($extension, $extensions)) {
                $nom_rnd = time() . "_" . rand(1000, 9999);
                $image_url1 = $dossier . $nom_rnd . "." . $extension;
                move_uploaded_file($_FILES['url1']['tmp_name'], $image_url1);
            }
        }

        if ($_FILES['url2']['error'] === UPLOAD_ERR_OK) {

            $infos_image = getimagesize($_FILES['url2']['tmp_name']);
            $extension = explode("/", $infos_image["mime"])[1];

            if (in_array($extension, $extensions)) {
                $nom_rnd = time() . "_" . rand(1000, 9999);
                $image_url2 = $dossier . $nom_rnd . "." . $extension;
                move_uploaded_file($_FILES['url2']['tmp_name'], $image_url2);
            }
        }

        if ($_FILES['url3']['error'] === UPLOAD_ERR_OK) {

            $infos_image = getimagesize($_FILES['url3']['tmp_name']);
            $extension = explode("/", $infos_image["mime"])[1];

            if (in_array($extension, $extensions)) {
                $nom_rnd = time() . "_" . rand(1000, 9999);
                $image_url3 = $dossier . $nom_rnd . "." . $extension;
                move_uploaded_file($_FILES['url3']['tmp_name'], $image_url3);
            }
        }

        if ($_FILES['url4']['error'] === UPLOAD_ERR_OK) {

            $infos_image = getimagesize($_FILES['url4']['tmp_name']);
            $extension = explode("/", $infos_image["mime"])[1];

            if (in_array($extension, $extensions)) {
                $nom_rnd = time() . "_" . rand(1000, 9999);
                $image_url4 = $dossier . $nom_rnd . "." . $extension;
                move_uploaded_file($_FILES['url4']['tmp_name'], $image_url4);
            }
        }
        // === Fin upload ===

        $produit = Produit::find($_POST["id"]);
        $produit->nom = $_POST["nom"];
        $produit->prix = $_POST["prix"];
        $produit->date_sortie = $_POST["date_sortie"];
        $produit->description = $_POST["description"];
        $produit->taille = $_POST["taille"];
        $produit->poids = $_POST["poids"];
        $produit->mot_inspiration = $_POST["mot_inspiration"];
        $produit->avantage1 = $_POST["avantage1"];
        $produit->avantage2 = $_POST["avantage2"];
        $produit->avantage3 = $_POST["avantage3"];
        $produit->avantage4 = $_POST["avantage4"];
        $produit->caracteristique1 = $_POST["caracteristique1"];
        $produit->caracteristique2 = $_POST["caracteristique2"];
        $produit->caracteristique3 = $_POST["caracteristique3"];
        $produit->caracteristique4 = $_POST["caracteristique4"];
        $produit->specification1 = $_POST["specification1"];
        $produit->specification2 = $_POST["specification2"];
        $produit->specification3 = $_POST["specification3"];
        $produit->specification4 = $_POST["specification4"];

        if ($image_url1 != null) {
            $produit->url1 = $image_url1;
        }

        if ($image_url2 != null) {
            $produit->url2 = $image_url2;
        }

        if ($image_url3 != null) {
            $produit->url3 = $image_url3;
        }

        if ($image_url4 != null) {
            $produit->url4 = $image_url4;
        }
        $produit->materiel_id = $_POST["materiel_id"];
        $produit->palier_id = $_POST["palier_id"];
        $produit->save();

        return redirect("/produits");
    }

    function supprimer_produit()
    {
        $produit = Produit::find($_GET["id"]);

        if ($produit->url1 != null) {
            unlink($produit->url1);
        }
        
        if ($produit->url2 != null) {
            unlink($produit->url2);
        }

        if ($produit->url3 != null) {
            unlink($produit->url3);
        }

        if ($produit->url4 != null) {
            unlink($produit->url4);
        }

        $produit->delete();
        return redirect("/produits");
    }

    // ====================================================
    // ====================== Paliers =====================
    // ====================================================

    function paliers()
    {
        $paliers = Palier::all();

        return view(
            "paliers",
            [
                "paliers" => $paliers
            ]
        );
    }

    function ajouter_palier()
    {
        return view("paliers_ajouter");
    }

    function ajouter_palier_submit()
    {
        $palier = new Palier();
        $palier->nom = $_POST["nom"];
        $palier->description = $_POST["description"];
        $palier->save();

        return redirect("/produits/paliers");
    }

    function modifier_palier()
    {
        $palier = Palier::find($_GET["id"]);
        return view(
            "paliers_modifier",
            [
                "palier" => $palier
            ]
        );
    }

    function modifier_palier_submit()
    {
        $palier = Palier::find($_POST["id"]);
        $palier->nom = $_POST["nom"];
        $palier->description = $_POST["description"];
        $palier->save();

        return redirect("/produits/paliers");
    }

    function supprimer_palier()
    {
        $palier = Palier::find($_GET["id"]);
        $palier->delete();
        return redirect("/produits/paliers");
    }

    // ====================================================
    // ==================== Statistiques ==================
    // ====================================================

    function statistiques()
    {
        $pages = Page::all();
        return view(
            "statistiques",
            [
                "pages" => $pages
            ]
        );
    }

    // ====================================================
    // ==================== Infolettre ====================
    // ====================================================

    function infolettre()
    {
        $abonnes = AbonneInfolettre::all();
        return view("infolettre", ["abonnes" => $abonnes]);
    }

    // ====================================================
    // ==================== Partenaires ===================
    // ====================================================

    function partenaires()
    {
        $partenaires = Partenaire::all();
        return view(
            "partenaires",
            [
                "partenaires" => $partenaires,
            ]
        );
    }

    function ajouter_partenaire()
    {
        return view("partenaires_ajouter");
    }

    function ajouter_partenaire_submit()
    {
        // === Début upload ===
        $dossier = "images/";
        $extensions = ["png", "avif", "jpg", "jpeg", "gif", "webp"];
        $image_url = null;

        // Upload s'est bien passé
        if ($_FILES['url']['error'] === UPLOAD_ERR_OK) {

            // Récupère l'extension de l'image
            $infos_image = getimagesize($_FILES['url']['tmp_name']);
            $extension = explode("/", $infos_image["mime"])[1];

            // Si l'extension est valide
            if (in_array($extension, $extensions)) {
                $nom_rnd = time() . "_" . rand(1000, 9999);
                $image_url = $dossier . $nom_rnd . "." . $extension;
                move_uploaded_file($_FILES['url']['tmp_name'], $image_url);
            }
        }
        // === Fin upload ===

        $partenaire = new Partenaire();
        $partenaire->nom = $_POST["nom"];
        $partenaire->description = $_POST["description"];
        $partenaire->url = $image_url;
        $partenaire->save();

        return redirect("/partenaires");
    }

    function modifier_partenaire()
    {
        $partenaire = Partenaire::find($_GET["id"]);
        return view(
            "partenaires_modifier",
            [
                "partenaire" => $partenaire
            ]
        );
    }

    function modifier_partenaire_submit()
    {
        // === Début upload ===
        $dossier = "images/";
        $extensions = ["png", "avif", "jpg", "jpeg", "gif", "webp"];
        $image_url = null;

        // Upload s'est bien passé
        if ($_FILES['url']['error'] === UPLOAD_ERR_OK) {

            // Récupère l'extension de l'image
            $infos_image = getimagesize($_FILES['url']['tmp_name']);
            $extension = explode("/", $infos_image["mime"])[1];

            // Si l'extension est valide
            if (in_array($extension, $extensions)) {
                $nom_rnd = time() . "_" . rand(1000, 9999);
                $image_url = $dossier . $nom_rnd . "." . $extension;
                move_uploaded_file($_FILES['url']['tmp_name'], $image_url);
            }
        }
        // === Fin upload ===

        $partenaire = Partenaire::find($_POST["id"]);
        $partenaire->nom = $_POST["nom"];
        $partenaire->description = $_POST["description"];

        if ($image_url != null) {
            unlink($partenaire->url);
            $partenaire->url = $image_url;
        }
        $partenaire->save();

        return redirect("/partenaires");
    }

    function supprimer_partenaire()
    {
        $partenaire = Partenaire::find($_GET["id"]);

        if ($partenaire->url != null) {
            unlink($partenaire->url);
        }

        $partenaire->delete();
        return redirect("/partenaires");
    }
    // ====================================================
    // ================= Textes dynamiques ================
    // ====================================================

    function textes_dynamiques()
    {
        $textes_dynamiques = Texte::all();
        return view(
            "textes_dynamiques",
            [
                "textes_dynamiques" => $textes_dynamiques
            ]
        );
    }

    function modifier_texte_dynamique()
    {
        $texte_dynamique = Texte::find($_GET["id"]);
        return view(
            "textes_dynamiques_modifier",
            [
                "texte_dynamique" => $texte_dynamique
            ]
        );  
    }

    function modifier_texte_dynamique_submit()
    {
        $texte_dynamique = Texte::find($_POST["id"]);
        $texte_dynamique->soustitre = $_POST["soustitre"];
        $texte_dynamique->contenu = $_POST["contenu"];
        $texte_dynamique->save();

        return redirect("/textes_dynamiques");
    }
}
