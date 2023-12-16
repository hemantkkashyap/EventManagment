<?php
include 'db.php';
session_start(); // Starting the session
if (isset($_SESSION['username'])) {
    $user_name = $_SESSION['username'];
    // Now $username has the value from the login
} else {
    // The username isn't set; you might want to handle this condition
}?>
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

<div class="dashnav-right">

<h7 id="user">Hello <?php echo $user_name;?></h7>
<form action="profile.php">
    <button id ="profile">
  <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/480px-User_icon_2.svg.png" alt="">
  </button></form>   
    
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
   
    <div class="offcanvas-header">
     
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Team Event</h5>

        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">Log Out</a>
          </li>
        </ul>
      </div>
    </div>
    </div>
  </div>
</nav>

<div class="contanier">
  
<div class="events">

<div class="card" style="width: 18rem;">
<img src="https://play-lh.googleusercontent.com/EjJV6kCXgX9EIhKEtpYhQF8-BUb5En8sDKpOPiWSQJUxv9_RAfl4tMxyIMkQYgeqC6I" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Basketball</h5>
    <p class="card-text">If You are Interested In Participating in Basketball Event you can click on view more to see the details of the event .</p>
        <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basketballModal">View More</button>  

        <div class="modal fade" id="basketballModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
      <h1 class="modal-title fs-5" id="staticBackdropLabel">Baskteball Event</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    <p><strong>Organizers:</strong> Hosted by Bansal College</p>
    <p><strong>Date:</strong> Saturday, 28th of October</p>
    <p><strong>Time:</strong> 6:00 PM to Midnight</p>
    <p><strong>Location:</strong> Aurora Palace, the city's premier ballroom.</p>
    <p><strong>Description:</strong> Join us for an electrifying college basketball event hosted by Bansal College. Experience thrilling matches, live entertainment, and interactive activities. Cheer for your favorite teams and celebrate the spirit of sportsmanship.</p>
    <p><strong>Highlights:</strong></p>
    <ul>
        <li>Exciting college basketball matches</li>
        <li>Live entertainment</li>
        <li>Interactive activities</li>
        <li>Prizes and giveaways</li>
    </ul>
    <p><strong>Tickets:</strong> Limited availability for an unforgettable basketball experience. Get your tickets now!</p>

      <div class="modal-footer">
      <form method="post">
    <a href="eventreg.php?eventname=Basketball Event">Register for the Event</a>
</form>
      </div>
    </div>
  </div>
</div>
</div>
  </div>
</div>

  
<div class="card" style="width: 18rem;">
<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR6wNGzbXut4nJEtKRjXLwHoni1N7-eHK2wpQ&usqp=CAU" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Cricket</h5>
    <p class="card-text">If You are Interested In Participating in Cricket Event you can click on view more to see the details of the event .</p>
        <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#CricketModal">View More</button>  

<!-- Modal -->
<div class="modal fade" id="CricketModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Cricket Event</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <h2>College Cricket Event</h2>
    <p><strong>Organizers:</strong> Hosted by Bansal College</p>
    <p><strong>Date:</strong> Saturday, 28th of October</p>
    <p><strong>Time:</strong> 2:00 PM to 8:00 PM</p>
    <p><strong>Location:</strong> Bansal College Cricket Ground</p>
    <p><strong>Description:</strong> Get ready for a thrilling day of cricket action at Bansal College! Join us for a college cricket tournament featuring intense matches, exciting moments, and a celebration of the cricket spirit. Whether you're a cricket enthusiast or just looking for a fun day out, this event is not to be missed!</p>
    <p><strong>Highlights:</strong></p>
    <ul>
        <li>College cricket tournament</li>
        <li>Exciting matches</li>
        <li>Food stalls and refreshments</li>
        <li>Prizes for the winning team</li>
    </ul>
    <p><strong>Registration:</strong> Teams can register by [Include registration details here]</p>
    <p><strong>Spectators:</strong> All students and cricket fans are welcome to cheer for their favorite teams. Admission is free!</p>
      
      </div>
      <div class="modal-footer">
      <form method="post">
    <a href="eventreg.php?eventname=Cricket Event">Register for the Event</a>
</form>
      </div>
    </div>
  </div>
</div>
  </div>
</div>



<div class="card" style="width: 18rem;">
<img src="https://rukminim2.flixcart.com/image/850/1000/xif0q/ball/h/k/o/450-23-street-soccer-rubber-molded-5-1-na-football-vector-x-original-imagrf4h3yrbbhcs.jpeg?q=90" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Football</h5>
    <p class="card-text">If You are Interested In Participating in Football Event you can click on view more to see the details of the event .</p>
        <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#FootballModal">View More</button>  

