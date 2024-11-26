<?php
include("navbar.php");
if (!isset($_SESSION['email'])) {
    ?>
    <script>
         window.location.href="login.php";
    </script>
   
    <?php
}
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Fetch product details from order_confirm table
$selectProducts = "SELECT products, price, product_image, id FROM order_confirm";
$result = $con->query($selectProducts);

// Initialize arrays to store product details
$products = [];
$prices = [];
$images = [];
$productIds = [];
$addresses = [];

if ($result->num_rows > 0) {
    // Fetch and store product details
    while ($row = $result->fetch_assoc()) {
        $products[] = explode("; ", $row['products']);
        $prices[] = explode(", ", $row['price']);
        $images[] = explode(", ", $row['product_image']);
        $productIds[] = $row['id'];
        
        // Fetch and store address details
        $selectAddress = "SELECT * FROM order_confirm WHERE id = '" . $row['id'] . "'";
        $resultAddress = $con->query($selectAddress);
        if ($rowAddress = $resultAddress->fetch_assoc()) {
            $addresses[$row['id']] = $rowAddress;
        }
    }
}

// Close the database connection
$con->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    <link rel="stylesheet" href="css/order_history.css">
    <style>
        #errorText {
            color: red;
            display: none;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <br><br><br>
    <h3 style="margin-left:10%;">Orders</h3>

    <div class="container">
        <?php
        // Display product details in different containers
        if (!empty($products)) {
            for ($i = 0; $i < count($products); $i++) {
                echo "<div class='order-container' style='margin-bottom: 30px;'>";
                            for ($j = 0; $j < count($products[$i]); $j++) {
                    echo "<div class='product-details' style='border:solid 1px gray;margin-bottom:34px;padding:25px;'>";
                    echo "<img src='" . $images[$i][$j] . "' alt='Product Image' style='width:12%;'>";
                    
                    echo "<p style='margin-left:15%;margin-top:-70px;'> " . $products[$i][$j] . "</p>";
                    echo "<p style='margin-left:15%;margin-top:-10px;margin-bottom:45px;'> ₹" . ($j < count($prices[$i]) ? $prices[$i][$j] : "N/A") . "</p>";
                    // Display address details within product container
                    echo "<div class='address-details' >";
                    echo "<p style='margin-left:55%;font-size:17px;margin-top:-160px;'><b>Deliver to:</b></p>";
                    echo "<p style='margin-left:55%;margin-top:-10px;'><b>{$addresses[$productIds[$i]]['fullname']}</b></p>";
                    echo "<p style='margin-left:55%;margin-top:-10px;'>{$addresses[$productIds[$i]]['address']},</p>";
                    echo " <p style='margin-left:65%;margin-top:-40px;'>{$addresses[$productIds[$i]]['city']}, P-{$addresses[$productIds[$i]]['pincode']},</p>";
                    echo "<p style='margin-left:76%;margin-top:-40px;'>{$addresses[$productIds[$i]]['state']}</p>";
                    echo "<p style='margin-left:55%;margin-top:-10px;'>{$addresses[$productIds[$i]]['number']}</p>";
                    echo "<form class='remove-form' action='cancel_order.php' method='post'>";
                    echo "<input type='hidden' name='product_id' value='{$productIds[$i]}'>";
                    echo "<button type='button' class='remove-from-orders' style='margin-top:-78px;margin-left:90%;transform:translate(-50%,-50%);background-color:#ff3f6c;color:white;border:none;width:12%;font-size:20px;' onclick='confirmCancellation({$productIds[$i]})'>Cancel</button>";
                    echo "</form>";
                    echo "</div>"; // Closing address-details

                    echo "</div>"; // Closing product-details                    
                }
                
                echo "</div>"; // Closing order-container
            }
        } else {
            echo "<hr style='color:gray;'><div class='conatiner' style='border:solid 1px gray;width:90%;margin-left:6%;height:54%;'>";
            echo "<br><br><br><img src='images/order.png' style='margin-left:38%;width:30%;'>";
            echo "<p style='margin-left:38%;margin-top:10px;'><b>You haven't placed any order yet!</b></p>";
            echo "<p style='margin-left:24%;margin-bottom:15%;'> Order section is empty. After placing an order, you can track them from here!</p>";
            echo "</div>";
        }
        ?>
    </div>

    <!-- Modal Structure -->
    <div class="modal fade" id="confirmCancelModal" tabindex="-1" role="dialog" aria-labelledby="confirmCancelModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmCancelModalLabel">Confirm Cancellation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Explain, Why you want to Cancel? *</p>
                    <textarea id="cancelReason" style="width:450px;height:40%;"></textarea>
                    <p id="errorText">Please provide a reason for cancellation.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" onclick="validateAndCancel()">Ok</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Cancel Order Form -->
    <form id="cancelOrderForm" action="cancel_order.php" method="post">
        <input type="hidden" id="productIdInput" name="product_id" value="">
    </form>

    <!-- JavaScript to Handle Modal and Form Submission -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function confirmCancellation(productId) {
            $('#confirmCancelModal').modal('show');
            $('#productIdInput').val(productId);
        }

        function validateAndCancel() {
            var reason = $('#cancelReason').val();
            if (!reason.trim()) {
                $('#errorText').css('display', 'block');
                return;
            }
            // If reason is provided, submit the cancel order form
            $('#cancelOrderForm').submit();
        }
    </script>
</body>

</html>
<?php
include("footer.php");
?>
