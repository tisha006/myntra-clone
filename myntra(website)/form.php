<!-- offer_form.php -->

<?php
$con = new mysqli("localhost", "root", "", "myntra_db");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $offer_description = $_POST['offer_description'];
    // $discount = $_POST['discount'];

    // Insert offer data into the database
    $insert_query = "INSERT INTO offer (offer_description) VALUES ('$offer_description')";
    if ($con->query($insert_query) === TRUE) {
        echo "<p>Offer added successfully!</p>";
    } else {
        echo "Error: " . $insert_query . "<br>" . $con->error;
    }
}

// Fetch and display existing offers
$offers_sql = "SELECT * FROM offer";
$offers_result = $con->query($offers_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Offer</title>
</head>
<body>
    <h2>Add Offer</h2>
    <form method="post">
        <label for="offer_description">Offer Description:</label><br>
        <input type="text" id="offer_description" name="offer_description" required><br>
        <!-- <label for="discount">Discount (%):</label><br>
        <input type="number" id="discount" name="discount" required><br><br> -->
        <button type="submit">Add Offer</button>
    </form>

    <h2>Existing Offers</h2>
    <?php
    if ($offers_result->num_rows > 0) {
        echo "<ul>";
        while ($offer = $offers_result->fetch_assoc()) {
            echo "<li>" . $offer['offer_description'] ."</li>";
        }
        echo "</ul>";
    } else {
        echo "No offers available.";
    }
    ?>

</body>
</html>

<?php
// Close database connection
$con->close();
?>
