<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// Database connection code goes here
$servername = "localhost";
$username = "root";
$password = "pwd";
$dbname = "event_managment";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Viewbtn'])) {
    $email = $_POST['email'];
    $eventname = $_POST['eventname'];

    $query = "SELECT Transactions FROM reg WHERE email = '$email' AND eventname = '$eventname'";
    $result = mysqli_query($conn, $query);

    if ($result !== false) {
        // Check if any rows were returned
        if ($result->num_rows > 0) {
            // Fetch the first row
            $row = $result->fetch_assoc();
            $imagePath = $row['Transactions'];

            // Output the button to trigger the modal
            echo '
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#imageModal">
              View Image
            </button>';

            // Output the modal
            echo '
            <!-- Modal -->
            <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body" style="max-height: 80vh; overflow-y: auto;">
                  <img src="' . $imagePath . '" alt="Image Preview" class="img-fluid" style="min-width: 100%; min-height: 100%;">
                  </div>
                </div>
              </div>
            </div>';
            
        } else {
            echo "No images found.";
        }
    } else {
        echo "Error executing the query: " . $conn->error;
    }
    $conn->close();    
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['approveBtn'])) {

    $useremail = $_POST['email'];
    $eventname =$_POST['eventname'];
    $user_name = $_POST['user_name'];
    $date = "2023-11-20"; // Set your desired date for football
    $time = "11:00 AM"; 
    $location ="SDBCT"; 

    if ($eventname === "Football Event") {
        $date = "2023-11-20"; // Set your desired date for football
        $time = "11:00 AM"; 
        $location ="SDBCT";// Set your desired time for football
    } elseif ($eventname === "Basketball Event") {
        $date = "2023-11-21"; // Set your desired date for basketball
        $time = "12:00 PM";
        $location = "SDBCT";// Set your desired time for basketball
    } elseif ($eventname === "Cricket Event") {
        $date = "2023-11-21"; // Set your desired date for basketball
        $time = "1:00 PM"; 
        $location ="SDBCT";
    }
 elseif ($eventname === "Chess Event"){      
        $date = "2023-11-21";
        $time = "2:00 PM";
        $location ="SDBCT";
    }
     try {
        //Server settings                     //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'example@gmail.com';                     //SMTP username
        $mail->Password   = '********';                               //SMTP password          //Enable implicit
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('kashyaphemant2004@gmail.com', 'Event Head');
        $mail->addAddress($useremail);     //Add a recipient            //Name is optional
        $mail->addReplyTo('kashyaphemant2004@gmail.com', 'Event Head');
       //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Registration Approved for $eventname";
        $mail->Body    = "Dear $user_name,<br><br>

        We are pleased to inform you that your registration for the $eventname has been approved by the admin. Congratulations!
        <br><br>
        Event Details:
        <br><br>
        Event Name: $eventname<br>
        Date: $date<br>
        Time: $time<br>
        Location: $location<br>
        We look forward to your participation and hope you have a rewarding experience at the event. Please feel free to reach out if you have any further queries or require additional information.
        <br><br>
        Best regards,
        <br><br>
        Hemant Kumar Kashyap<br>
        Coordinator<br>
        +91 780345345<<br><br><br><br>
        <p><img src='https://www.pngkey.com/png/full/252-2520457_thankyou-for-registering-plane-graphic-design.png' alt='Image Description'></p>
        ";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
     
    
        $mail->send();
        $servername = "localhost";
        $username = "root";
        $password = "pwd";
        $dbname = "event_managment";

        try {
            $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           // The ID of the entry you want to update
           $eventname =$_POST['eventname'];
            // Update the state in the database to 'Approved'
            $query = "UPDATE reg SET statee = 'Approved' WHERE email = :email AND eventname=:eventname";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':email', $useremail);
            $stmt->bindParam(':eventname',$eventname);
            $stmt->execute();

            // Redirect to the page again to display the updated data
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } 
        echo '<script>alert("Message has been sent!");</script>';
    } catch (Exception $e) {
      
    }
  } 
?>
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
<h1>Welcome Admin!!</h1>

<div class="container mt-4">
    <h2>User Details</h2>
  
    <?php
    // Step 1: Database Connection
    $servername = "localhost"; // Change this if your database is hosted elsewhere
    $username = "root";
    $password = "Him@nshu2004";
    $dbname = "event_managment";

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Step 2: Query the Database
        $query = "SELECT * FROM reg where statee='Pending'"; // Change 'users' to your actual table name
        $result = $pdo->query($query);

        // Step 3: Retrieve and Display Data
        echo "<table class='table table-striped'>";
        echo "<tr><th>ID</th><th>Username</th><th>Name</th><th>Email</th><th>Branch</th><th>Year</th><th>Collage</th><th>Event Name</th><th>State</th><th>Approve</th><th>View</th><th>Cancel</th></tr>";

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $_SESSION['eventname'] = $row['eventname'];
            $_SESSION['username'] = $row['eventname'];
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>"; // Assuming 'id' is the column name
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['fullname'] . "</td>"; // Change 'name' to your column name
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['branch'] . "</td>";
            echo "<td>" . $row['year'] . "</td>";
            echo "<td>" . $row['Collage'] . "</td>"; 
            echo "<td>" . $row['eventname'] . "</td>";
            echo "<td>" . $row['statee'] . "</td>";
            echo "<td><form method='post' action=''>
            <input type='hidden' name='user_name' value='" . $row['username'] . "'>
            <input type='hidden' name='eventname' value='" . $row['eventname'] . "'>
            <input type='hidden' name='email' value='" . $row['email'] . "'>
          <button name ='approveBtn' type='submit' class='btn btn-success approveBtn'>Approve</button>
          </form></td>"; // Bootstrap success button for Approve
          echo "<td>
          <form method='post' action=''>
              <input type='hidden' name='eventname' value='" . $row['eventname'] . "'>
              <input type='hidden' name='email' value='" . $row['email'] . "'>
              <button name='Viewbtn' type='submit' class='btn btn-primary'>View</button>
          </form>
      </td>";
            echo "<td><button type='button' class='btn btn-danger'>Cancel</button></td>"; // Bootstrap danger button for Cancel
            // Change 'email' to your column name
            // Add more columns if needed
            echo "</tr>";
        }

        echo "</table>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
