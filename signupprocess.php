<?php
// Inclure la connexion à la base de données ici

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $usertype = $_POST["usertype"];

    // En fonction du type d'utilisateur, récupérer les données spécifiques
    switch ($usertype) {
        case "enseignant":
            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
            // Ajoutez d'autres champs pour l'enseignant si nécessaire
            break;

        case "eleve":
            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
            // Ajoutez d'autres champs pour l'élève si nécessaire
            break;

        case "servicead":
            // Traitez les champs pour le service d'administration
            break;

        case "parent":
            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
            // Ajoutez d'autres champs pour le parent si nécessaire
            break;

        default:
            // Gérer une erreur si le type d'utilisateur n'est pas reconnu
            break;
    }

    // Enregistrez les données dans la base de données (c'est ici que vous devez ajouter votre code spécifique à la base de données)
    // Assurez-vous de prévenir les failles d'injection SQL en utilisant des requêtes préparées
    // Exemple d'utilisation de MySQLi :
    // $conn = new mysqli("localhost", "nom_utilisateur", "mot_de_passe", "nom_base_de_donnees");
    // $stmt = $conn->prepare("INSERT INTO utilisateurs (username, password, usertype, nom, prenom) VALUES (?, ?, ?, ?, ?)");
    // $stmt->bind_param("sssss", $username, $password, $usertype, $nom, $prenom);
    // $stmt->execute();

    // Après l'inscription, redirigez l'utilisateur vers la page de connexion avec un paramètre indiquant le succès
    header("Location: login.php?success=1");
    exit();
}
?>
