<?php
session_start(); // Starting the session
if (isset($_SESSION['username'])) {
    $user_name = $_SESSION['username'];
    // Now $username has the value from the login
    echo $user_name;
} else {
    // The username isn't set; you might want to handle this condition
}
  if (isset($_GET['eventname'])) {
    $Eventname = $_GET['eventname'];
 echo $Eventname;
} elseif (isset($_POST['eventName'])) {
    // If you are using a form submission in the Football Event, use $_POST instead
    $Eventname = $_POST['eventName'];
  
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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['regBtn'])) {

  $useremail = $_POST['email'];
  $branch = $_POST['branch'];
  $collage = $_POST['collage'];
$year = $_POST['year'];

  $servername = "localhost"; // Change this if your database is hosted elsewhere
$username = "root";
$password = "******";
$dbname = "event_managment";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM users WHERE username = '$user_name'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // Output data of each row
      while ($row = $result->fetch_assoc()) {
          $fullname = $row["fullname"];
          $email  = $row["email"];
          // Fetch and display other data as needed
      }
  } else {
      echo "0 results";
  }

  $targetDir = "uploads/";
  $targetFile = $targetDir . basename($_FILES["image"]["name"]);
  move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);
  
    // Your existing code for inserting data into the database
    $sql = "INSERT INTO reg (username, fullname, email, branch,Year, Collage, eventname, statee, Transactions) VALUES ('$user_name','$fullname', '$useremail', '$branch','$year', '$collage', '$Eventname', 'Pending','$targetFile')";


    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  

      // Email sending code
      try {
          // Server settings
          $mail->isSMTP(); // Send using SMTP
          $mail->Host       = 'smtp.gmail.com'; // Set the SMTP server to send through
          $mail->SMTPAuth   = true; // Enable SMTP authentication
          $mail->Username   = 'example@gmail.com';                     //SMTP username
          $mail->Password   = '********'; // SMTP password
          $mail->Port       = 587; // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

          // Recipients
          $mail->setFrom('kas@gmail.com', 'Event Head');
          $mail->addAddress($useremail); // Add a recipient
          $mail->addReplyTo('kas@gmail.com', 'Event Head');

          // Content
          $mail->isHTML(true); // Set email format to HTML
          $mail->Subject = 'Event Register';
          $mail->Body    = 'The Request for the Registration for the Event has been under Process ..<br>Thank You For Registring to this Event , You ll get The Regsitered Message after Admin approve your registration
          <p><img src="https://www.pngkey.com/png/full/252-2520457_thankyou-for-registering-plane-graphic-design.png" alt="Image Description"></p>
          ';
          $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

          $mail->send();
          echo '<script>alert("Message has been sent!");</script>';
      } catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }



$conn->close();
// 

}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> 
    <link href="style1.css" rel="stylesheet">
    <title>PHP Web Page</title>

</head>
<body>
<div id="container">

<span id="left"> 
<h1>Register Here for <?php echo isset($_GET['eventname']) ? $_GET['eventname'] : 'Unknown Event'; ?></h1>

  <br><br>
  <form method="post" action="" enctype="multipart/form-data">
<h6>Enter the Email Id You want to get Mail in</h6>

<input type="email" name="email" class="form-control" placeholder="Enter Email ID " aria-label="email" aria-describedby="basic-addon1" required><br>
               
<div class="input-group mb-3">
  <input type="text" name="branch" id="selectedValue1" class="form-control" aria-label="Text input with dropdown button" placeholder="Select Branch" required>
  <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></button>
  <ul class="dropdown-menu dropdown-menu-end">
    <li><a class="dropdown-item" href="#" onclick="setValue(1,'IT')">IT</a></li>
    <li><a class="dropdown-item" href="#" onclick="setValue(1,'CS')">CS</a></li>
    <li><a class="dropdown-item" href="#" onclick="setValue(1,'ME')">ME</a></li>
    <li><a class="dropdown-item" href="#" onclick="setValue(1,'EC')">EC</a></li>
  </ul>
</div><br>

<div class="input-group mb-3">
  <input type="text" name="collage" id="selectedValue2" class="form-control" aria-label="Text input with dropdown button" placeholder="Select Collage" required>
  <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></button>
  <ul class="dropdown-menu dropdown-menu-end">
    <li><a class="dropdown-item" href="#" onclick="setValue(2,'SDBCT')">SDBCT</a></li>
    <li><a class="dropdown-item" href="#" onclick="setValue(2,'SDBCE')">SDBCE</a></li>
  </ul>
</div><br>

<div class="input-group mb-3">
  <input type="text" name ="year"id="selectedValue3" class="form-control" aria-label="Text input with dropdown button" placeholder="Select Year" required>
  <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></button>
  <ul class="dropdown-menu dropdown-menu-end">
    <li><a class="dropdown-item" href="#" onclick="setValue(3,'1st')">1st</a></li>
    <li><a class="dropdown-item" href="#" onclick="setValue(3,'2nd')">2nd</a></li>
    <li><a class="dropdown-item" href="#" onclick="setValue(3,'3rd')">3rd</a></li>
    <li><a class="dropdown-item" href="#" onclick="setValue(3,'4th')">4th</a></li>
  </ul>
</div>
<input type="file" name="image" accept="image/*">
<input type="hidden" name="eventName" value="<?php echo isset($_GET['email']) ? $_GET['eventName'] : 'Unknown Event'; ?>"><br><br>
        <button type="submit" name="regBtn" value="Login" class="btn btn-primary btn-lg">Register</button>
    </form> 
</span>

<span id="right">
<img src="https://qrcg-free-editor.qr-code-generator.com/main/assets/images/websiteQRCode_noFrame.png" class="img-fluid" alt="...">
<h7>Scan this QR to pay </h7>
</span>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script>
function setValue(dropdownNumber, selectedOption) {
  if (dropdownNumber === 1) {
    document.getElementById('selectedValue1').value = selectedOption;
  } else if (dropdownNumber === 2) {
    // Append the selected option for dropdown 2
    document.getElementById('selectedValue2').value += ' ' + selectedOption;
  } else if (dropdownNumber === 3) {
    // Append the selected option for dropdown 3
    document.getElementById('selectedValue3').value += ' ' + selectedOption;
  }
}
</script>
</body>
</html>
