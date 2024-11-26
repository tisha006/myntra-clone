
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add men product</title>
    <style>
    .cards {
        display: flex;
        justify-content: space-between;
    }
    /* .col-md-8 {
        flex: 0 0 auto;
        width: 20%; 
    } */
    .add-product-form {
            display: none;
            margin-top: 20px;
        }
        .form-container {
    width: 300px; /* Adjust the width as needed */
    margin: 0 auto; /* Center the container horizontally */
    text-align: center; /* Center text inside the container */
}

.form-container {
    width: 300px; /* Adjust the width as needed */
    margin: 0 auto; /* Center the container horizontally */
    text-align: center; /* Center text inside the container */
}

.form-group {
    margin-bottom: 20px; /* Add space between form elements */
}

input[type="text"] {
    width: 60%; /* Make textboxes fill the container width */
    padding: 8px; /* Add padding for better appearance */
    box-sizing: border-box; /* Include padding and border in the element's total width and height */
    border: 1px solid #ccc; /* Add border */
    border-radius: 4px; /* Add border radius */
}
#btn{
  padding-left: 4rem;
}
</style>
</head>
<body>
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
         <div class="col-md-10 cards">
        <div class="row">
          <?php
        if (!isset($_SESSION['username'])) {
      ?>
      <script>
           window.location.href="login.php";
      </script>
    <?php
        }
        ?>
  <div class="form-container">
    <h2>Add New Product</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="productName">category:</label><br>
            <input type="text" id="productName" name="productName" required>
        </div>
        <div class="form-group">
            <label for="productDescription">Product Description:</label><br>
            <input type="text" id="productDescription" name="productDescription" required>
        </div>
        <div class="form-group">
            <label for="productImage">Product Image:</label><br>
            <input type="file" id="productImage" name="productImage">
                </div>
        <div class="form-group">
        <label for="productPrice">Product Price:</label><br>
        <input type="text" id="productPrice" name="productPrice" required>
       </div>
        <button type="submit" name="submit" class="btn btn-primary">Add Product</button><br>
    </form>
    <h2>Add Offer</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group" enctype="multipart/form-data">
            <label for="productId">Product ID:</label><br>
            <input type="text" id="productId" name="productId" required>
        </div>
        <div class="form-group">
            <label for="discountPercentage">Discount Percentage:</label><br>
            <input type="text" id="discountPercentage" name="discountPercentage" required>
        </div>
        <div class="form-group">
            <label for="startDate">Start Date:</label><br>
            <input type="date" id="startDate" name="startDate" required>
        </div>
        <div class="form-group">
            <label for="endDate">End Date:</label><br>
            <input type="date" id="endDate" name="endDate" required>
        </div>
        <button type="submit" name="offers" class="btn btn-primary">Add Offer</button><br>
    </form>
    <?php
    if (isset($_POST['offers'])) {
            $productId = $_POST['productId'];
            $discountPercentage = $_POST['discountPercentage'];
            $startDate = $_POST['startDate'];
            $endDate = $_POST['endDate'];
        
            $sql = "INSERT INTO offers (product_id, discount_percentage, start_date, end_date) VALUES ('$productId', '$discountPercentage', '$startDate', '$endDate')";
        
            if ($con->query($sql) === TRUE) {
                echo "Offer added successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
            } 
    }
    ?>
