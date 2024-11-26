<?php
// Connect to MySQL server
include_once('navbar.php');
// Check if the connection was successful
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// SQL query to create the 'images' table if it doesn't exist
$sql_create_table = "CREATE TABLE IF NOT EXISTS images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    image_path VARCHAR(255) NOT NULL
)";

// Execute the SQL query to create the table
if ($con->query($sql_create_table) === TRUE) {
    echo "Table 'images' created successfully.<br>";
} else {
    echo "Error creating table: " . $con->error;
}

// Handle image upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $sql_insert_image = "INSERT INTO images (image_path) VALUES ('$target_file')";
        if ($con->query($sql_insert_image) === TRUE) {
            echo "Image uploaded successfully.";
        } else {
            echo "Error uploading image: " . $con->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

// Close MySQL connection
$con->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
</head>
<body>
    <h2>Upload Image</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="image" accept="images/" required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
