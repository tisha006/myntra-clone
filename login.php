 <?php
$con = mysqli_connect("localhost", "root", "","myntra_db");
session_start();
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
    <style>
    body {
            font-family: Arial, sans-serif;
            background-color:rgba(246, 220, 226, 0.617);
        }

        .form-container {
            max-width: 400px;
            margin: 0 auto;
            margin-top: 6rem;
            padding: 40px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px #000;
            
        }

        .form-container h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            /* width:60%;
height:450px;
margin: 20px auto;
padding: 39px;
background-color:white; */
            
        }

        .form-group {
            margin-bottom: 30px;
        }

        .form-group label {
            display: block;
            /* font-weight: bold; */
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .error-message {
            color: red;
        }

        .btn-primary {
            background-color: #e4348a;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #c72c7d;
        }
        /* .form-box {
width:60%;
height:450px;
margin: 20px auto;
padding: 39px;
background-color:white;

} */


 .input-field {

margin-bottom: 10px;
padding-top:1px;
width:99%;
padding-left:6px;
height:45px;

}
    </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 form-section">
        <!-- Registration Form -->
        
        <!-- <div class="form-container" style="display: none;" id="registrationForm">
          <h2 class="text-center">Registration</h2>

          <form id="registrationForm" onsubmit="return validateRegistration()" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="registerUsername">Username</label>
              <input type="text" class="form-control" id="registerUsername" placeholder="Enter username" name="username">
              <small class="error-message" id="usernameError"></small>
            </div>
            <div class="form-group">
              <label for="registerEmail">Email address</label>
              <input type="email" class="form-control" id="registerEmail" aria-describedby="emailHelp"
                placeholder="Enter email" name="em">
              <small class="error-message" id="emailError"></small>
            </div>
            <div class="form-group">
              <label for="registerPassword">Password</label>
              <input type="password" class="form-control" id="registerPassword" placeholder="Password" minlength="8" name="pass">
              <small class="error-message" id="passwordError"></small>
            </div>
            <button type="submit" class="btn btn-primary btn-block" name="btn1"
              style="background-color: rgb(224, 52, 138);">Register</button>
            <p class="mt-3 text-center">Already have an account? <a href="login.php" id="loginLink">Login here</a></p>
          </form>
        </div> -->
 <?php

// if(isset($_POST['btn1'])) {
//   $username = $_POST['username'];
//   $em = $_POST['em'];
//   $pass = $_POST['pass'];

//   // Hash the password
//   $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

//   // Insert the new user
//   $insert = "INSERT INTO register (username, email_id, user_password) 
//              VALUES ('$username', '$em', '$hashed_password')";

//   if(mysqli_query($con, $insert)){
//       echo "Inserted successfully";
//   } else{
//       echo "Error inserting record: " . mysqli_error($con);
//   }
//}
?>


        <!-- Login Form -->
        <div class="form-container">
          <h2 class="text-center">Login to your account</h2>
          <form method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="adminUsername">Username</label>
              <input type="text" class="form-control" id="adminUsername" placeholder="Enter username" name="username">
              <small class="error-message" id="adminUsernameError"></small>

            </div>
            <div class="form-group">
              <label for="adminPassword">Password</label>
              <input type="password" class="form-control" id="adminPassword" placeholder="Password" name="pass">
              <small class="error-message" id="adminPasswordError"></small>
            </div>
            <a href="Forgot_password.php" class="mt-3 text-center">
                    Forgot Password?
            </a>
            <!-- <input type="submit" value="login" name="btn"> -->
            <input type="submit" name="btn" class="btn btn-primary btn-block" style="background-color: rgb(224, 52, 138);" value="login">
            
         </form>
        </div>
        
      </div>
    </div>
  </div>


<?php
if(isset($_POST['btn'])) {
  $username = $_POST['username'];
  $pass = $_POST['pass'];

 
  // Query the database
  $query = "SELECT * FROM register WHERE username = '$username'";
  $result = mysqli_query($con, $query);

  // Check if there's a match
  if (mysqli_num_rows($result) === 1) {
      // Fetch the result as an associative array
      $row = mysqli_fetch_assoc($result);

      // Verify the entered password against the hashed password stored in the database
      if (password_verify($pass, $row['user_password'])) {
          
    
          $_SESSION['username'] = $row['username'];
          $_SESSION['email_id'] = $row['email_id'];
          
          ?>
          <script>
              window.location.href="t.php";
          </script>
          <?php
      } else {
          
          echo "Incorrect password";
      }
  } else {
      
      echo "User not found";
  }

  
}

?>
  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Bootstrap JS -->
  <script>
    $(document).ready(function () {
      
      // $('#registerLink').click(function (e) {
      //   e.preventDefault();
      //   $('.form-container').hide();
      //   $('#registrationForm').show();
      // });

      // // Show login form on login link click
      // $('#loginLink').click(function (e) {
      //   e.preventDefault();
      //   $('.form-container').hide();
      //   $('#loginForm').show();
      // });

      // $('#registerUsername').on('input', function () {
      //   validateUsername();
      // });

      // $('#registerEmail').on('input', function () {
      //   validateEmail();
      // });

      // $('#registerPassword').on('input', function () {
      //   validatePassword();
      // });

      // Login form real-time validation
      // $('#adminUsername').on('input', function () {
      //   validateAdminUsername();
      // });

      // $('#adminPassword').on('input', function () {
      //   validateAdminPassword();
      // });

      // // Registration form submission
      // $('#registerForm').submit(function (e) {
      //   e.preventDefault(); // Prevent form submission

        
      //   validateUsername();
      //   validateEmail();
      //   validatePassword();

      //   if ($('#usernameError').text() !== '' || $('#emailError').text() !== '' || $('#passwordError').text() !== '') {
      //     return;
      //   }

      //   console.log('Registration successful!');
      // });

      // Login form submission
      $('#loginForm').submit(function (e) {
        e.preventDefault();

        validateAdminUsername();
        validateAdminPassword();

        if ($('#adminUsernameError').text() !== '' || $('#adminPasswordError').text() !== '') {
          return;
        }

        //  window.location.href = 'orders.php';
      });

      // Functions to validate individual fields for registration form
      // function validateUsername() {
      //   var username = $('#registerUsername').val();
      //   if (/^\d+$/.test(username) || /^\d/.test(username)) {
      //     $('#usernameError').text('Username cannot consist only of numbers or start with a number');
      //   } else if (username.length > 20) {
      //     $('#usernameError').text('Username cannot exceed 20 characters');
      //   } else if (!/^[a-zA-Z0-9_\-]+$/. test(username)) {
      //     $('#usernameError').text('Username can only contain letters, numbers, underscores, and hyphens');
      //   } else if (!/^[a-zA-Z]/.test(username)) {
      //     $('#usernameError').text('Username must start with a letter');
      //   } else if (username.length < 5) {
      //     $('#usernameError').text('Username must be at least 5 characters');
      //   }else {
      //     $('#usernameError').text('');
      //   }
      // }

      // function validateEmail() {
      //   var email = $('#registerEmail').val();
      //   var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
      //   if (!emailRegex.test(email)) {
      //     $('#emailError').text('Invalid email format');
      //   } else {
      //     $('#emailError').text('');
      //   }
      // }

      // function validatePassword() {
      //   var password = $('#registerPassword').val();
      //   if (password.length < 8 || password.length > 20) {
      //     $('#passwordError').text('Password must be between 8 and 20 characters');
      //   } else {
      //     $('#passwordError').text('');
      //   }
      // }

      // Functions to validate individual fields for login form
      function validateAdminUsername() {
        var username = $('#adminUsername').val();
        if (/^\d+$/.test(username) || /^\d/.test(username)) {
          $('#adminUsernameError').text('Username cannot consist only of numbers or start with a number');
        }
         else if (username.length > 20) {
          $('#adminUsernameError').text('Username cannot exceed 20 characters');
        } else if (!/^[a-zA-Z0-9_\-]+$/.test(username)) {
          $('#adminUsernameError').text('Username can only contain letters, numbers, underscores, and hyphens');
        } else if (!/^[a-zA-Z]/.test(username)) {
          $('#adminUsernameError').text('Username must start with a letter');
        } else if (username.length < 5) {
          $('#adminUsernameError').text('Username must be at least 5 characters');
        }else {
          $('#adminUsernameError').text('');
        }
      }

      function validateAdminPassword() {
        var password = $('#adminPassword').val();
        if (password.length < 8 || password.length > 20) {
          $('#adminPasswordError').text('Password must be between 8 and 20 characters');
        } else {
          $('#adminPasswordError').text('');
        }
      }
    });
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




</body>
</html>