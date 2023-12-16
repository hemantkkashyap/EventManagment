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

<div class="container0" style="display: flex; justify-content: center; align-items: center; flex-wrap: wrap;">
    <div id="left" class="col-md-6" style="display: flex; justify-content: center; align-items: center; flex-wrap: wrap;">
        <p id="Wlcm">Welcome You <br> to the</p>
        <img id="logo" src="https://us.123rf.com/450wm/artinspiring/artinspiring2209/artinspiring220900440/193706285-event-managemer-typographic-header-entertainment-specialist-organizing.jpg?ver=6" alt="">
    </div>
    <div id="right" class="col-md-6" style="display: flex; justify-content: center; align-items: center; flex-wrap: wrap;">
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" style="max-width: 100%;">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://thumbs.dreamstime.com/z/cricket-league-poster-design-faceless-character-player-team-different-poses-285032396.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://c8.alamy.com/comp/CTCDE6/football-poster-background-CTCDE6.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://c8.alamy.com/comp/EM1WHY/an-illustration-for-a-volleyball-tournament-flyer-or-poster-room-for-EM1WHY.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

</div>
<br>
<h1 id="heading" style="text-align: center;">Our Event Coordinators</h1>
<div class="container1" >

    <div class="events" style="display: flex; justify-content: center; align-items: center; flex-wrap: wrap;">

        <div class="card" id="card1"style="align-items:center; height: 480px;">
            <img src="Aditya.jpeg" class="card-img-top" alt="..."style="width:250px; height: 300px;">
            <div class="card-body" style="text-align: center;">
                <h5 class="card-title">Event Head</h5>
                <p class="card-text">Mr. Aditya Sharma is an expert in managing events.<br>Email: adityasharma@gmail.com</p>
            </div>
        </div>

        <div class="card" style="align-items:center; height: 480px;" id="card2">
            <img src="Abhay.jpeg" class="card-img-top" alt="..." style="width:200px; height: 300px;">
            <div class="card-body">
                <h5 class="card-title">Event Planner</h5>
                <p class="card-text">Mr. Abhay Singh Rawat, the idea of this website is of him and he is very good at planning events.<br>Email: abhaysinghrwt@gmail.com</p>
            </div>
        </div>

        <div class="card" style="align-items:center; height: 480px;" id="card3">
            <img src="Raj.jpeg" class="card-img-top" alt="..." style="width:200px; height: 300px;">
            <div class="card-body">
                <h5 class="card-title">Event Coordinator</h5>
                <p class="card-text">Mr. Raj Panchal is the Coordinator of the upcoming Events.<br>Email: rajpanchal@gmail.com</p>
            </div>
        </div>

        
        <div class="card" style="align-items:center; height: 480px;" id="card3">
            <img src="Raj.jpeg" class="card-img-top" alt="..." style="width:200px; height: 300px;">
            <div class="card-body">
                <h5 class="card-title">Event Coordinator</h5>
                <p class="card-text">Mr. Raj Panchal is the Coordinator of the upcoming Events.<br>Email: rajpanchal@gmail.com</p>
            </div>
        </div>

        
        <div class="card" style="align-items:center; height: 480px;" id="card3">
            <img src="Raj.jpeg" class="card-img-top" alt="..." style="width:200px; height: 300px;">
            <div class="card-body">
                <h5 class="card-title">Event Coordinator</h5>
                <p class="card-text">Mr. Raj Panchal is the Coordinator of the upcoming Events.<br>Email: rajpanchal@gmail.com</p>
            </div>
        </div>

        
        <div class="card" style="align-items:center; height: 480px;" id="card3">
            <img src="Raj.jpeg" class="card-img-top" alt="..." style="width:200px; height: 300px;">
            <div class="card-body">
                <h5 class="card-title">Event Coordinator</h5>
                <p class="card-text">Mr. Raj Panchal is the Coordinator of the upcoming Events.<br>Email: rajpanchal@gmail.com</p>
            </div>
        </div>
    </div>
</div>
 
<br>
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
<script>
        // Add the glow effect on page load
        document.addEventListener('DOMContentLoaded', function() {
            var wlcmElement = document.getElementById('Wlcm');
            wlcmElement.classList.add('glow');
        });
    </script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>


</body>
</html>
