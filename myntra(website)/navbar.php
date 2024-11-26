
<?php
   session_start();
   $con = mysqli_connect("localhost", "root", "","myntra_db");

   ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/nav.css">
</head>
<body>

  <!-- navbar start -->
<nav class="navbar navbar-expand-sm  bg-white">
  <div class="container-fluid">
    <img src="./images/myntra.webp"class="img">
    <button class="navbar-toggler" style="height:33px;" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"style="width:15px;"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar" >
      <ul class="navbar-nav ">
        <li class="nav-item ">
          <a class="nav-link" href="men2.php" style="font-size:14px;"><b>mens</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="women.php"style="font-size:14px;"><b>womens</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="g_kids.php"style="font-size:14px;"><b>KIDS</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href=""style="font-size:14px;"><b>HOME &amp; LIVING</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href=""style="font-size:14px;"><b>BEAUTY</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href=""style="font-size:14px;"><b>STUDIO</b></a>
        </li>
  </ul>


<!-- searchbar -->
      <div class="div1">
      <img src="./images/searchlogo.png"class="searchlogo" style="width:23px;height:23px;margin-left:10px;"></a>
      <input type="text" name="" id="search" placeholder="Search for products, brands and more" style="width:450px;height:30px;font-size:15px;">
          <div id="two"></div>
  </div>

       <!-- inside the profile -->
       <div id="other_div">
      <div>
          <div id="main_div">
         <img src="./images/profilelogo.png"class="profilelogo"style="width:70px;height:55px;">
          <h5 id="profile_tag"></h5>
          <div id="a">
            <div id="b">
               <div class="div" id="d1">

                   <p id="lp" style="font-size:15px;">To access account and manage order</p>
         <?php
         
          
             if(!isset($_SESSION['username']))   
             {   
            ?>
                   <button id="ls"><a id="logincss" style="font-size:15px;"href="login.php">LOGIN / SIGNUP</a></button><hr>
           <?php
             }
             else {
              ?>
              <hr><form action="logout.php" method="post">
              <button id="ls"style="width:70px;"style="font-size:15px;"><a id="logincss">Logout</a></button><hr>
              </form>
              <ul>
              <li><a href="Profile.php" style="font-size:15px;"class="profilename">Profile</a></li>
             </ul>
              <?php
            }
            ?>       
            
            
            <div class="afterprofile">
              <ul>
                           <!-- <li><a href="wishlist.php">Wishlist</a></li> -->
                           <li><a href="home.php"style="font-size:15px;">About us</a></li>
                          <!-- <li><a href="homeform.php"style="font-size:15px;">Homeproduct</a></li> -->
                          <li><a href="wishlist.php"style="font-size:15px;">wishlist</a></li>
                          <li><a href="add_to_cart.php"style="font-size:15px;">Bag</a></li>
                          <li><a href="order_history.php"style="font-size:15px;">Orders</a></li>



                       </ul> 
                        <ul>
          </div>
                       

           </ul> 
                      </div>
           </div>
          </div>
          </div>
           <!-- bag and wishlist -->
         <a href="wishlist.php"style="width:60px;"><img src="./images/wishlistlogo.png"class="wishlistlogo"style="width:35px;height:25px;"></a>
        <a href="add_to_cart.php"style="font-size:15px;"><img src="./images/cartlogo.png"class="cartlogo"style="width:50px;height:50px;"></a>
          </div>
  </div>
  </div>
      </div>
  </div>
    </div>
  </div>
</div>
</nav>
<!-- navbar end -->

<!-- silder -->











</body>
</html>