<!-- Modal -->
<div class="modal fade" id="FootballModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Football Event</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
  
      <h2>College Football Event</h2>
    <p><strong>Organizers:</strong> Hosted by Bansal College</p>
    <p><strong>Date:</strong> [Date of the event]</p>
    <p><strong>Time:</strong> [Time of the event]</p>
    <p><strong>Location:</strong> [Football Ground or Stadium]</p>
      
      </div>
      <div class="modal-footer">
      <form method="post">
    <a href="eventreg.php?eventname=Football Event">Register for the Event</a>
</form>
      </div>
    </div>
  </div>
</div>
  </div>
</div>


<div class="card" style="width: 18rem;">
  <img src="data:image/jpeg;base64,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" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Chess</h5>
    <p class="card-text">If You are Interested In Participating in Chess Event you can click on view more to see the details of the event .</p>
        <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ChessModal">View More</button>  

<!-- Modal -->
<div class="modal fade" id="ChessModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Chess Event</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">  
      <h2>College Chess Event</h2>
    <p><strong>Organizers:</strong> Hosted by Bansal College</p>
    <p><strong>Date:</strong> [Date of the event]</p>
    <p><strong>Time:</strong> [Time of the event]</p>
    <p><strong>Location:</strong> [Chess Room or designated area]</p>
      
      </div>
      <div class="modal-footer">
      <form method="post">
    <a href="eventreg.php?eventname=Chess Event">Register for the Event</a>
</form>
      </div>
    </div>
  </div>
</div>
  </div>
</div>


<div class="card" style="width: 18rem;">
<img src="https://t3.ftcdn.net/jpg/05/12/64/04/360_F_512640455_eC4VxfRkc9OWiPP148YWfOUGyMgRilHj.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Vollyball</h5>
    <p class="card-text">If You are Interested In Participating in Basketball Event you can click on view more to see the details of the event .</p>
        <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basketballModal">View More</button>  

        <div class="modal fade" id="basketballModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
      <h1 class="modal-title fs-5" id="staticBackdropLabel">Baskteball Event</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <h2>College Volleyball Event</h2>
    <p><strong>Organizers:</strong> Hosted by Bansal College</p>
    <p><strong>Date:</strong> [Date of the event]</p>
    <p><strong>Time:</strong> [Time of the event]</p>
    <p><strong>Location:</strong> [Volleyball Court or designated area]</p>
  

      <div class="modal-footer">
      <form method="post">
    <a href="eventreg.php?eventname=Basketball Event">Register for the Event</a>
</form>
      </div>
    </div>
  </div>
</div>
</div>
  </div>
</div>

<div class="card" style="width: 18rem;">
<img src="https://www.shutterstock.com/image-vector/microphone-icon-creative-circle-speaker-260nw-532074682.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Singing</h5>
    <p class="card-text">If You are Interested In Participating in Basketball Event you can click on view more to see the details of the event .</p>
        <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basketballModal">View More</button>  

        <div class="modal fade" id="basketballModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
      <h1 class="modal-title fs-5" id="staticBackdropLabel">Baskteball Event</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <h2>College Singing Event</h2>
    <p><strong>Organizers:</strong> Hosted by Bansal College</p>
    <p><strong>Date:</strong> [Date of the event]</p>
    <p><strong>Time:</strong> [Time of the event]</p>
    <p><strong>Location:</strong> [Performance Hall or designated area]</p>
  

      <div class="modal-footer">
      <form method="post">
    <a href="eventreg.php?eventname=Basketball Event">Register for the Event</a>
</form>
      </div>
    </div>
  </div>
</div>
</div>
  </div>
</div>


<div class="card" style="width: 18rem;">
<img src="https://previews.123rf.com/images/scusi/scusi1406/scusi140600007/28894090-marathon-runners.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">100 meter Running</h5>
    <p class="card-text">If You are Interested In Participating in Basketball Event you can click on view more to see the details of the event .</p>
        <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#RunningModal">View More</button>  

        <div class="modal fade" id="RunningModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
      <h1 class="modal-title fs-5" id="staticBackdropLabel">Running Event</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <h2>College Running Event</h2>
    <p><strong>Organizers:</strong> Hosted by Bansal College</p>
    <p><strong>Date:</strong> [Date of the event]</p>
    <p><strong>Time:</strong> [Time of the event]</p>
    <p><strong>Location:</strong> [Starting point and route details]</p>
   
      <div class="modal-footer">
      <form method="post">
    <a href="eventreg.php?eventname=Running Event">Register for the Event</a>
</form>
      </div>
    </div>
  </div>
</div>
</div>
  </div>
</div>


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
