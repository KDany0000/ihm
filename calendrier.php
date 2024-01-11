<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des calendriers</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="calendrier.css">
</head>

<body>

    <ul class="menu">
        <li><a href="home.php">Accueil</a></li>
        <li><a href="evenement.php">Evénements</a></li>
        <li><a href="#calendrier.php"><span class="emphasize">Calendriers</span></a></li>
        <li><a href="home.php">Deconnexion</a></li>
    </ul>
    <div id="ctile">
        <h1>calendrier Académique</h1>
    </div>
   
    <div class="monthyear">
        
        <div>
            <button onclick="changeMonth(-1)">&lt; </button>
            <span id="month">Mars </span>
            <button onclick="changeMonth(1)"> &gt;</button>
        </div>
        <div>
        <button onclick="changeYear(-1)">&lt; </button>
        <span id="year"> 2024</span>
        <button onclick="changeYear(1)">&gt;</button>
        </div>
       
    
    </div>

    <table class="calendarT">
        <thead>
           
            <tr>
                <th>Sun</th>
                <th>Mon</th>
                <th>Tue</th>
                <th>Wed</th>
                <th>Thu</th>
                <th>Fri</th>
                <th>Sat</th>
            </tr>
        </thead>
        <tbody id="calendar-body">
            <!-- Days will be dynamically added here using JavaScript -->
        </tbody>
    </table>
</body>

<script>
    // Initial month and year
    let currentMonth = 2; // March (0-indexed)
    let currentYear = 2024;
    let eventsData = {}; // Store events data

    // Function to update the calendar
    function updateCalendar() {
        const tbody = document.getElementById('calendar-body');
        tbody.innerHTML = ''; // Clear previous content

        const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
        let dayCounter = 1;

        for (let i = 0; i < 5; i++) {
            const row = document.createElement('tr');

            for (let j = 0; j < 7; j++) {
                const cell = document.createElement('td');

                if (dayCounter <= daysInMonth) {
                    const dayDiv = document.createElement('div');
                    dayDiv.textContent = dayCounter;

                    const eventDiv = document.createElement('div');
                    eventDiv.textContent = '';
                    eventDiv.id = getEventId(dayCounter);

                    cell.appendChild(dayDiv);
                    cell.appendChild(eventDiv);

                    // Check if there's an event for this day in the data
                    const eventData = eventsData[getEventId(dayCounter)];
                    if (eventData) {
                        eventDiv.textContent = eventData.title;
                    }

                    dayCounter++;
                }

                row.appendChild(cell);
            }

            tbody.appendChild(row);
        }

        // Update the month and year in the header
        const monthSpan = document.getElementById('month');
        const yearSpan = document.getElementById('year');
        if (monthSpan && yearSpan) {
            const monthName = new Date(currentYear, currentMonth, 1).toLocaleDateString('fr-FR', {
                month: 'long'
            });
            monthSpan.textContent = monthName;
            yearSpan.textContent = currentYear;
        }
    }

    // Function to change the month
    function changeMonth(delta) {
        currentMonth += delta;

        // Adjust the year if needed
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        } else if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        }

        updateCalendar();
    }

    // Function to change the year
    function changeYear(delta) {
        currentYear += delta;
        updateCalendar();
    }

    // Function to generate unique event ID based on day, month, and year
    function getEventId(day) {
        return `event-${day}-${currentMonth + 1}-${currentYear}`;
    }

    // Function to add or modify event title
    function addEventTitle(day, title) {
        const eventId = getEventId(day);
        eventsData[eventId] = { title };
        const eventDiv = document.getElementById(eventId);

        if (eventDiv) {
            eventDiv.textContent = title;
        } else {
            console.error('Event div not found for day ' + day);
        }
    }

    // Example: add an event on day 5
    addEventTitle(5, 'Team Meeting');

    // Initial calendar render
    updateCalendar();
</script>

</html>
