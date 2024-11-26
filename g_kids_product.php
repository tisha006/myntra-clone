
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
    <form method="POST">
        <div class="form-group">
            <label for="productName">category:</label><br>
            <input type="text" id="productName" name="productName" required>
        </div>
        <div class="form-group">
            <label for="productDescription">Product Description:</label><br>
            <input type="text" id="productDescription" name="productDescription" required>
        </div>
        <div class="form-group">
            <label for="productImage">Product Image URL:</label><br>
            <input type="text" id="productImage" name="productImage" required>
        </div>
        <div class="form-group">
        <label for="productPrice">Product Price:</label><br>
        <input type="text" id="productPrice" name="productPrice" required>
       </div>
        <button type="submit" name="submit" class="btn btn-primary">Add Product</button><br>
    </form>
</div>
<br><br>
<div class="card-container">
    <?php
    if (isset($_POST['submit'])) {
       
        $productName = $_POST['productName'];
        $productDescription = $_POST['productDescription'];
        $productImage = $_POST['productImage'];
        $productPrice = $_POST['productPrice']; 

        // Insert into database
        $sql = "INSERT INTO kids (description, image, price, category) VALUES ('$productDescription', '$productImage', '$productPrice', '$productName')";
        if (mysqli_query($con, $sql)) {
            echo "<p>New product added successfully.</p>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }

    
    $sql = "SELECT * FROM kids";
    $result = mysqli_query($con, $sql);

    echo '<div class="card-container" style="display: flex; flex-wrap: wrap;">';

while ($row = mysqli_fetch_assoc($result)) {
  echo '<div class="col-xl-4">';
 //echo '<div class="card" >';
echo '<img class="card-img-top" src="' . $row['image'] . '" alt="' . $row['category'] . '" width="100%" height="330px">';
echo '<div class="card-body">';
echo '<h5 class="card-title">' . $row['category'] . '</h5>';
// echo '<p class="card-text">' . $row['description'] . '</p>';
// echo '<p class="card-text">Price: $' . $row['price'] . '</p>'; 
echo '<br>';
echo '<h5 class="card-text" style="font-size:15px;color:rgb(65, 61, 61);">Price: ₹' . $row['price'] . '</h5>';
echo '<h5 class="card-text" style="font-size:15px;color:rgb(65, 61, 61);margin-bottom:20px; ">' . $row['description'] . '</h5>';

echo '<div class="btn-group" role="group">';
echo '<form method="post">';
echo '<div style="margin-right: 10px; display: inline-block;">';
echo '<input type="hidden"  name="update_id" value="' . $row['id'] . '">';
echo '<button type="submit" name="update_product" class="btn btn-primary">Update</button>';
echo '</div>';
echo '</form>';
echo '<form method="post">';
echo '<input type="hidden" name="delete_id" value="' . $row['id'] . '">';
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
       
        $delete = "DELETE FROM kids WHERE id=$product_id";
    
        if (mysqli_query($con, $delete)) {
           
            alert("Product deleted successfully.");
        } else {
            
            echo "Error: " . mysqli_error($con);
        } 
        // mysqli_close($con);
    } else {
       
        echo "Error: Unable to conect to the database.";
    }
}
?>
<?php
if (isset($_POST['update_product'])) {
    $product_id = $_POST['update_id'];
    $sql = "SELECT * FROM kids WHERE id = $product_id";
    $result = mysqli_query($con, $sql);
    $product = mysqli_fetch_assoc($result);

    // Display form with existing information
    echo '<div class="update-form">';
    echo '<h2>Update Product</h2>';
    echo '<form method="POST">';
    echo '<input type="hidden" name="update_id" value="' . $product['id'] . '">';
    echo '<div class="form-group">';
    echo '<label for="productName">Product Name:</label><br>';
    echo '<input type="text" id="productName" name="productName" value="' . $product['category'] . '" required>';
    echo '</div>';
    echo '<div class="form-group">';
    echo '<label for="productDescription">Product Description:</label><br>';
    echo '<input type="text" id="productDescription" name="productDescription" value="' . $product['description'] . '" required>';
    echo '</div>';
    echo '<div class="form-group">';
    echo '<label for="productImage">Product Image URL:</label><br>';
    echo '<input type="text" id="productImage" name="productImage" value="' . $product['image'] . '" required>';
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
  $productImage = $_POST['productImage'];
  $productPrice = $_POST['productPrice'];

  $sql = "UPDATE kids SET description='$productDescription', image='$productImage',price='$productPrice',category='$productName'  WHERE id=$product_id";
  if (mysqli_query($con, $sql)) {
      echo "<p>Product updated successfully.</p>";
  } else {
      echo "Error updating product: " . mysqli_error($con);
  }
}
?>


          

         

        </div>
    </div>
   

  
</body>
</html>