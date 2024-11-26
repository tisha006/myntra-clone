<?php
$con = mysqli_connect("localhost", "root", "", "myntra_db");

// Check if product_id is set in the POST data to remove product from orders
if (isset($_POST['cancel'])) {
    $product_id = $_POST['product_id'];
    
    // Remove product from the order_confirm table
    $delete_query = "DELETE FROM order_confirm WHERE id = '$product_id'";
    if(mysqli_query($con, $delete_query)) {
        // Product removed successfully
        ?>
        <script>
            window.location.href="orders.php";
        </script>
        <?php
        exit;
    } else {
        // Error removing product
        echo "Error removing product from orders: " . mysqli_error($con);
    }
}
?>
