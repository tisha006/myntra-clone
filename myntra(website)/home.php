<?php
include("navbar.php");
$q = "SELECT * FROM silder_images";
$result = mysqli_query($con, $q);
$count = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="css/nav.css">
</head>
<style>
  /* #s1:checked ~ #slide1, */
/* #s2:checked ~ #slide2, */
#s3:checked ~ #slide3,
 {
    box-shadow: 0 13px 26px rgba(0, 0, 0, 0.3), 0 12px 6px rgba(0, 0, 0, 0.2);
    transform: translate3d(0%, 0, 0px);
}
  </style>
<body>



<div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
    <div class="carousel-item active" style="height:600px;">
      <img src="./images/silder5.jpg" name="slide1" class="d-block w-100" alt="..." style="width:500px;">
    </div>
    <div class="carousel-item" style="height:600px;">
      <img src="./images/silder6.jpeg" name="slide2" class="d-block w-100" alt="..." style="width:400px;" >
    </div>
    <div class="carousel-item"style="height:600px;width:150%;">
      <img src="./images/silder7.png" name="slide3" class="d-block w-100" alt="..." style="height:600px;width:900px;">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

  <br><br>
  <div id="dealOfDay">
    <h4 class="h4text">DEAL OF THE DAY</h4><br>
    <?php
    $con = mysqli_connect("localhost", "root", "", "myntra_db");
    $result = $con->query("SELECT * FROM images LIMIT 8"); // Limit to 10 images

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<img src='" . $row["image_path"] . "' width='180px' height='240px'>";
        }
    } else {
        echo "No images found.";
    }
    ?>
</div>




<div id="bestOfBrands">
    <h4 class="h4text" style="padding-top:40px;">BEST OF MYNTRA EXCLUSIVE BRANDS</h4><br>
    <?php
    // Fetch images skipping the first 10
    $result = $con->query("SELECT * FROM images LIMIT 10,999999"); // Skip first 10, 999999 is a large number to essentially fetch remaining rows

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<img src='" . $row["image_path"] . "' width='180px' height='240px'>";
        }
    } else {
        echo "No images found.";
    }

    
    ?>
</div>


</body>
</html>





<?php
include("footer.php");
?>
