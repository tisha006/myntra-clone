<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel Dashboard</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="style.css">
 <style>
  .box{
    /* padding-right: 30px; */
    margin-right: 3rem;
    margin-left: 2rem;
    justify-content: space-around;
    /* align-items: center; */
  }
  .admin-footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    position: fixed;
    bottom: 0;
    width: 100%;
}
 </style>
</head>
<body>

<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <?php
    include_once("nav.php");
    ?>
    <!-- Main Content -->
    <div class="col-md-9 product-section">
      <h1 class="mt-4">Dashboard</h1>
        <div class="col-md-9 col-lg-8 content">
        <div class="row">
        <div class="card tilebox-one col-md-5 col-lg-5 box">
          <div class="card-body">
            <i class='uil uil-users-alt float-end'></i>
            <h6 class="text-uppercase mt-0">Customers</h6>
            <h2 class="my-2" id="active-users-count">121</h2>
            <p class="mb-0 text-muted">
              <span class="text-success me-2"><span class="mdi mdi-arrow-up-bold"></span> 5.27%</span>
              <span class="text-nowrap">Since last month</span>
            </p>
          </div> 
        </div>
     

        <div class="card tilebox-one col-md-5 col-lg-5">
          <div class="card-body">
            <i class='uil uil-users-alt float-end'></i>
            <h6 class="text-uppercase mt-0">Total revenue</h6>
            <h2 class="my-2">$90,0000</h2>
            <p class="mb-0 text-muted">
              <span class="text-success me-2"><span class="mdi mdi-arrow-up-bold"></span> 8w.27%</span>
              <span class="text-nowrap">Since last month</span>
            </p>
          </div> <!-- end card-body-->
        </div>
      </div> 
     </div>

     <div class="col-md-9 col-lg-8 content">
      <div class="row">
     <div class="card tilebox-one col-md-5 col-lg-5 box">
      <div class="card-body">
        <i class='uil uil-users-alt float-end'></i>
        <h6 class="text-uppercase mt-0">Total Orders</h6>
        <h2 class="my-2">50,000</h2>
        <p class="mb-0 text-muted">
          <span class="text-success me-2"><span class="mdi mdi-arrow-up-bold"></span> 7.50%</span>
          <span class="text-nowrap">Since last month</span>
        </p>
      </div> <!-- end card-body-->
    </div>
    <div class="card tilebox-one col-md-5 col-lg-5">
      <div class="card-body">
        <i class='uil uil-users-alt float-end'></i>
        <h6 class="text-uppercase mt-0">Returned Product</h6>
        <h2 class="my-2" id="active-users-count">1000</h2>
        <p class="mb-0 text-muted">
          <span class="text-success me-2"><span class="mdi mdi-arrow-up-bold"></span> 5.27%</span>
          <span class="text-nowrap">Since last month</span>
        </p>
      </div> <!-- end card-body-->
    </div>
      </div></div>

    <br>
     <h2 class="mt-4">Products</h2>

    <div class="row">
        <div class="col-md-4">
          <div class="product-card ">
            <div class="product-img custom-height">
              <img src="images/product1.jpg" alt="Product Image">
            </div>
            <div class="product-info">
              <h5 class="product-title">Men's jeans</h5>
              <p class="product-price">$19.99</p>
              <a href="#" class="btn btn-primary">update</a>
              <a href="#" class="btn btn-danger">Delete</a>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="product-card">
            <div class="product-img custom-height">
              <img src="images/p2.jpg" alt="Product Image">
            </div>
            <div class="product-info">
              <h5 class="product-title">Women's stripped jeans</h5>
              <p class="product-price">$24.99</p>
              <a href="#" class="btn btn-primary">update</a>
              <a href="#" class="btn btn-danger">Delete</a>
            </div>
          </div>
        </div>

        <div class="col-md-4">
            <div class="product-card">
              <div class="product-img custom-height">
                <img src="images/p3.jpg" alt="Product Image">
              </div>
              <div class="product-info">
                <h5 class="product-title">converse black shoes</h5>
                <p class="product-price">$10.99</p>
                <a href="#" class="btn btn-primary">update</a>
                <a href="#" class="btn btn-danger">Delete</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="product-card">
              <div class="product-img custom-height">
                <img src="images/p4.jpg" alt="Product Image">
              </div>
              <div class="product-info">
                <h5 class="product-title">canvas bag</h5>
                <p class="product-price">$24.99</p>
                <a href="#" class="btn btn-primary">update</a>
                <a href="#" class="btn btn-danger">Delete</a>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="product-card">
              <div class="product-img custom-height">
                <img src="images/p5.jpg" alt="Product Image">
              </div>
              <div class="product-info">
                <h5 class="product-title">women's kurta set</h5>
                <p class="product-price">$54.99</p>
                <a href="#" class="btn btn-primary">update</a>
                <a href="#" class="btn btn-danger">Delete</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="product-card">
              <div class="product-img custom-height">
                <img src="images/p6.webp" alt="Product Image">
              </div>
              <div class="product-info">
                <h5 class="product-title">men brown jacket</h5>
                <p class="product-price">$34.99</p>
                <a href="#" class="btn btn-primary">update</a>
                <a href="#" class="btn btn-danger">Delete</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="product-card">
              <div class="product-img custom-height">
                <img src="images/p8.jpg" alt="Product Image">
              </div>
              <div class="product-info">
                <h5 class="product-title">brown jacket for women</h5>
                <p class="product-price">$24.99</p>
                <a href="#" class="btn btn-primary">update</a>
                <a href="#" class="btn btn-danger">Delete</a>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="product-card">
              <div class="product-img custom-height">
                <img src="images/p9.jpg" alt="Product Image">
              </div>
              <div class="product-info">
                <h5 class="product-title">floral dress</h5>
                <p class="product-price">$50.99</p>
                <a href="#" class="btn btn-primary">update</a>
                <a href="#" class="btn btn-danger">Delete</a>
              </div>
            </div>
          </div>

        <div class="col-md-4">
          <div class="product-card">
            <div class="product-img custom-height">
              <img src="images/p12.jpg" alt="Product Image">
            </div>
            <div class="product-info">
              <h5 class="product-title">pearl necklace</h5>
              <p class="product-price">$19.99</p>
              <a href="#" class="btn btn-primary">update</a>
              <a href="#" class="btn btn-danger">Delete</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<footer class="admin-footer">
  <p>&copy; 2024 Admin Panel. All rights reserved.</p>
</footer>
<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>