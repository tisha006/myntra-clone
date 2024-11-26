<?php
$con = mysqli_connect("localhost", "root", "", "myntra_db");
?>
<div class="container-fluid">
  <div class="row">
    <?php
include_once("nav.php");
if (!isset($_SESSION['username'])) {
    ?>
    <script>
         window.location.href="login.php";
    </script>
    <?php
}
?>
<div class="col-md-10">
<?php



$email = $_SESSION['email_id'];

$select = "SELECT * FROM register WHERE email_id='$email'";
$result = $con->query($select);
$row = $result->fetch_assoc();
?>

<div class="container mt-3 w-50">
    <h1 style="color:#E034BE;">Edit profile</h1>
    <hr><br>
    <form method="post" enctype="multipart/form-data"> <!-- Add enctype for file upload -->
        <div class="mb-3 mt-3">
            <label for="username"style="color:#E034BE;">Username</label>
            <input type="text" class="form-control" name="username" placeholder="<?=$row['username'];?>">
        </div>
        <div class="mb-3 mt-3" style="color:#E034BE;">
            <label for="profile_picture">Profile Picture</label>
            <input type="file" class="form-control" name="profile_picture">
        </div>
        <img src="images/<?php
        if(empty($row['profile_photo'])){
            echo "dp.jpg";
        } else {
            echo $row['profile_photo'];
        }
        ?>"height="100px" width="100px">
        <button type="submit" name="update" class="btn btn-primary">Update</button>
     <a href="change_password.php" class="btn btn-primary">change  password</a>
    </form>
</div>

<?php
if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $profile_picture = $_FILES['profile_picture']['name'];
    $profile_picture_temp = $_FILES['profile_picture']['tmp_name'];

    
    $upload_directory = "images/";
    
    if (!file_exists($upload_directory)) {
        mkdir($upload_directory, 0777, true);
    }
   
    move_uploaded_file($profile_picture_temp, $upload_directory . '/' . $profile_picture);


    $update_query = "UPDATE register SET ";
    $fields_to_update = array();
    if (!empty($username)) {
        $fields_to_update[] = "username='$username'";
    }
    if (!empty($profile_picture)) {
        $fields_to_update[] = "profile_photo='$profile_picture'";
    }
    // If no fields are updated, do not proceed with the query
    if (!empty($fields_to_update)) {
        $update_query .= implode(", ", $fields_to_update);
        $update_query .= " WHERE email_id='$email'";
        
        // Execute the update query
        $update_result = mysqli_query($con, $update_query);
        
        // Check if update was successful
        if ($update_result) {
            echo "<script>alert('Profile updated successfully');</script>";
            echo "<script>window.location.href='profile.php';</script>"; 
        } else {
            echo "<script>alert('Failed to update profile');</script>";
        }
    } else {
        echo "<script>alert('No fields were updated');</script>";
    }
}
?>

</div>