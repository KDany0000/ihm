<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <h2>Inscription</h2>

    <!-- Affiche un message de succès après l'inscription -->
    <?php if (isset($_GET["success"]) && $_GET["success"] == 1) : ?>
        <p style="color: green;">Inscription réussie. Connectez-vous maintenant.</p>
    <?php endif; ?>

    <form action="processsignup.php" method="post" id="signupForm">
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

        <div id="additionalFields"></div>

        <input type="submit" value="S'inscrire">
    </form>

    <script>
        // Fonction pour ajouter les champs supplémentaires en fonction du type d'utilisateur
        function addAdditionalFields() {
            var usertype = document.getElementById('usertype').value;
            var additionalFieldsContainer = document.getElementById('additionalFields');
            additionalFieldsContainer.innerHTML = ''; // Efface les champs existants

            if (usertype === 'enseignant' || usertype === 'eleve' || usertype === 'parent') {
                var labelNom = document.createElement('label');
                labelNom.innerHTML = 'Nom:';
                var inputNom = document.createElement('input');
                inputNom.type = 'text';
                inputNom.name = 'nom';
                inputNom.required = true;

                var labelPrenom = document.createElement('label');
                labelPrenom.innerHTML = 'Prénom:';
                var inputPrenom = document.createElement('input');
                inputPrenom.type = 'text';
                inputPrenom.name = 'prenom';
                inputPrenom.required = true;

                additionalFieldsContainer.appendChild(labelNom);
                additionalFieldsContainer.appendChild(inputNom);
                additionalFieldsContainer.appendChild(document.createElement('br'));

                additionalFieldsContainer.appendChild(labelPrenom);
                additionalFieldsContainer.appendChild(inputPrenom);
                additionalFieldsContainer.appendChild(document.createElement('br'));

                // Ajoutez d'autres champs en fonction du type d'utilisateur
            }

            // Vous pouvez étendre cette logique pour les autres types d'utilisateurs
        }

        // Ajoutez un événement de changement pour déclencher la fonction lorsqu'un utilisateur change
        document.getElementById('usertype').addEventListener('change', addAdditionalFields);

        // Appelez la fonction au chargement de la page pour gérer les valeurs par défaut
        addAdditionalFields();
    </script>
</body>
</html>
