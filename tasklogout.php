<!-- <form method="post">
<input type="submit" name="logout" value="logout">
</form> -->
<?php
    session_start();
    unset($_SESSION['username']);
    unset($_SESSION['email_id']);
   ?>
    <script>
       window.location.href = 'login.php';
   </script>
   <?php
   ?>