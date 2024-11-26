


<div class="container-fluid">
    <div class="row"><?php
include_once("nav.php");

?>
        <div class=col-lg-1></div>
        <div class=col-lg-6>
            <h2>Forgot Password Form</h2>
            <form action="forgot_password_action.php" method="post" id="form1">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email1" placeholder="Enter email" name="email"><span id="em_err"></span>
                </div>

                <input type="submit" class="btn" value="Send OTP" name="btn" />


            </form>
        </div>
    </div>
</div>
<br>
                                 