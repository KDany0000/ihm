<?php
// Vérifie si le formulaire d'authentification a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les informations d'authentification depuis le formulaire
    $username = $_POST["username"];
    $password = $_POST["password"];
    $usertype = $_POST["usertype"];

    // À des fins de démonstration, vous devriez ajouter une logique d'authentification sécurisée (par exemple, vérification dans une base de données)

    // Redirige vers la page appropriée après l'authentification réussie
    switch ($usertype) {
        case "enseignant":
            // Redirection vers la page d'accueil des enseignants
            header("Location: accueil_enseignant.php");
            break;
        case "eleve":
            // Redirection vers la page d'accueil des élèves
            header("Location: accueil_eleve.php");
            break;
        case "servicead":
            // Redirection vers la page d'accueil du service d'administration
            header("Location: accueil_servicead.php");
            break;
        case "parent":
            // Redirection vers la page d'accueil des parents
            header("Location: accueil_parent.php");
            break;
        default:
            // Redirection vers la page d'accueil par défaut (vous pouvez ajuster cela en fonction de vos besoins)
            header("Location: accueil_default.php");
            break;
    }

    exit();
} else {
    // Redirige vers la page d'authentification si le formulaire n'a pas été soumis directement à cette page
    header("Location: login.php");
    exit();
}
?>
