<?php
// Check if the request contains the product ID and new quantity
if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
    // Sanitize input data to prevent SQL injection
    $productId = $_POST['product_id'];
    $quantity = intval($_POST['quantity']);

    // Update the quantity in the database
    // Modify this part according to your database schema and connection method
    $con = mysqli_connect("localhost", "root", "", "myntra_db");
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $update_query = "UPDATE cart SET quantity = $quantity WHERE product_id = '$productId'";
    if (mysqli_query($con, $update_query)) {
        echo "Quantity updated successfully";
    } else {
        echo "Error updating quantity: " . mysqli_error($con);
    }

    mysqli_close($con);
} else {
    // Handle the case where product ID or quantity is not provided in the request
    echo "Product ID or quantity not provided";
}
?>
