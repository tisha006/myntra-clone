<?php
include_once("navbar.php"); 
if(isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    $select = "SELECT * FROM registertable WHERE email='$email'";
    $result = $con->query($select);
    $row = $result->fetch_assoc();

    if(isset($_POST['change_password'])){
        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];
   
        if(password_verify($old_password, $row['password'])){
            
            if($new_password == $confirm_password) {
                
                $new_password = password_hash($new_password, PASSWORD_DEFAULT);
    
                
                $update = "UPDATE registertable SET password='$new_password' WHERE email='$email'";
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
        <br><hr style="color:gray;width:62%;margin-left:15%;margin-bottom:-20px;">
        <div class="container mt-3 w-50"style="margin-right:233px;background-color:#fff;padding:45px;border:solid gray 1px;">
        <div class="mb-3 mt-3">
            <label for="old_password" style="font-size:14px;">Old Password</label>
            <input type="password" class="form-control" name="old_password">
        </div>
        <div class="mb-3 mt-3">
            <label for="new_password"style="font-size:14px;">New Password</label>
            <input type="password" class="form-control" name="new_password">
        </div>
        <div class="mb-3 mt-3">
            <label for="confirm_password"style="font-size:14px;">Confirm Password</label>
            <input type="password" class="form-control" name="confirm_password">
        </div>
        <button type="submit" name="change_password"  style="color:white;background-color:#ff3f6c;text-decoration:none;padding:7.5px;border-radius:none;border:none;">Change Password</button>
</div>
    </form>
    
</body>
</html><br><br><br>
<?php
include_once("footer.php");
?>