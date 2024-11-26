<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- <link rel="stylesheet" href="add_to_cart.css"> -->

  <style>
    body{
        font-size:70px;
    }
    .remove-from-cart {
    width: 20px; /* Adjust the width and height as needed to make it circular */
    height: 20px;
    border-radius: 50%;
    /* background-color:lightgray;  */
    border: none; 
    top: 1px;
    left: 167px;
    font-size: 12px; 
    color:darkgray; 
    position:absolute;
   ;
  }
  .invisiblebtn {
    border: 0px;
    background-color: white;
    font-size:20px;
  }
  .btn{
            font-size: 15px;
            text-align: center;
            background-color:#ff3f6c;
            border: none;
            text-decoration: none;
            color: #fff;
            height: 30px;
            width: 79%;
            margin-bottom:90px;
            padding:7px;
           margin-left:1px;
            /* margin: auto; */
           
        }
        .btn:hover{
            background-color:#ff3f6c9a;
        }
    .product-details {
      /* display: inline-block; */
      position: relative;
      border: solid lightgray 1px;
      margin-bottom: 20px;
      width:420px; /* Adjust as needed */
      height: 135px; /* Adjust as needed */
      padding: 10px;
      margin-left:190px;
    }
    .product-details img {
      width: 160px;
      height: 180px;
      border: solid lightgray 1px;
    }
    .product-name {
      color: gray;
      font-size: 20px;
      word-wrap: break-word;
      margin-top:-110px;
      margin-left:190px;
    }
    .product-price {
      color: black;
      font-size: 20px;
      margin-top: 10px;
      margin-left:190px;
    }
    .remove-from-cart {
      position: absolute;
      top: 5px;
      margin-left:445px;
    }
    .view-product-btn {
      position: absolute;
      bottom: 10px;
      right: 10px;
    }
    .quantity-select {
      width: 80px;
    }
  </style>
</head>
<body>

<?php

include("navbar.php");

if (!isset($_SESSION['email'])) {
    ?>
    <script>
         window.location.href="login.php";
    </script>
   
    <?php
}
// $con = mysqli_connect("localhost", "root", "", "forms");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$offers_table_sql = "CREATE TABLE IF NOT EXISTS offer (
    id int(11) NOT NULL AUTO_INCREMENT,
    offer_description varchar(255) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
$con->query($offers_table_sql);
$offers_sql = "SELECT * FROM offer";
$offers_result = $con->query($offers_sql);
?>

<br><br><div id="container">
    <div id="bagBody">
        <div id="bagLeft">
            <div class="flexThis" style="border: 1px solid rgb(193, 193, 193); margin-bottom: 15px;margin-top:45px;margin-left:190px;width:45%;height: 90px; padding: 15px; border-radius: 5px;">
                <h5 style="padding-left:20px;font-size:30px;margin-top:10px;">Shopping Cart</h5>
            </div>
            <div class="border1"style="border: 1px solid rgb(193, 193, 193);width:45%;height:60%;margin-left:190px;padding:20px;font-size:22px; border-radius: 5px;">
                <h4>Available Offers</h4>
                <ul>
                    <?php
                    if ($offers_result->num_rows > 0) {
                        while ($offer = $offers_result->fetch_assoc()) {
                            echo "<li >" . $offer['offer_description'] . "</li>";
                        }
                    }
                    ?>
                </ul>
            </div>
<?php


