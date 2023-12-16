<?php
require 'db.php'; 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['loginbtn'])) {
 
  $username=$_POST['username'];
  session_start(); // Starting the session
$_SESSION['username'] = $username;
  $pwd=$_POST['password'];
  $query= "SELECT * FROM users WHERE username='$username'";
  $query_run=mysqli_query($conn,$query);
 
          $_SESSION['alert']="Sucessfully logged in";  
          header("location:dashboard.php");
}

$adminUsername = 'admin';
$adminPassword = 'admin123';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['adminbtn'])) {
    // Retrieve submitted credentials
    $enteredUsername = $_POST['adminusername'];
    $enteredPassword = $_POST['adminpassword'];

    // Validate credentials
    if ($enteredUsername === $adminUsername && $enteredPassword === $adminPassword) {
        // Redirect to admin page or perform admin actions
        header('Location: admindashboard.php');
        exit;
    } else {
        // Display an error message if credentials are invalid
        echo '<script>alert("Invalid username or password.");</script>';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> 
<link href="style.css" rel="stylesheet">
<title>PHP Web Page</title>
</head>
<body>
<nav class="navbar">
  <div class="container-fluid">
  <div style=" width: 300px;dislay:flex;justify-content: space-around;">
  <img  src="logo.png" alt="logo" style = "max-width: 60px;height: auto;">
    <a class="navbar-brand" href="#">TEAM EVENT</a>
</div>

<div class="nav-right">
    <form method="post" action="login.php">
    <button type="submit" name="regBtn" value="Login" class="signup-button">Sign Up</button>
    </form>

    <form method="post" action="loogin.php">
    <button type="submit" class="login-button">Login</button>
    </form>
    </div>
  </div>
</nav>

<div class="column">
    <div class="user">
      <div class="r">
   <h1>Login as User</h1><br><br>
   <form method="post" action="">
   <span id="inputs">
   <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required><br>
                <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1" required><br><br><br>
                    
 
    <button type="submit" name="loginbtn" class="btn btn-primary btn-lg">Login</button>
    </form></div>
    <div class="ul">
    <img id="userimg"src="https://t4.ftcdn.net/jpg/02/37/77/07/360_F_237770767_LXQjk1HPqU9GWORHTzk517CdaosRcVtn.webp" alt="">
   
    </div>
   </span>
    </div>
    <div class="admin">
      <div class="r">
      <h1>Login as Admin</h1><br><br>
<form method="post" action="">
<span id="inputs">
<input type="text" name="adminusername" class="form-control" placeholder="Admin Username" aria-label="Username" aria-describedby="basic-addon1" required><br>
                <input type="password" name="adminpassword" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1" required><br><br><br>
                    

    <button type="submit" name="adminbtn"class="btn btn-primary btn-lg">Login</button>
    </form>
      </div>

    <div class="l">
    <img id="adminimg"src="https://freesvg.org/img/malecomputeruser15-0053405gosgpi.png" alt="">
    </div>
   
</span>
    </div>
</div>

<footer>
<div class="footer-links">
            <a href="#">Home</a>
            <a href="#">About Us</a>
            <a href="#">Services</a>
            <a href="#">Contact</a>
        </div>

        <div class="social-icons">
        <a href="https://www.linkedin.com/in/hemant-kumar-kashyap-918a0b236/" target="_blank"><i class="fab fa-linkedin"></i></a>
            <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="https://instagram.com/hemant_k_kashyap?igshid=MzMyNGUyNmU2YQ==" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>

        <div class="contact-info">
            <p>Email: kashyaphemant2004@gmail.com</p>
            <p>Phone: +91 7803026553</p>
        </div>

        <p>&copy; 2023 Event Manager. All Rights Reserved.</p>
   
</footer>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>


</body>
</html>
