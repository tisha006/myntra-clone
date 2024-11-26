<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- <link rel="stylesheet" href="wishlist.css"> -->
  <style>


        .remove-from-wishlist {
            width: 20px; /* Adjust the width and height as needed to make it circular */
            height: 20px;
            border-radius: 50%; /* Makes the button circular */
            background-color:lightgray; 
            border: none; /* Removes the border */
            top: 1px;
            left: 167px;
            font-size: 10px; /* Adjust the font size of the icon */
            color:darkgray; /* Adjust the color of the icon to a light color */
            position:absolute;
           
          }
          #cashpay{
            font-size: 15px;
            text-align: center;
            background-color:#ff3f6c;
            border: none;
            text-decoration: none;
            color: #fff;
            height: 30px;
            width: 79%;
            margin-right:56px;
            margin-bottom:90px;
            padding:7px;
           margin-left:1px;
            /* margin: auto; */
           
        }
        #cashpay:hover{
            background-color:#ff3f6c9a;
        }
          .wishlist-icon {
            position: absolute;
            top: 10px;
            right:80px;
            width: 25px;
            height: 25px;
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

if(isset($_POST['add_to_wishlist']) && isset($_POST['product_id']) && isset($_POST['product_type'])) {
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
    } elseif ($product_type == 'kids'){
        $select_query = "SELECT * FROM kids WHERE id = '$product_id'";
    }
     else {
        echo "Invalid product type!";
        exit;
    }

    $result_query = mysqli_query($con, $select_query);
    
    if($result_query && mysqli_num_rows($result_query) > 0) {
        $row = mysqli_fetch_assoc($result_query);
        // Assign values based on product type
        if ($product_type == 'men') {
            $product_name = $row['p_name'];
            $category = $row['category'];
            $product_picture = $row['p_image'];
            $price = $row['price'];
        } elseif ($product_type == 'women') {
            $product_name = $row['description']; 
            $product_picture = $row['image']; // Assuming the column names are the same for women products
            $price = $row['price']; // Assuming the column names are the same for women products
        } elseif($product_type == 'kids') {
            $product_name = $row['description']; 
            $product_picture = $row['image']; // Assuming the column names are the same for women products
            $price = $row['price'];
        }
        
        // Insert product into wishlist table
        $insert_query = "INSERT INTO wishlist (product_id, product_name, product_picture, price) VALUES (
            '$product_id',
            '$product_name',
            '$product_picture',
            '$price'
        )";
        if(mysqli_query($con, $insert_query)) {
            // Redirect back to the same page to prevent adding the product multiple times on refresh
            // header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        } else {
            echo "Error adding product to wishlist: " . mysqli_error($con);
        }
    } else {
        echo "Product not found!";
    }
}

// Display all products in the wishlist
$select_query = "SELECT * FROM wishlist";
$result_query = mysqli_query($con, $select_query);

if ($result_query && mysqli_num_rows($result_query) > 0) {
    // Get the count of items in the wishlist
    $count_query = "SELECT COUNT(*) AS total FROM wishlist";
    $count_result = mysqli_query($con, $count_query);
    $count_row = mysqli_fetch_assoc($count_result);
    $total_items = $count_row['total'];

    // Display the number of items in the wishlist
    echo '<br><br><p style="margin-left:78px;font-weight:14px;font-size:25px;"><b>My Wishlist_</b>'.$total_items.' items</p><br><div class="d-flex flex-wrap" style="margin-left:80px;height:350px;">';

    while ($row = mysqli_fetch_assoc($result_query)) {
        // Display product details
        ?>
        <div class="product-details mx-2" style="display:inline-block;position:relative;border: solid lightgray 1px;width:20%;">
            <img src="<?php echo $row['product_picture']; ?>" alt="Product Image" width="250px" height="330px" style="border: solid lightgray 1px;">
            <form class="remove-form" action="remove_from_wishlist.php" method="post">
                <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                <button type="submit" class="remove-from-wishlist" style="position:absolute;top:1px;left:230px;" name="remove_from_wishlist">&#10006;</button>
            </form>
            <p style="color:gray;font-size:17px;margin-left:28px;word-wrap:break-word;margin-top:10px;"><?php echo $row['product_name']; ?></p>
            <p style="color:black;margin-left:50px;font-size:17px;margin-top:-10px;">Rs. <?php echo $row['price']; ?></p>
            <input type="hidden" name="product_id" value="<?php echo $row['product_id'] ?>">
            
                  <!-- <div class='antima'> -->
                                    <?php
                                    if ($row['price']> 0) {
                                    ?>
                  <button type="submit" style="background-color:#ff3f6c;border:none; width:250px;"><a href="womenproductdetail.php?product_id=<?php echo $row['product_id']; ?>" style="width:110%;padding:5px 89px;text-decoration:none;color:white;">Buy</a></button>

<?php
                                    } else {
                                    ?>
                  <a href="womenproductdetail.php?product_id=<?php echo $row['product_id']; ?>"style="width:105%;margin-left:-15px;">Buy</a>

            <?php
                                    }?>
          
        </div>
        <?php
    }
} else {
    // Wishlist is empty
    echo "<br><br><br><br><br><br><br><p style='margin-left:40%;color:#ff3f6c;font-size:20px;'><b>YOUR WISHLIST IS EMPTY</b></p>";
    echo "<p style='margin-left:37%;color:gray;'>Add items that you like to your wishlist.Review</p>";
    echo "<p style='margin-left:36.5%;margin-top:-15px;color:gray;'>them anytime and easily move them to the bag.</p>";
    echo "<img src='images/wishlist_empty.jpeg'style='margin-left:37%;width:25%;'>";

    ?>
        <div class="col-md-8" style="margin-top: 20px;">
        <div class="container" style="text-align: center;">
            <a href="home.php" style="margin-top:10px;margin-left:48%;width:45%;height:35px;background-color:white;border-color:pink;color:#ff3f6c;height:60px;padding-top:18px;"class="btn btn-primary"><b>CONTINUE SHOPPING</b></a>
        </div>
    </div>
    <?php

}
?>

</div>

</body>
</html><br><br>
<?php
include("footer.php");
?>