if(isset($_POST['add_to_cart']) && isset($_POST['product_id']) && isset($_POST['product_type'])) {
    $product_id = $_POST['product_id'];
    $product_type = $_POST['product_type'];
    
    // Initialize variables to store data
    
    $product_name = '';
    $product_picture = '';
    $price = '';

    // Check if product type is men or women
    if ($product_type == 'men') {
        $select_query = "SELECT * FROM men_products WHERE p1_id = '$product_id'";
    } elseif ($product_type == 'women') {
        $select_query = "SELECT * FROM product WHERE id = '$product_id'";
    } elseif($product_type == 'kids') {
        $select_query = "SELECT * FROM kids WHERE id = '$product_id'";
    } 
    

    $result_query = mysqli_query($con, $select_query);
    
    if($result_query && mysqli_num_rows($result_query) > 0) {
        $row = mysqli_fetch_assoc($result_query);
        // Assign values based on product type
        if ($product_type == 'men') {
            $product_name = $row['p_name'];
            $product_picture = $row['p_image'];
            $price = $row['price'];
        } 
        if($product_type == 'women') {
            $product_name = $row['description'];
            $product_picture = $row['image'];
            $price = $row['price'];
        }
        if($product_type == 'kids') {
            $product_name = $row['description'];
            $product_picture = $row['image'];
            $price = $row['price'];
        }

        // Insert product into cart table with quantity 1 initially
        $insert_query = "INSERT INTO cart (product_id, product_name, product_picture, price,quantity) VALUES (
            '$product_id',
            '$product_name',
            '$product_picture',
            '$price',
            1
        )";
        if(mysqli_query($con, $insert_query)) {
            // Redirect back to the product detail page
            // header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            echo "Error adding product to cart: " . mysqli_error($con);
        }
    } else {
        echo "Product not found!";
    }
}
?>

  <div class="row">
    <!-- Cart Contents -->
    <div class="col-md-8">
      <!-- Display products in the cart -->
      <?php
      $select_query = "SELECT * FROM cart";
      $result_query = mysqli_query($con, $select_query);
      if ($result_query && mysqli_num_rows($result_query) > 0) {
        while ($row = mysqli_fetch_assoc($result_query)) {
          ?>
         <br><div class="product-details " style="margin-left:175px;width:70%;height:46%;">
                <img src="<?php echo $row['product_picture']; ?>">
            <form class="remove-cart" action="remove_from_cart.php" method="post">
                <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                <button type="submit" class="remove-from-cart" name="remove_from_cart">&#10006;</button>
            </form>
            <p class="product-name"style="margin-top:-160px;"><?php echo $row['product_name']; ?></p>
            <p class="product-price">Rs. <?php echo $row['price']; ?></p>
                  <!-- <div class="form-group"> -->
                  <h6 style="margin-top:25px;margin-left:31%;">Quantity:</h6><select class="form-control quantity-select" style="width: 15%; margin-left: 45%;margin-top:-30px;"
        id="quantity<?php echo $row['product_id']; ?>"
        data-product-id="<?php echo $row['product_id']; ?>"
        data-price="<?php echo $row['price']; ?>"
        onchange="updateQuantity(<?php echo $row['product_id']; ?>, this.value)">
    <?php
    for ($i = 1; $i <= 10; $i++) {
        $selected = ($i == $row['quantity']) ? "selected" : "";
        echo "<option value='$i' $selected>$i</option>";
    }
    ?>
</select>
                  </div>
                
                
          <?php
        }
      } else {
        echo "<br><br><img src='images/empty-bag.webp'style='margin-left:39%;width:20%;'>";
        echo "<p style='margin-left:44%;'><b>Hey,it feels so light!</b></p>";
        echo "<p style='margin-left:33%;'>There is nothing in your bag.Let's add some items.</p>";
        ?>
        <div class="col-md-8" style="margin-top: 20px;">
        <div class="container" style="text-align: center;">
            <a href="wishlist.php" style="margin-left:50%;width:58%;height:35px;background-color:white;border-color:pink;color:#ff3f6c;"class="btn btn-primary"><b>ADD ITEMS FROM WISHLIST</b></a><hr style="margin-left:30%;width:110%;color:#ff3f6c;">
        </div>
    </div>
    <?php


      }
      ?>
    </div>

    <!-- Cart Summary -->
    <div class="col-md-4" style="margin-top:-422px;margin-left:-75px;">
      <div class="card" style="height:49%;width:60%;">
        <div class="card-body">
          <br><br><hr><h5 class="card-title" style="font-size:30px;margin-left:40px;">Price Details</h5><br><hr>
          <p >Total Items<span id="totalItems" style="margin-left:120px;">0</span></p>
          <p >Shipping Fee<span id="totalItems"style="margin-left:100px;COLOR:GREEN;">FREE</span></p>

          <p >Total Amount  <span id="totalPrice" style="margin-left:75px;">0.00</span></p><hr style="width:105%;">

          <form method="GET" action="address.php">
    <input type="hidden" name="product_name" value="<?php echo isset($row['product_name']) ? $row['product_name'] : ''; ?>">
    <input type="hidden" name="product_image" value="<?php echo isset($row['product_picture']) ? $row['product_picture'] : ''; ?>">
    <input type="hidden" name="product_price" value="<?php echo isset($row['price']) ? $row['price'] : ''; ?>">
    <button class="btn " name="purchase_order"style="background-color:#ff3f6c;color:white;border-radius:none;margin-left:-15px;width:264px;height:40px;" onclick="purchaseOrder()">Purchase Order</button>
</form>
   
        </div>
      </div>
    </div>
  </div>
</div>

<?php include("footer.php"); ?>

<!-- JavaScript to update total price and handle purchase order -->
<script>
  function updateTotal() {
    var totalItems = 0;
    var totalPrice = 0;
    var quantitySelects = document.querySelectorAll('.quantity-select');
    quantitySelects.forEach(function(select) {
      var quantity = parseInt(select.value);
      var price = parseFloat(select.getAttribute('data-price'));
      totalItems += quantity;
      totalPrice += quantity * price;
    });
    document.getElementById('totalItems').innerText = totalItems;
    document.getElementById('totalPrice').innerText = totalPrice.toFixed(2);
  }

  // Function to update quantity and total price when quantity changes
  function updateQuantity(productId, newQuantity) {
    $.ajax({
        type: "POST",
        url: "update_quantity.php", // URL of your PHP script to handle the request
        data: { product_id: productId, quantity: newQuantity },
        success: function(response) {
            // Update total price or perform any other actions after successful update
            updateTotal();
        },
        error: function(xhr, status, error) {
            console.error("Error updating quantity:", error);
        }
    });
}

// Function to update total price and handle purchase order
function updateTotal() {
    var totalItems = 0;
    var totalPrice = 0;
    var quantitySelects = document.querySelectorAll('.quantity-select');
    quantitySelects.forEach(function(select) {
        var quantity = parseInt(select.value);
        var price = parseFloat(select.getAttribute('data-price'));
        totalItems += quantity;
        totalPrice += quantity * price;
    });
    document.getElementById('totalItems').innerText = totalItems;
    document.getElementById('totalPrice').innerText = totalPrice.toFixed(2);
}
updateTotal();

function purchaseOrder() {
    var productDetails = [];
    var productElements = document.querySelectorAll('.product-details');
    
    productElements.forEach(function(element) {
        var productName = element.querySelector('.product-name').innerText;
        var quantity = element.querySelector('.quantity-select').value;
        productDetails.push(encodeURIComponent(productName) + ':' + encodeURIComponent(quantity));
    });
    
    var encodedProductDetails = productDetails.join(',');
    
    window.location.href = 'address.php?products=' + encodedProductDetails;
}
  // Call updateTotal function on page load
  updateTotal();
</script>

</body>
</html>
