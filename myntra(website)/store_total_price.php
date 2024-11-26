<?php
// Assuming you have already established a connection to your database
// Include your database connection file if it's not already included

include("navbar.php");

// Check if the total price is set and not empty
if (isset($_POST['total_price']) && !empty($_POST['total_price'])) {
    // Sanitize the input to prevent SQL injection
    $total_price = mysqli_real_escape_string($con, $_POST['total_price']);

    // Assuming you have a logged-in user or some way to identify the cart
    // For demonstration purposes, let's assume a cart ID of 1
    $cart_id = 1;

    // Update the total price in the cart table
    $update_query = "UPDATE cart SET total_price = '$total_price' WHERE cart_id = '$cart_id'";

    if (mysqli_query($con, $update_query)) {
        // Return a success response
        echo "Total price stored successfully.";
    } else {
        // Return an error response
        echo "Error storing total price: " . mysqli_error($con);
    }
} else {
    // Return an error response if total price is not set or empty
    echo "Total price is not set or empty.";
}
?>