</div>
<br><br>
<div class="card-container">
    <?php
    if (isset($_POST['submit'])) {
       
        $productName = $_POST['productName'];
        $productDescription = $_POST['productDescription'];
        $productPrice = $_POST['productPrice']; 
        // Insert into database
        $productImage = $_FILES['productImage']['name'];
        $targetDirectory = "myntra(website)/images/"; // Directory where you want to save the uploaded files
        $targetFile = $targetDirectory . basename($_FILES["productImage"]["name"]);
    
        if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $targetFile)) {
            echo "File uploaded successfully: " . $targetFile;
            // File uploaded successfully, proceed with database insertion
            $sql = "INSERT INTO men_products (price, category, p_name, p_image) VALUES ('$productPrice', '$productName', '$productDescription', '$productImage')";
            if (mysqli_query($con, $sql)) {
                echo "<p>New product added successfully.</p>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
 
    $sql = "SELECT * FROM men_products";
    $result = mysqli_query($con, $sql);

    echo '<div class="card-container" style="display: flex; flex-wrap: wrap;">';

while ($row = mysqli_fetch_assoc($result)) {
  echo '<div class="col-xl-4">';
 //echo '<div class="card" >';
echo '<img class="card-img-top" src="' . $row['p_image'] . '" alt="' . $row['category'] . '" width="100%" height="330px">';
echo '<div class="card-body">';
echo '<h5 class="card-title">' . $row['category'] . '</h5>';
// echo '<p class="card-text">' . $row['description'] . '</p>';
// echo '<p class="card-text">Price: $' . $row['price'] . '</p>'; 
echo '<br>';
// echo '<h5 class="card-text" style="font-size:15px;color:rgb(65, 61, 61);">Price: ₹' . $row['price'] . '</h5>';
$product_id = $row['p1_id'];
$offer_query = "SELECT * FROM offers WHERE product_id = $product_id AND start_date <= CURDATE() AND end_date >= CURDATE()";
$offer_result = mysqli_query($con, $offer_query);

if (mysqli_num_rows($offer_result) > 0) {
    // Offer is available
    $offer_row = mysqli_fetch_assoc($offer_result);
    $discount_percentage = $offer_row['discount_percentage'];
    
    // Calculate discounted price
    $original_price = $row['price'];
    $discounted_price = $original_price - ($original_price * ($discount_percentage / 100));
    
    // Display original price with a strike-through and discounted price
    echo '<h5 style="font-size:15px;color:rgb(65, 61, 61);">₹' . $discounted_price . ' <span style="text-decoration: line-through;">MRP ₹' . $original_price . '</span> (' . $discount_percentage . '% OFF)</h5>';
    } else {
    // No offer available, display original price only
    echo '<h5 class="card-text" style="font-size:15px;color:rgb(65, 61, 61);">Price: ₹' . $row['price'] . '</h5>';
}
echo '<h5 class="card-text" style="font-size:15px;color:rgb(65, 61, 61);margin-bottom:20px; ">' . $row['p_name'] . '</h5>';

echo '<div class="btn-group" role="group">';
echo '<form method="post" enctype="multipart/form-data">';
echo '<div style="margin-right: 10px; display: inline-block;">';
echo '<input type="hidden"  name="update_id" value="' . $row['p1_id'] . '">';
echo '<button type="submit" name="update_product" class="btn btn-primary">Update</button>';
echo '</div>';
echo '</form>';
echo '<form method="post">';
echo '<input type="hidden" name="delete_id" value="' . $row['p1_id'] . '">';
echo '<button type="submit" class="btn btn-danger" name="delete_product">Delete</button>';
echo '</form>';
 //echo '</div>'; 
echo '</div>'; 
echo '</div>'; 
echo '</div>'; 
}
echo '</div>'; 
?>
</div>
     <?php
if (isset($_POST['delete_product'])) {

    $product_id = $_POST['delete_id'];

    if ($con) {
       
        $delete = "DELETE FROM men_products WHERE p1_id=$product_id";
    
        if (mysqli_query($con, $delete)) {
           
            echo"Product deleted successfully.";
        } else {
            
            echo "Error: " . mysqli_error($con);
        } 
        // mysqli_close($con);
    } else {
       
        echo "Error: Unable to connect to the database.";
    }
}
?>
<?php
if (isset($_POST['update_product'])) {
    $product_id = $_POST['update_id'];
    $sql = "SELECT * FROM men_products WHERE p1_id = $product_id";
    $result = mysqli_query($con, $sql);
    $product = mysqli_fetch_assoc($result);

    // Display form with existing information
    echo '<div class="update-form">';
    echo '<h2>Update Product</h2>';
    echo '<form method="POST" enctype="multipart/form-data">';
    echo '<input type="hidden" name="update_id" value="' . $product['p1_id'] . '">';
    echo '<div class="form-group">';
    echo '<label for="productName">Product Name:</label><br>';
    echo '<input type="text" id="productName" name="productName" value="' . $product['category'] . '" required>';
    echo '</div>';
    echo '<div class="form-group">';
    echo '<label for="productDescription">Product Description:</label><br>';
    echo '<input type="text" id="productDescription" name="productDescription" value="' . $product['p_name'] . '" required>';
    echo '</div>';
    echo '<div class="form-group">';
    echo '<input type="file" id="productImage" name="productImage"><br>';
    echo '<img src="' . $product['p_image'] . '" alt="Product Image" style="max-width: 200px;"><br>'; // Display current image
    echo '</div>';
    echo '<div class="form-group">';
    echo '<label for="productPrice">Product Price:</label><br>';
    echo '<input type="text" id="productPrice" name="productPrice" value="' . $product['price'] . '" required>';
    echo '</div>';
    echo '<button type="submit" name="save_changes" class="btn btn-primary">Save Changes</button>';
    echo '</form>';  
    echo '</div>';
}

if (isset($_POST['save_changes'])) {
  $product_id = $_POST['update_id'];
  $productName = $_POST['productName'];
  $productDescription = $_POST['productDescription'];
  $productPrice = $_POST['productPrice'];

  if ($_FILES['productImage']['name'] != '') {

    $productImage = $_FILES['productImage']['name'];

    // Define the directory where uploaded files will be saved
    $targetDirectory = "images/";

    // Define the path of the target file
    $targetFile = $targetDirectory . basename($_FILES["productImage"]["name"]);

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $targetFile)) {
        // If the file is uploaded successfully, update the database
        $sql = "UPDATE men_products SET category='$productName', p_name='$productDescription', p_image='$productImage', price='$productPrice' WHERE p1_id=$product_id";
        if (mysqli_query($con, $sql)) {
            echo "<p>Product updated successfully.</p>";
        } else {
            echo "Error updating product: " . mysqli_error($con);
        }
    } else {
        // If there is an error uploading the file
        echo "Sorry, there was an error uploading your file.";
    }
} else {
    $sql = "UPDATE men_products SET category='$productName', p_name='$productDescription', price='$productPrice' WHERE p1_id=$product_id";
    if (mysqli_query($con, $sql)) {
        echo "<p>Product updated successfully.</p>";
    } else {
        echo "Error updating product: " . mysqli_error($con);
    }
}
}

?>

</div>
    </div>
 
</body>
</html>