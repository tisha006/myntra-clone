<?php 
include("navbar.php");


// Include database connection code here

if(isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $product_id = $_POST['product_id'];
    $new_quantity = $_POST['quantity'];

    // Update the quantity in the cart table
    $update_query = "UPDATE cart SET quantity = '$new_quantity' WHERE product_id = '$product_id'";
    if(mysqli_query($con, $update_query)) {
        echo "Quantity updated successfully";
    } else {
        echo "Error updating quantity: " . mysqli_error($con);
    }
} else {
    echo "Invalid request";
}
?>
