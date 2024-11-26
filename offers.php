<?php
// Check if product ID is provided in the URL parameter
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
} else {
    // Redirect back to the product page if no product ID is provided
    header("Location: product.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Retrieve form data
    $discount_percentage = $_POST['discount_percentage'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    // Perform validation on form data

    // Connect to the database (assuming you have already established a database connection)

    // Insert the offer into the offers table
    $insert_query = "INSERT INTO offers (product_id, discount_percentage, start_date, end_date) VALUES ('$product_id', '$discount_percentage', '$start_date', '$end_date')";

    if (mysqli_query($con, $insert_query)) {
        // Offer added successfully, redirect back to the product page
        header("Location: product.php");
        exit();
    } else {
        // Error occurred while adding the offer
        echo "Error: " . $insert_query . "<br>" . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Offer</title>
</head>

<body>
    <h2>Add Offer for Product ID: <?php echo $product_id; ?></h2>
    <form method="POST">
    <!-- Hidden input field to pass product ID -->
    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
    <label for="discount_percentage">Discount Percentage:</label>
    <input type="text" id="discount_percentage" name="discount_percentage" required>
    <label for="start_date">Start Date:</label>
    <input type="date" id="start_date" name="start_date" required>
    <label for="end_date">End Date:</label>
    <input type="date" id="end_date" name="end_date" required>
    <button type="submit" name="submit">Add Offer</button>
</form>
</body>

</html>
