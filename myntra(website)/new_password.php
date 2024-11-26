<?php
include_once("navbar.php");

?>
<br>
<div class="container">
    <div class="row">
        <div class=col-lg-3></div>
        <div class=col-lg-6>
            <h2>Reset Password Form</h2>
            <form action="update_new_password.php" method="post" enctype="multipart/form-data" id="form1">
                <div class="form-group">
                    <label for="pwd"><b>New Password:</b></label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
                    <span id="pswd_err"></span>
                </div>
                <div class="form-group">
                    <label for="repwd"><b>Confirm New Password: </b></label>
                    <input type="password" class="form-control" id="repwd" placeholder="Enter password" name="repswd">
                    <span id="repswd_err"></span>
                </div>

                <input type="submit" class="btn" value="Submit" name="btn">
            </form>
        </div>

    </div>


</div>
<br>