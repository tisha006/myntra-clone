<?php
include_once("nav.php"); // Include navigation file

if(isset($_SESSION['email_id'])) {
    $email = $_SESSION['email_id'];

    $select = "SELECT * FROM register WHERE email_id='$email'";
    $result = $con->query($select);
    $row = $result->fetch_assoc();

    if(isset($_POST['change_password'])){
        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];
    echo "Old Password (from form): $old_password <br>";
    echo "Hashed Password (from database): " . $row['user_password'] . "<br>";
        if(password_verify($old_password, $row['user_password'])){
            
            if($new_password == $confirm_password) {
                
                $new_password = password_hash($new_password, PASSWORD_DEFAULT);
    
                
                $update = "UPDATE register SET user_password='$new_password' WHERE email_id='$email'";
                if ($con->query($update) === TRUE) {
                    echo "Password updated successfully.";
                } else {
                    echo "Error updating password: " . $con->error;
                }
            } else {
                echo "New and confirm passwords don't match";
            }
        } else {
            echo "Incorrect old password";
        }
    }
} else {
    echo "Session email_id not set.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3 mt-3">
            <label for="old_password">Old Password</label>
            <input type="password" class="form-control" name="old_password">
        </div>
        <div class="mb-3 mt-3">
            <label for="new_password">New Password</label>
            <input type="password" class="form-control" name="new_password">
        </div>
        <div class="mb-3 mt-3">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" class="form-control" name="confirm_password">
        </div>
        <button type="submit" name="change_password" class="btn btn-primary">Change Password</button>
    </form>
</body>
</html>
