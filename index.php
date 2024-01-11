<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
</head>
<body>
    <h2>Authentification</h2>
    
    <!-- Affiche un message d'erreur si l'authentification a échoué -->
    <?php if (isset($_GET["error"]) && $_GET["error"] == 1) : ?>
        <p style="color: red;">Nom d'utilisateur ou mot de passe incorrect.</p>
    <?php endif; ?>

    <form action="processauth.php" method="post">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" id="username" name="username" required><br>
        
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required><br>
        
        <label for="usertype">Type d'utilisateur:</label>
        <select id="usertype" name="usertype" required>
            <option value="enseignant">Enseignant</option>
            <option value="eleve">Élève</option>
            <option value="servicead">Service d'Administration</option>
            <option value="parent">Parent</option>
        </select><br>
        
        <input type="submit" value="Se connecter">
    </form>
</body>
</html>
