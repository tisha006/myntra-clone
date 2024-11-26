
<?php
if(isset($_POST['btn'])) {
    $image_name = uniqid() . $_FILES['slider1']['name'];
    $con = mysqli_connect("localhost", "root", "", "forms"); // Changed "form" to "forms"
    $q = "INSERT INTO `silder_images`(`image_name`) VALUES ('$image_name')";
    if(mysqli_query($con, $q)) {
        if(!is_dir("images/slider")) { // Corrected directory name
            mkdir("images/slider");
        }
        move_uploaded_file($_FILES['slider1']['tmp_name'], "images/slider/" . $image_name); // Corrected directory name
        echo "image uploaded successfully";
    } else {
        echo "error in uploading image";
    }
}
?>

<form action="imagesilderconnection.php" method="POST" enctype="multipart/form-data">
  Select images:<input type="file" name="slider1" id="">
  <br>
  <input type="submit" value="upload image" name="btn">
</form>
