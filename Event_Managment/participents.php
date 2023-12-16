<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <title>PHP Web Page</title>
    
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <img class ="logo" src="logo.png" alt="logo" style = "max-width: 60px;height: auto;">
        <a class="navbar-brand" href="#">TEAM EVENT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a href="events.php" class="nav-link active" aria-current="page" href="#">EVENTS</a>
                </li>
                <li class="nav-item">
                    <a href="participents.php"class="nav-link" href="#">PARTICIPANTS</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<form method="post" action="">
    <div class="mb-3">
        <label for="eventSelection" class="form-label">Select Event:</label>
        <select name="eventSelection" id="eventSelection" class="form-select">
            <?php
            // Include your database connection here
            // $conn = mysqli_connect("hostname", "username", "password", "database");
            $servername = "localhost"; // Change this if your database is hosted elsewhere
            $username = "root";
            $password = "pwd";
            $dbname = "event_managment";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            $queryEvents = "SELECT DISTINCT eventname FROM reg";
            $resultEvents = mysqli_query($conn, $queryEvents);

            while ($rowEvent = $resultEvents->fetch_assoc()) {
                echo '<option value="' . $rowEvent['eventname'] . '">' . $rowEvent['eventname'] . '</option>';
            }

            $conn->close();
            ?>
        </select>
    </div>
    
    <div class="mb-3">
        <label for="stateSelection" class="form-label">Select State:</label>
        <select name="stateSelection" id="stateSelection" class="form-select">
            <!-- Manually added options for approval status -->
            <option value="approved">Approved</option>
            <option value="pending">Pending</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Show Data</button>
</form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['eventSelection'])) {
        $selectedEvent = $_POST['eventSelection'];
        $selectedState = $_POST['stateSelection'];
        // Include your database connection here
        // $conn = mysqli_connect("hostname", "username", "password", "database");
        $servername = "localhost"; // Change this if your database is hosted elsewhere
$username = "root";
$password = "pwd";
$dbname = "event_managment";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

      
    $query = "SELECT * FROM reg WHERE eventname = '$selectedEvent' AND statee = '$selectedState'";
    $result = mysqli_query($conn, $query);

    if ($result !== false) {
        if ($result->num_rows > 0) {
            echo '<table border="1">';
            echo '<tr><th>Fullname</th><th>Email</th><th>Branch</th><th>Year</th><th>Collage</th><th>Event Name</th><th>State</th></tr>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['fullname'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['branch'] . '</td>';
                echo '<td>' . $row['year'] . '</td>';
                echo '<td>' . $row['Collage'] . '</td>';
                echo '<td>' . $row['eventname'] . '</td>';
                echo '<td>' . $row['statee'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo "No Pending Records .";
        }
    } else {
        echo "Error executing the query: " . $conn->error;
    }
        $conn->close();
    } else {
        echo "Please select an event.";
    }
    ?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
