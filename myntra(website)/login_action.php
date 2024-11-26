<?php
if (isset($_POST['login'])) {
    $em = $_POST['email'];
    $pwd = $_POST['pswd'];

    $q = "select * from registertable where email='$em' and password='$pwd'";
    $result = mysqli_query($con, $q);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        while ($a = mysqli_fetch_array($result)) {
            $status = $a[6];
            if ($status == "Active") {
                $role = $a[7];
                if ($role == "Admin") {
                    $_SESSION['email_id'] = $em;
?>
                    <script>
                        window.location.href = "t.php";
                    </script>
                <?php
                } else {
                    $_SESSION['email'] = $em;
                ?>
                    <script>
                        window.location.href = "home.php";
                    </script>
                <?php
                }
            } else {

                setcookie("error", "Account is not activated. Kindly activate your account by clicking on the activation link sent to your email address.", time() + 2, "/");
                ?>
                <script>
                    window.location.href = "login.php";
                </script>
        <?php
            }
        }
    } else {
        setcookie("error", "Incorrect username or password", time() + 2, "/");
        ?>
        <script>
            window.location.href = "login.php";
        </script>
<?php
    }
}