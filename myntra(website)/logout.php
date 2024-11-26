<?php
include_once('navbar.php');
session_start();
   unset($_SESSION['username']);
   unset($_SESSION['email']);
   ?>
   <script>
    window.location.href="login.php";
   </script>
   <?php


$id = $_GET['id'];
$sql = "DELETE FROM registertable WHERE id=$id";
$conn->query($sql);

// header("Location: t-4(d).php");

?>   
