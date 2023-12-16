<?php
                use PHPMailer\PHPMailer\PHPMailer;
                use PHPMailer\PHPMailer\SMTP;
                use PHPMailer\PHPMailer\Exception;
                
                //Load Composer's autoloader
                require 'vendor/autoload.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registerBtn'])) {
    // Check if all required fields are filled
    if (isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
        // Check if passwords match
        if ($_POST['password'] === $_POST['confirm_password']) {
            // Handle registration logic here
            // Connect to the database and insert the user details
            // Example:
            $servername = "localhost"; // Change this if your database is hosted elsewhere
            $username = "root";
            $password = "Him@nshu2004";
            $dbname = "event_managment";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $query = "SELECT * FROM users WHERE email = '$email' OR username = '$username'";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                echo "Email or username already exists. Please use a different one.";
            } else {
                $sql = "INSERT INTO users (fullname, email, username, password) VALUES ('$fullname', '$email', '$username', '$password')";

                if ($conn->query($sql) === TRUE) {
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {
        //Server settings                     //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'example@gmail.com';                     //SMTP username
        $mail->Password   = '********';                                //SMTP password          //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('kashyaphemant2004@gmail.com', 'Event Head');
        $mail->addAddress($email);     //Add a recipient            //Name is optional
        $mail->addReplyTo('kashyaphemant2004@gmail.com', 'Event Head');
       //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Thank You for Registering!';
        $mail->Body    = "Dear ,$fullname<br><br>
    
        We wanted to extend our warmest thanks for signing up on our platform! Your registration for Event Managment is now complete. We are thrilled to have you as a part of our community.
        <br><br>
        As a registered member, you will gain access to Register for Events . We are confident that youll find our platform valuable and enjoyable.
        <br><br>
        If you have any questions, concerns, or feedback, please dont hesitate to contact us Our team is always ready to assist you
        <br><br>
        Thank you once again for choosing Event Managment. We hope you have a wonderful experience with us.
        <br><br>
        Best regards,
        <br><br>
        Hemant Kumar Kashyap<br>
        Event Coordinator<br>
        SDBCT<br>
        +91 780345345<br>
        <br><br>
        <p><img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTVWO6rffRiOhLVBU0l0Z5Q1-PCOzU9m2l0jzyF0_y64t4rcK1nP7bw1Ej4i0cgGfUHJkI&usqp=CAU' alt='Image Description'></p>
        ";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
     
    
        $mail->send();
        echo '<script>alert("Registered Succesfully !!");</script>';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
                    // Additional actions after successful registration (redirect, login, etc.)
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }      
            }
           
            $conn->close();
        } else {
            echo "Passwords do not match";
        }
    } else {
        echo "Please fill in all fields";
    }
}
?>
