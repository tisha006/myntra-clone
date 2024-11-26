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
        <?php
  $con = new mysqli("localhost", "root", "", "myntra_db");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Fetch product details from order_confirm table
$selectProducts = "SELECT products, price, product_image, id FROM order_confirm";
$result = $con->query($selectProducts);
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
<div class="col-md-10">
    <br><br><br>
    <h3 style="margin-left:20%;">Orders</h3>
        <?php
        if (!empty($products)) {
            for ($i = 0; $i < count($products); $i++) {
                echo "<div class='order-container' style='margin-bottom: 30px; width:90%;margin-left:5%;'>";
                            for ($j = 0; $j < count($products[$i]); $j++) {
                    echo "<div class='product-details' style='border:solid 1px gray;margin-bottom:34px;padding:25px;'>";
        
                    echo "<img src='" . $images[$i][$j] . "' alt='Product Image' style='width:12%;'>";
                    
                    echo "<p style='margin-left:15%;margin-top:-70px;'> " . $products[$i][$j] . "</p>";
                    echo "<p style='margin-left:15%;margin-top:-10px;margin-bottom:45px;'> ₹" . ($j < count($prices[$i]) ? $prices[$i][$j] : "N/A") . "</p>";
                    // Display address details within product container
                    echo "<div class='address-details' >";
                    echo "<p style='margin-left:50%;font-size:17px;margin-top:-160px;'><b>Deliver to:</b></p>";
                    echo "<p style='margin-left:50%;margin-top:-10px;'><b>{$addresses[$productIds[$i]]['fullname']}</b></p>";
                    echo "<p style='margin-left:50%;margin-top:-10px;'>{$addresses[$productIds[$i]]['address']},</p>";
                    echo " <p style='margin-left:60%;margin-top:-40px;'>{$addresses[$productIds[$i]]['city']}, P-{$addresses[$productIds[$i]]['pincode']},</p>";
                    echo "<p style='margin-left:73%;margin-top:-40px;'>{$addresses[$productIds[$i]]['state']}</p>";
                    echo "<p style='margin-left:50%;margin-top:-10px;'>{$addresses[$productIds[$i]]['number']}</p>";
                    echo "<form class='remove-form' action='cancel.php' method='post'>";
                    echo "<input type='hidden' name='product_id' value='{$productIds[$i]}'>";
                   // echo "<a href='cancel.php' name='cancel' style='margin-top:-78px;margin-left:90%;transform:translate(-50%,-50%);background-color:#ff3f6c;color:white;border:none;width:12%;font-size:20px;'>cancel</a>";
                     echo "<button type='submit' class='remove-from-orders'value='cancel' name='cancel' style='margin-top:-78px;margin-left:90%;transform:translate(-50%,-50%);background-color:#ff3f6c;color:white;border:none;width:12%;font-size:20px;'>Cancel</button>";
                    echo "</form>";
                    echo "</div>"; // Closing address-details
                    echo "</div>"; 
  
                }
                
                echo "</div>"; // Closing order-container
            }
        } else {
            echo "<hr style='color:gray;'><div class='conatiner' style='border:solid 1px gray;width:90%;margin-left:6%;height:54%;'>";
            echo "<br><br><br><img src='images/order.png' style='margin-left:38%;width:30%;'>";
            echo "<p style='margin-left:38%;margin-top:10px;'><b>there haven't placed any order yet!</b></p>";
            echo "<p style='margin-left:24%;margin-bottom:15%;'> Order section is empty. After placing an order, you can track them from here!</p>";
            echo "</div>";
        }

        if(isset($_POST['cancel'])) {
            $product_id = $_POST['product_id'];
            // Remove product from the order_confirm table
            $delete_query = "DELETE FROM order_confirm WHERE id = '$product_id'";
            if(mysqli_query($con, $delete_query)) { // Change $con to $con
                // Product removed successfully
                ?>
                <script>
                    window.location.href="order_history.php";
                </script>
                <?php
                exit;
            } else {
                // Error removing product
                echo "Error removing product from orders: " . mysqli_error($con); // Change $con to $con
            }
        }
        ?>
   

    <!-- Modal Structure -->
    <!-- <div class="modal fade" id="confirmCancelModal" tabindex="-1" role="dialog" aria-labelledby="confirmCancelModalLabel" aria-hidden="true">
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
    </div> -->
  
    <!-- Cancel Order Form -->
    <!-- <form id="cancelOrderForm" action="cancel.php" method="post">
        <input type="hidden" id="productIdInput" name="product_id" value="">
    </form> -->
    <!-- JavaScript to Handle Modal and Form Submission -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- <script>
        function confirmCancellation(productId) {
            $('#confirmCancelModal').modal('show');
            $('#productIdInput').val(productId);
            $('#cancelOrderForm').submit();
        }

        function validateAndCancel() {
            var reason = $('#cancelReason').val();
            if (!reason.trim()) {
                $('#errorText').css('display', 'block');
                return;
            }
            $('#cancelOrderForm').submit();
        } 
    </script>-->
    </div>
      </div>
      </div>
