<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="non_login/home_css.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>men</title>
    <style>
       
        
        .an {
            text-decoration: none;
            color: black;
        }

        .an:hover {
            text-decoration: none;
            color: black;
            background-color: #ed1446;
        }

        #cashpay{
            font-size: 15px;
            text-align: center;
            background-color:#ff3f6c;
            border: none;
            text-decoration: none;
            color: #fff;
            height: 35px;
            width: 55%;
            margin-top:50px;

            padding:7px;

           margin-left:1px;
            /* margin: auto; */
           
        }
        #cashpay:hover{
            background-color:#ff3f6c9a;
        }
        #cashpay2{
            font-size: 15px;
            text-align: center;
            background-color:#ff3f6c;
            border: none;
            text-decoration: none;
            color: #fff;
            height: 35px;
            width: 95%;
            /* margin-top:50%; */
            padding:7px;
           margin-left:10px;
           
           
        }
        #cashpay2:hover {
            background-color: #ff3f6c9a;
        }

        /* Wishlist icon styles */
        .wishlist-icon {
            position: absolute;
            top: 10px;
            right:80px;
            /* right: 10px; */
            width: 25px;
            height: 25px;
        }
        .col-xl-3 {
        max-height: 467px; /* Adjust this value as needed */
    }

    #messageBox {
    position: fixed;
    top: 60px; /* Adjust this value according to your navbar height */
    right: 0;
    width:150px; /* Adjust the width of the message box */
    height:50px;
    z-index: 9999;
    background-color:rgb(17, 17, 35);
    color: #fff;
    margin-right:15px;
    /* padding: 10px; */
    text-align: center;
    display: none;
    animation: fadeInOut 2.5s ease-in-out; /* Use a longer duration to match the setTimeout duration */
}

@keyframes fadeInOut {
    0% { opacity: 0; }
    25% { opacity: 1; }
    75% { opacity: 1; }
    100% { opacity: 0; }
}

    </style>
</head>
   <body>
    <?php include('navbar.php'); ?>
    <div id="messageBox" style="display: none;">
        <div id="messageContent"></div>
    </div>
    <!-- Product Card fetching from database -->
    <div class="container">
        <div class="row bg-white py-5 ">
            <?php
  
  // Establish database connection
  // Check connection
  if ($con->connect_error) {
      die("Connection failed: " . $con->connect_error);
  }

  $sql = "SELECT * FROM men_products";
  $result = $con->query($sql);

  // Check if there are products in the database
  if ($result->num_rows > 0) {
      // Output data of each row
      while($row = $result->fetch_assoc()) {
              $P_Name = $row['p_name'];
                $Price = $row['price'];
                $Product_picture = $row['p_image'];
                $Product_id = $row['p1_id'];
    
          ?>
          <div class='col-xl-4 col-md-4 col-sm-6 mt-5'>
              
                  <?php
                  echo '<img class="card-img-top" src="' . $row['p_image'] . '" alt="' . $row['p_name'] . '" width="80%" height="445px">';
                 ?>
                  <form action="wishlist.php" method="post">
    <input type="hidden" name="add_to_wishlist" value="1">
    <input type="hidden" name="product_id" value="<?php echo $row['p1_id']; ?>">
    <input type="hidden" name="product_type" value="men">
    <button type="submit" style="width:1px;height:1px;left:340px;" class="wishlist-icon">
        <img src="images/wishlistlogo.png" style="right:-5px;top:-10px;" class="wishlist-icon" alt="Add to Wishlist">
    </button>
</form>
                 
                  
                 
                      <div class='card-body'>
                          <br>
                          <?php
        $offer_query = "SELECT * FROM offers WHERE product_id = $Product_id AND start_date <= CURDATE() AND end_date >= CURDATE()";
        $offer_result = $con->query($offer_query);
        if ($offer_result->num_rows > 0) {
            $offer_row = $offer_result->fetch_assoc();
            $discount_percentage = $offer_row['discount_percentage'];
            
            // Calculate discounted price
            $original_price = $Price;
            $discounted_price = $original_price - ($original_price * ($discount_percentage / 100));
            
            // Display original price with a strike-through and discounted price
            echo '<h5 style="font-size:15px;color:rgb(65, 61, 61);">₹' . $discounted_price . ' <span style="text-decoration: line-through;">MRP ₹' . $original_price . '</span> (' . $discount_percentage . '% OFF)</h5>';
} else {
    // No offer available, display original price only
    echo '<h5 style="font-size:15px;color:rgb(65, 61, 61);">Price: ₹' . $Price . '</h5>';
}
?>
                          <!-- <h5 style="font-size:15px;color:rgb(65, 61, 61);">Price: ₹<?php echo $row['price']; ?></h5> -->
                          <h5 style="font-size:15px;color:rgb(65, 61, 61);margin-bottom:20px;"><?php echo $row['p_name']; ?></h5>
                      </div>
                  </a>
                  <input type="hidden" name="product_id" value="<?php echo $row['p1_id'] ?>">
                  <div class='antima'>
                                    <?php
                                    if ($Price > 0) {
                                    ?>
                  <a href="productdetail.php?product_id=<?php echo $row['p1_id']; ?>" id="cashpay">Buy now</a>

<?php
                                    } else {
                                    ?>
                  <a href="productdetail.php?product_id=<?php echo $row['p1_id']; ?>"id="cashpay">Buy Now</a>

            <?php
                                    }
                                    ?><div style="margin-right: 10px; display: inline-block;">
       <form id="addToCartForm_<?php echo $row['p1_id']; ?>" action="add_to_cart.php" method="post">
    <input type="hidden" name="add_to_cart" value="2"> <!-- Use "1" as the value to differentiate it from the wishlist form -->
    <input type="hidden" name="product_id" value="<?php echo $row['p1_id']; ?>">
    <input type="hidden" name="product_type" value="men">
    <button type="button" onclick="addToCartMessage('<?php echo $P_Name; ?>', '<?php echo $row['p_image']; ?>', <?php echo $row['p1_id']; ?>)" ID="cashpay2">Move to Bag</button>
</form>
 </div>
 </div>
              
          </div>
          <?php
      }
  } else {
      echo "0 results";
  }
  // Close database connection
  $con->close();

    ?>
    <script>
    function addToCartMessage(productName, productImage, productId) {
    // Update the message content with product information
    var messageContent = document.getElementById("messageContent");
    messageContent.innerHTML = '<img src="' + productImage + '" alt="Product Image" style="max-width: 50px; max-height: 50px;">' +
        ' Added to cart.';

    // Show the message box with fade-in animation
    var messageBox = document.getElementById("messageBox");
    messageBox.style.opacity = 0;
    messageBox.style.display = "block";
    setTimeout(function() {
        messageBox.style.opacity = 1;
    }, 100);

    // Hide the message box with fade-out animation after 2 seconds
    setTimeout(function() {
        messageBox.style.opacity = 0;
        setTimeout(function() {
            messageBox.style.display = "none";
            // Submit the form to add to cart
            document.getElementById('addToCartForm_' + productId).submit();
        }, 500);
    }, 2000);
}

</script>
<br>
<br>
</body>

</html>
<?php
include_once("footer.php");
?>
