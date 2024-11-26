<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WomenProduct Detail</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
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
        #cashpay2:hover{
            background-color:#ff3f6c9a;
        }
        /* Style for product image */
        .product-image {
            width: 87%;
            height:78%;
        }
        /* Style for product details */
        
        .product-details {
            padding: 20px;
        }
        .product-details h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .product-details p {
            font-size: 18px;
            margin-bottom: 10px;
        }
        /* Style for purchase button */
        .purchase-btn {
            background-color:#ff3f6c;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        /* .purchase-btn:hover {
            background-color:#ff3f6c9a;
        } */
        .size-options {
            display: flex;
            margin-top: 20px;
        }
        .size-option {
            width: 30px;
            font-size: 12px;
            height: 30px;
            border-radius: 50%;
            border: 1px solid #ccc;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            margin-right: 10px; 
        }
        .size-option:hover {
            color: #ff3f6c;
        }
        #messageBox {
            position: fixed;
            top: 60px;
            right: 0;
            width: 150px;
            height: 50px;
            z-index: 9999;
            background-color: rgb(17, 17, 35);
            color: #fff;
            margin-right: 15px;
            text-align: center;
            display: none;
            animation: fadeInOut 2.5s ease-in-out;
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

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- Display big image of the product -->
                <?php
                // Establish database connection
               
               
                // Check if product_id is set in the URL
                // if(isset($_GET['id'])) {
                    $product_id = $_GET['product_id'];
                    
                    // Fetch product details from the database
                    $select_query = "SELECT * FROM product WHERE id = '$product_id'";
                    $result_query = mysqli_query($con, $select_query);
                    if($result_query && mysqli_num_rows($result_query) > 0) {
                        $row = mysqli_fetch_assoc($result_query);
                        // Display product details
                ?>
               <hr> <img src="<?php echo $row['image']; ?>" alt="Product Image" class="product-image"><hr>

                <?php
                    } else {
                        // Product not found, display an error message or redirect
                        echo "Product not found!";
                    }
                // } else {
                //     // product_id parameter is not set in the URL, display an error message or redirect
                //     echo "Product ID is missing!";
                // }
            
                ?>
            </div>
            <div class="col-md-6">
                
                <!-- Display product details -->
                <div class="product-details">
                    <br><h1>Product Details</h1><br><hr>
                    <br><br><br><br><br><br><br><br><br>
                    <h2><?php echo isset($row['description']) ? $row['description'] : 'Product Name Not Available'; ?></h2><br>
                    
                    <p style="margin-bottom:25px">Price: ₹<?php echo isset($row['price']) ? $row['price'] : 'Price Not Available'; ?></p>
                        <form id="addToCartForm_<?php echo $product_id; ?>" action="add_to_cart.php" method="post">
                        <input type="hidden" name="add_to_cart" value="2">
                        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                        <input type="hidden" name="product_type" value="women">
                        <button type="button" onclick="addToCartMessage('<?php echo $row['description']; ?>', '<?php echo $row['image']; ?>', <?php echo $product_id; ?>)" ID="cashpay"style="width:30%;margin-left:5%;">Move to Bag</button>
                    </form>     
                    
                    <a href="address.php?type=women&<?= http_build_query(['name' => urlencode($row['description']), 'price' => urlencode($row['price']), 'image' => urlencode($row['image'])]); ?>" class="purchase-btn" style="margin-left:40%;margin-top:-25px;color:white;text-decoration:none;">Buy Now</a>


   
                  </form>
                </div>
            </div>
        </div>
    </div>
    <div id="messageBox" style="display: none;">
        <div id="messageContent"></div>
    </div>

    <script>
        function addToCartMessage(productName, productImage, productId) {
            var messageContent = document.getElementById("messageContent");
            messageContent.innerHTML = '<img src="' + productImage + '" alt="Product Image" style="max-width: 50px; max-height: 50px;">' +
                ' Added to cart.';

            var messageBox = document.getElementById("messageBox");
            messageBox.style.opacity = 0;
            messageBox.style.display = "block";
            setTimeout(function() {
                messageBox.style.opacity = 1;
            }, 100);

            setTimeout(function() {
                messageBox.style.opacity = 0;
                setTimeout(function() {
                    messageBox.style.display = "none";
                    document.getElementById('addToCartForm_' + productId).submit();
                }, 500);
            }, 2000);
        }

        function buyNow(productName) {
            // Encode the product name to handle special characters
            var encodedProductName = encodeURIComponent(productName);
            // Redirect to address.php with the product name as a parameter
            window.location.href = 'address.php?product_name=' + encodedProductName;
        }
    </script>

    <?php include_once("footer.php") ?>
</body>
</html>
