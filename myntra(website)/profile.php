<?php
    include_once("navbar.php");
    if (!isset($_SESSION['email'])) {
      ?>
      <script>
           window.location.href="login.php";
      </script>
     
      <?php
  }
     $email=$_SESSION['email'];
     $select="SELECT * FROM registertable WHERE email='$email';";
     $result=$con->query($select);
     $row=$result->fetch_assoc();
?>



<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>


<body> 
<br><br><br><div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
     <div class="card p-4"style="background-color:#fff;border:solid gray 1px;border-radius:none;width:25%;height:350px;"> 
        <div class=" image d-flex flex-column justify-content-center align-items-center"> 
          <img src="images/<?php
          if(empty($row['profile_picture'])){
            echo "profile_icon.jpg";
          } else{
            echo $row['profile_picture'];
          }
          ?>"width="155px" height="155px"/>

          <span class="name mt-3" style="font-size:25px;">Welcome,<?= $row['username'];?></span>
            <span class="id" style="font-size:18px;"><?= $row['email'];?></span><br>
            <a href="edit_profile.php"><input type="button" style="background-color:#ed1446;color:white;width:120px;height:40px;font-size:20px;"value="Edit Profile"></a>
            <!-- <button type="submit" name="edit">edit</button> -->
          </div>
        </div>
</div>
</div>
</body>
</html>
<?php
include_once("footer.php");
?>