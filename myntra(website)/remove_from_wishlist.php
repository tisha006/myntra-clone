<?php
include("navbar.php");


// Check if product_id is set in the POST data to remove product from wishlist
if(isset($_POST['remove_from_wishlist']) && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    
    // Remove product from the wishlist table
    $delete_query = "DELETE FROM wishlist WHERE product_id = '$product_id'";
    if(mysqli_query($con, $delete_query)) {
        // Product removed successfully
        ?>
        <script>
            window.location.href="wishlist.php";
            </script>
        <?php
        exit;
    } else {
        // Error removing product
        echo "Error removing product from wishlist: " . mysqli_error($con);
    }
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('.remove-from-wishlist').click(function(e){
            e.preventDefault(); // Prevent the default form submission
            var form = $(this).closest('.remove-form');
            $.post(form.attr('action'), form.serialize(), function(data){
                // Remove the product element from the page
                form.closest('.product-details').remove();
            });
        });
    });
</script>
<?php
include("footer.php");
?>