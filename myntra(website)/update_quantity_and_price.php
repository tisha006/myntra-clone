<?php
// Establish database connection and define necessary functions
include("navbar.php");
// Function to update quantity and price in the cart table
function updateQuantityAndPrice($con, $productId, $quantity) {
    // Retrieve the current price of the product from the database based on its ID
    $select_query = "SELECT price FROM cart WHERE product_id = '$productId'";
    $result_query = mysqli_query($con, $select_query);
    if ($result_query && mysqli_num_rows($result_query) > 0) {
        $row = mysqli_fetch_assoc($result_query);
        $currentPrice = $row['price'];

        // Calculate the new price based on the new quantity
        $newPrice = $currentPrice * $quantity;

        // Update both quantity and price in the database
        $update_query = "UPDATE cart SET quantity = '$quantity', price = '$newPrice' WHERE product_id = '$productId'";
        if (mysqli_query($con, $update_query)) {
            // Update successful
            return true;
        } else {
            // Update failed
            echo "Error updating record: " . mysqli_error($con);
            return false;
        }
    } else {
        // Product not found in the cart
        echo "Product not found in the cart.";
        return false;
    }
}

// Handle AJAX request to update quantity and price
if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $productId = $_POST['product_id'];
    $newQuantity = $_POST['quantity'];

    // Update quantity and price in the database
    if (updateQuantityAndPrice($con, $productId, $newQuantity)) {
        // Quantity and price updated successfully
        echo "Quantity and price updated successfully.";
    } else {
        // Failed to update quantity and price
        echo "Failed to update quantity and price.";
    }
}
?>
