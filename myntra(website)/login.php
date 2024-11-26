<?php
include('navbar.php');
$conn = new mysqli("localhost", "root", "", "myntra_db");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=2">
    <link rel="stylesheet" href="css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        .error {
            color: red;
            font-size: 13px;
            margin-bottom: 20px;
        }

        .error-message {
            color: red;
            font-size: 13px;
            padding-left: 2px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <br><br><br>
    <div class="form-box" style="width: 400px;height:80%;">
        <div class="welcome" style="font-size: 25px;">Login to your account</div><br>
        <form method="post">
            <div class="input-field">
                <input type="text" id="username" name="username" style="font-size: 15px;" placeholder="Enter your username">
                <div class="error-message" id="usernameerror"></div>
            </div>
            <div class="input-field">
                <input type="email" id="email" name="email" style="font-size: 15px;" placeholder="Enter your email">
                <div class="error-message" id="emailerror"></div>
            </div>
            <div class="input-field">
                <input type="password" id="pass1" style="font-size: 15px;" name="password" placeholder="Enter your password">
                <div class="error-message1" id="passerror"></div>
            </div>
            <div class="input-field">
                <select name="role" id="role" style="font-size: 15px; margin-top: 15px;">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <?php
            if (isset($_POST['login'])) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                if ($_POST['role'] == 'admin') {
            ?>
                    <script>
                        window.location.href = "../login.php";
                    </script>
                <?php
                    exit();
                } else {
                  
                    // Validate username
                    if (!preg_match("/^[a-zA-Z]*$/", $username)) {
                        echo '<div class="error-message">Username must contain only letters</div>';
                    } else {
                        $select = "SELECT * FROM registertable WHERE Email = '$email' ";
                        $result = $conn->query($select);

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $hashpassword = $row['password'];

                            if (password_verify($password, $hashpassword)) {
                                $_SESSION['username'] = $row['username'];
                                $_SESSION['email'] = $row['email'];

                                // Insert data into login table
                                $insert_query = "INSERT INTO login (username, email, password) VALUES ('$username', '$email', '$password')";
                                if ($conn->query($insert_query) === TRUE) {
                                    // Redirect to home page
                                    ?>
                                    <script>
                                        window.location.href = "home.php";
                                    </script>
                                <?php
                                } else {
                                    echo "Error: " . $insert_query . "<br>" . $conn->error;
                                }
                            } else {
                                echo '<div class="error-message">Incorrect email or password</div>';
                            }
                        } else {
                            echo '<div class="error-message">Incorrect email or password</div>';
                        }
                    }
                }
            }
            ?>
            <div class="forgot">
                <p style="font-size: 15px;"><a href="Forgot_password.php">Forget password?</a></p>
            </div>
            <div class="submit1">
                <p class="submit1" style="font-size: 15px;">Do not have an account? <a href="register.php">Create account</a></p>
            </div>
            <input type="submit" id="submit" name="login" style="font-size: 15px; padding: 5px;" value="CONTINUE" onclick="validateform()">
        </form>
    </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#username').keyup(function() {
                validateUsername();
            });

            $('#email').keyup(function() {
                validateEmail();
            });

            $('#pass1').keyup(function() {
                validatePassword();
            });

            function validateUsername() {
                var username = $('#username').val();
                var usernameRegex = /^[a-zA-Z]*$/;

                if (username === '') {
                    $('#usernameerror').text('This field is empty').addClass('error');
                } else if (!usernameRegex.test(username)) {
                    $('#usernameerror').text('Username must contain only letters').addClass('error');
                } else {
                    $('#usernameerror').text('').removeClass('error');
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
                var password = $('#pass1').val();
                var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$!%*?&]{6,}$/;

                if (password === '') {
                    $('#passerror').text('This field is empty').addClass('error');
                } else if (!passwordRegex.test(password)) {
                    $('#passerror').text('Must be enter one uppercase, one lowercase, and one symbol, and the min length 6').addClass('error');
                } else {
                    $('#passerror').text('').removeClass('error');
                }
            }
        });
    </script>
</body>

</html>

<?php
include('footer.php');
?>
