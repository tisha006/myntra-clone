<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .profile-heading{
      max-width: 600px;
      margin: auto;
      padding: 20px;
      background-color: #f9f9f9;
      border-radius: 10px;
      box-shadow: 0px 1px 10px rgba(0, 0, 0, 0.1);
      margin-top: 7rem;
      
    }
    h5{
      padding-top:4px;
      color:#d63384;
    }

  
    </style>
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <?php
    include_once("nav.php");
    ?>
    <div class="col-md-10">
    <?php
    
    if (!isset($_SESSION['username'])) {
      ?>
      <script>
           window.location.href="login.php";
      </script>
     
      <?php
  }
     $email=$_SESSION['email_id'];
     $select="SELECT * FROM register WHERE email_id='$email';";
     $result=$con->query($select);
     $row=$result->fetch_assoc();
?>
          <div class="profile-heading">
          <img src="images/<?php
          if(empty($row['profile_photo'])){
            echo "dp.jpg";
          } else{
            echo $row['profile_photo'];
          }
          ?>"
          alt="Profile Picture" class="profile-img">
            <h5 class="card-title"><?= $row['username'];?></h5>
            <h5 class="card-title" style="padding-bottom:1rem;";><?= $row['email_id'];?></h5>
            <a href="edit_profile.php" class="btn" style="color:white; background-color:#E034BE;";>edit profile</a>
            <br>
            <br><br>
          </div>
        </div>
</div>
</div>
</body>
</html>
