<?php
// Include your database connection code here
include("navbar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["productId"]) && isset($_POST["totalPrice"])) {
    $productId = $_POST["productId"];
    $totalPrice = $_POST["totalPrice"];

    // Update the price in the cart table
    $updateQuery = "UPDATE cart SET total_price = '$totalPrice' WHERE product_id = '$productId'";
    
    if (mysqli_query($con, $updateQuery)) {
      echo "Price updated successfully";
    } else {
      echo "Error updating price: " . mysqli_error($con);
    }
  } else {
    echo "Invalid parameters";
  }
} else {
  echo "Invalid request";
}
?>
