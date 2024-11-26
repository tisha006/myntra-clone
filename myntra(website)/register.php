<?php
include("navbar.php");

// Include PHPMailer classes
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    $activation_token = bin2hex(random_bytes(16)); // Generate activation token
    $status = 'inactive'; // Set status to inactive

    if ($password === $c_password) {
        $hashpassword = password_hash($password, PASSWORD_DEFAULT);

        $sql_check_email = "SELECT email FROM registertable WHERE email=?";
        $stmt_check_email = $conn->prepare($sql_check_email);
        $stmt_check_email->bind_param("s", $email);
        $stmt_check_email->execute();
        $result_check_email = $stmt_check_email->get_result();

        if ($result_check_email->num_rows > 0) {
            $fire = "Email Already exists";
        } else {
            $sql_insert_user = "INSERT INTO registertable (username, email, password, activation_token, status) VALUES (?, ?, ?, ?, ?)";
            $stmt_insert_user = $conn->prepare($sql_insert_user);
            $stmt_insert_user->bind_param("sssss", $username, $email, $hashpassword, $activation_token, $status);
            $stmt_insert_user->execute();

            // Send email
            $from = "dbhalani742@rku.ac.in"; // Replace with your Gmail address
            $password = "D7594007"; // Replace with your Gmail password
            $to_id = $email;
            $message = "Hi $username! Please click the link below to activate your account: http://localhost/myntra(website)/activation_page.php?token=$activation_token";

            // Initialize PHPMailer
            $mail = new PHPMailer(true);

            try {
                // SMTP configuration
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 465; // For SSL
                $mail->SMTPSecure = 'ssl';
                $mail->SMTPAuth = true;
                $mail->Username = $from;
                $mail->Password = $password;

                // Sender and recipient details
                $mail->setFrom($from);
                $mail->addAddress($to_id);

                // Email content
                $mail->isHTML(true);
                $mail->Subject = "Activate your account";
                $mail->Body = $message;

                // Send email
                if ($mail->send()) {
                    $res = "Email sent successfully to $to_id.";
                } else {
                    $res1 = "Message could not be sent.";
                }
            } catch (Exception $e) {
                $res1 = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    } 
    // else {
    //     $res1 = "Passwords do not match.";
    // }
}
?>

<!-- Rest of your HTML code -->

<!-- Rest of your HTML code -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/register.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <style>
        .error {
            color: red;
            padding-left: 25px;
            font-size: 10px;
            margin-top: -29px;
            margin-bottom: 15px;
        }
        .result
        {
            color:red;
            fon-family:sans-serif;
            font-size:14px;
        }
    </style>

    <div class="form-box">
        <form method="POST" id="registrationForm">
            <div class="welcome">
                <p>Create account</p><br>
            </div>
            <input type="text" class="input-field" id="username" name="username" placeholder="Enter your name*">
            <div class="error-message1" id="nameerror"></div>

            <input type="text" id="email" class="input-field" name="email" placeholder="Enter your email*">
            <div class="error-message1" id="emailerror"></div>


            <input type="text" id="pass1" class="input-field" name="password" placeholder="Enter your password*">
            <div class="error-message1" id="pwd_Error"></div>

            <input type="password" id="pass2" class="input-field" name="c_password" placeholder="Confirm password*">
            <div class="error-message1" id="c_PassError"></div>
            <div class="result"><?php if(isset($res1)) echo $res1;?></div>


            <div class="submit1">
                <p>Already have an account? <a href="login.php">Sign in</a></p>
            </div>
            <input type="submit" id="submit" name="login" style="font-size:12px; padding:5px;" value="CONTINUE">
        </form>
    </div>

    <!-- js  -->
    <script>
        $(document).ready(function() {
            // Define password variable in JavaScript by echoing the PHP variable
            var password = '<?php echo $password; ?>';

            $('#username').keyup(function() {
                validatename();
            });

            $('#email').keyup(function() {
                validateEmail();
            });

            // Validate password on keyup
            $('#pass1').keyup(function() {
                validatePassword();
            });

            $('#pass2').keyup(function() {
                validatePassword2();
            });

            function validatename() {
                var name = $('#username').val();
                var nameRegex = /^[a-zA-Z]+$/;

                if (name === '') {
                    $('#nameerror').text('This field is empty').addClass('error');
                } else if (!nameRegex.test(name)) {
                    $('#nameerror').text('Number is not allowed').addClass('error');
                } else {
                    $('#nameerror').text('').removeClass('error');
                }
            }

            function validateEmail() {
                var email = $('#email').val();
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                if (email === '') {
                    $('#emailerror').text('This field is empty').addClass('error');
                } else if (!emailRegex.test(email)) {
                    $('#emailerror').text('Email is invalid').addClass('error');
                } else {
                    $('#emailerror').text('').removeClass('error');
                }
            }

            function validatePassword() {
                var password1 = $('#pass1').val(); // Use password1 instead of password
                var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-z\d@$!%*?&]{6,}$/;

                if (password1 === '') {
                    $('#pwd_Error').text('This field is empty').addClass('error');
                } else if (!passwordRegex.test(password1)) {
                    $('#pwd_Error').text('Must enter one uppercase, one lowercase, one symbol, and minimum length 6').addClass('error');
                } else {
                    $('#pwd_Error').text('').removeClass('error');
                }
            }

            function validatePassword2() {
                var password1 = $('#pass2').val();
                if (password1 === '') {
                    $('#c_PassError').text('This field is empty').addClass('error');
                } else if (password1 !== password) { // Compare with the correct variable
                    $('#c_PassError').text('Passwords do not match').addClass('error');
                } else {
                    $('#c_PassError').text('').removeClass('error');
                }
            }
        });
    </script>

    <?php
    include("footer.php");
    ?>
</body>

</html>