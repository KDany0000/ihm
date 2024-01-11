





<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des calendriers</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    

    <ul class="menu">
        <li><a href="home.php">Accueil</a></li>
        <li><a href="evenement.php"><span class="emphasize">Evénements</span></a></li>
        <li><a href="calendrier.php">Calendriers</a></li>
        <li><a href="deconnexion.php">Deconnexion</a></li>
    </ul>
   

<div id="eventC">

<div id="eventForm">
    <form action="">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title"><br>

    <label for="location">Location:</label>
    <input type="text" id="location" name="location"><br>

    <label>Schedule:</label><br>
 
    <label for="starts">Starts:</label>
    <input type="datetime-local" id="starts" name="starts"><br>
    
    <label for="ends">Ends:</label>
    <input type="datetime-local" id="ends" name="ends"><br>


    
    <div id="enotification">
    <label for="reminders">Notifications:</label>
    <input type="checkbox" checked="checked" id="reminders" name="reminders"><br>
    </div>
    <label for="description">Description:</label><br>
    <textarea id="description" name="description" rows="4" cols="50"></textarea><br>

    <button type="button" onclick="submitEvent()">Add Event</button>
</form>
</div>
<div id="recentevent">
    <h1>upcoming events</h1>
</div>
</div>

</body>

</html>