</body>
</html>

      <!-- <div class="col-md-10">
        <h2 class="text-center">Orders</h2>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Order ID</th>
              <th>Customer Name</th>
              <th>Product</th>
              <th>address</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody> -->
            <?php
            // $con = mysqli_connect("localhost", "root", "","myntra_db");

            // if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //     if (isset($_POST['confirm'])) {
            //         $orderId = $_POST['order_id'];
                    
            //         $sql = "UPDATE `order` SET status='Confirmed' WHERE order_id=$orderId";
            //         mysqli_query($con, $sql);
                   
            //         $sql = "SELECT status FROM `order` WHERE order_id=$orderId";
            //         $result = mysqli_query($con, $sql);
            //         $row = mysqli_fetch_assoc($result);
            //         $status = $row['status'];
            //     } elseif (isset($_POST['cancel'])) {
            //         $orderId = $_POST['order_id'];
                    
            //         $sql = "DELETE FROM `order` WHERE order_id=$orderId";
            //         mysqli_query($con, $sql);
                   
            //         $status = 'Canceled';
            //     }
            // }

            
            // $sql = "SELECT o.*, a.address,a.fullname 
            // FROM `order` o 
            // JOIN addresstable a ON o.order_id = a.id";
      
            
            // $result = mysqli_query($con, $sql);

            // Display orders
            // while ($row = mysqli_fetch_assoc($result)) {
            //   echo "<tr>";
            //   echo "<td>{$row['order_id']}</td>";
            //   echo "<td>{$row['fullname']}</td>";
            //   echo "<td>{$row['product_name']}</td>";
            //   echo "<td>{$row['address']}</td>";
             
            //   echo "<td order_id='status_{$row['order_id']}'>{$row['status']}</td>";
            //   echo "<td>";
            //   echo "<form method='post'>";
            //   echo "<input type='hidden' name='order_id' value='{$row['order_id']}'>";
            //   echo "<button type='submit' name='confirm' class='btn btn-primary btn-sm'>Confirm</button>";
            //   echo "<button type='submit' name='cancel' class='btn btn-danger btn-sm'>Cancel</button>";
            //   echo "</form>";
            //   echo "</td>";
            //   echo "</tr>";
            // }
            ?>
          <!-- </tbody>
        </table> -->
      
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- <script>
    // Function to handle confirming an order
    function confirmOrder(orderId) {
      // Send a POST request to confirm_cancel_order.php
      $.post('confirm_cancel_order.php', { order_id: orderId, confirm: true }, function(response) {
        // Update the status on the webpage
        $(`#status_${orderId}`).text(response);
      });
    }

    // Function to handle canceling an order
    function cancelOrder(orderId) {
      // Send a POST request to confirm_cancel_order.php
      $.post('confirm_cancel_order.php', { order_id: orderId, cancel: true }, function(response) {
        // Update the status on the webpage
        $(`#status_${orderId}`).text(response);
      });
    }
  </script> -->
