<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<style>
  </style>
<body>
<?php
$con =new mysqli("localhost", "root", "","myntra_db");
session_start();
?>

<div class="col-md-2 sidebar">
        <div class="sidebar-heading">
          <img src="images/logo1.png" alt="Myntra Logo" style="height: 30px; margin-right: 10px; border-radius: 10%; background: transparent;"> <br>
          Myntra
        </div>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="t.php"><i class="fas fa-home mr-1"></i> Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="customers.php"><i class="fas fa-users mr-1"></i> Customers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="product.php"><i class="fas fa-shopping-bag mr-1"></i> Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="orders.php"><i class="fas fa-file-alt mr-1"></i> Orders</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="men_product.php"><i class="fas fa-shopping-bag mr-1"></i> men product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="g_kids_product.php"><i class="fas fa-shopping-bag mr-1"></i> kids product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profile.php"><i class="fas fa-user mr-1"></i> Profile</a>
         </li>
          <?php
          
          if(!isset($_SESSION['username'])) {
            ?>
             <li class="nav-item">
            <a class="nav-link" href="login.php"><i class="fas fa-chart-bar mr-1"></i> login</a>
          </li> 
          
          <?php
          }
          else {
          ?>
          <form action="tasklogout.php" method="post">
          <a class="nav-link" href="tasklogout.php" name="logout"><i class="fas fa-sign-out-alt mr-1"></i>logout</a>
          
          </form>

          
          <?php
        }
        ?>
        </ul>
      </div>
    </body>
</html>