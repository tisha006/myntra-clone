<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customers Page</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="style.css">
  
  <style>
    /* Custom styles */
    /* body {
      background-color: #f8f9fa;
    }
    .sidebar {
      background-color: #343a40;
      color: #ffffff;
      height: 50rem;
      position: relative;
     
    }
    .sidebar-heading {
      padding: 1rem;
      text-align: center;
    }
    .nav-link {
      color: #ffffff;
      margin: 15px;
      font-size: large;
    }
    .nav-link:hover {
      color: #f8f9fa;
    } */
    /* .table-user img {
        height: 45px;
        width: 46px;
    }
    .cust-section {
      padding-top: 56px; 
      overflow-y: auto;
      height: calc(100vh - 56px);
    } 
    /* .customer-details {
      margin-top: 20px;
    }
    .customer-card {
      background-color: #ffffff;
      border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
      padding: 20px;
    }
    .customer-info {
      font-size: 18px;
      margin-bottom: 10px;
    }
    .total-customers {
      margin-top: 20px;
      font-size: 24px;
    } */
  </style>
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <?php
    include_once("nav.php");
    if (!isset($_SESSION['username'])) {
        ?>
        <script>
             window.location.href="login.php";
        </script>
        <?php
    }
    ?>
      <div class="col-md-10 cust-section">
    <div class="table-responsive">
        <table class="table table-centered table-striped dt-responsive nowrap w-100" id="products-datatable">
            <thead>
                <tr>
                    <th style="width: 20px;">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="customCheck1">
                            <label class="form-check-label" for="customCheck1">&nbsp;</label>
                        </div>
                    </th>
                    <th>Customer name</th>
                    <!-- <th>Phone</th> -->
                    <th>Email</th>
                    <!-- <th>Location</th> -->
                    <!-- <th>Create Date</th> -->
                    <th>Status</th> 
                </tr>
            </thead>
            <?php
        
           $sql = "SELECT * FROM registertable";
           $result = mysqli_query($con, $sql);
           
           if (mysqli_num_rows($result) > 0) {
               // Loop through each row
               while ($row = mysqli_fetch_assoc($result)) {
                   // Check if user is logged in (active)
                   $status_text = $row['status'];
                   
                   // Output HTML table row with fetched data
                   echo '<tr>
                           <td>
                               <div class="form-check">
                                   <input type="checkbox" class="form-check-input" id="customCheck2">
                                   <label class="form-check-label" for="customCheck2">&nbsp;</label>
                               </div>
                           </td>
                           <td class="table-user">
                               <img src="images/pic6.png" class="me-2 rounded-circle" style="width:45px;">
                               <a href="#" class="text-body fw-semibold">' . $row['username'] . '</a>
                           </td>
                           <td>' . $row['email'] . '</td>
                           <td>' . $status_text . '</td>
                       </tr>';
               }
           } else {
               // If no rows returned from the database
               echo '<tr><td colspan="4">No records found</td></tr>';
           }
           ?>
           
          
            <!-- <tbody>
                <tr>
                    <td>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="customCheck2">
                            <label class="form-check-label" for="customCheck2">&nbsp;</label>
                        </div>
                    </td>
                    <td class="table-user">
                        <img src="images/pic1.jpg" class="me-2 rounded-circle">
                        <a href="#" class="text-body fw-semibold">Paul J. Friend</a>
                    </td>

                    <td>
                        pauljfrnd@jourrapide.com
                    </td>
                    
                    <td>
                        <span class="text-success">Active</span>
                    </td>

                    
                </tr> -->
                
                <!-- <tr>
                    <td>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="customCheck3">
                            <label class="form-check-label" for="customCheck3">&nbsp;</label>
                        </div>
                    </td>
                    <td class="table-user">
                        <img src="images/pic2.jpg" alt="table-user" class="me-2 rounded-circle">
                        <a href="javascript:void(0);" class="text-body fw-semibold">Bryan J. Luellen</a>
                    </td>
                    <td>
                        215-302-3376
                    </td>
                    <td>
                        bryuellen@dayrep.com
                    </td>
                    <td>
                        New York
                    </td>
                    <td>
                        09/12/2018
                    </td>
                    <td>
                        <span class="text-success">Active</span>
                    </td>

                
                </tr>
                <tr>
                    <td>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="customCheck4">
                            <label class="form-check-label" for="customCheck4">&nbsp;</label>
                        </div>
                    </td>
                    <td class="table-user">
                        <img src="images/pic3.jpg" alt="table-user" class="me-2 rounded-circle">
                        <a href="javascript:void(0);" class="text-body fw-semibold">Kathryn S. Collier</a>
                    </td>
                    <td>
                        828-216-2190
                    </td>
                    <td>
                        collier@jourrapide.com
                    </td>
                    <td>
                        Canada
                    </td>
                    <td>
                        06/30/2018
                    </td>
                    <td>
                        <span class="text-danger">Inactive</span>
                    </td>

            
                </tr>
                <tr>
                    <td>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="customCheck5">
                            <label class="form-check-label" for="customCheck5">&nbsp;</label>
                        </div>
                    </td>
                    <td class="table-user">
                        <img src="images/pic4.jpg" alt="table-user" class="me-2 rounded-circle">
                        <a href="javascript:void(0);" class="text-body fw-semibold">Timothy Kauper</a>
                    </td>
                    <td>
                        (216) 75 612 706
                    </td>
                    <td>
                        thykauper@rhyta.com
                    </td>
                    <td>
                        Denmark
                    </td>
                    <td>
                        09/08/2018
                    </td>
                    <td>
                        <span class="text-danger">Inactive</span>
                    </td>

                </tr>
                <tr>
                    <td>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="customCheck6">
                            <label class="form-check-label" for="customCheck6">&nbsp;</label>
                        </div>
                    </td>
                    <td class="table-user">
                        <img src="images/pic5.jpg" alt="table-user" class="me-2 rounded-circle">
                        <a href="javascript:void(0);" class="text-body fw-semibold">Zara Raws</a>
                    </td>
                    <td>
                        (02) 75 150 655
                    </td>
                    <td>
                        austin@dayrep.com
                    </td>
                    <td>
                        Germany
                    </td>
                    <td>
                        07/15/2018
                    </td>
                    <td>
                        <span class="text-success">Active</span>
                    </td>

                </tr>
                <tr>
                    <td>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="customCheck7">
                            <label class="form-check-label" for="customCheck7">&nbsp;</label>
                        </div>
                    </td>
                    <td class="table-user">
                        <img src="images/pic6.png" alt="table-user" class="me-2 rounded-circle">
                        <a href="javascript:void(0);" class="text-body fw-semibold">Annette P. Kelsch</a>
                    </td>
                    <td>
                        (+15) 73 483 758
                    </td>
                    <td>
                        annette@email.net
                    </td>
                    <td>
                        India
                    </td>
                    <td>
                        09/05/2018
                    </td>
                    <td>
                        <span class="text-success">Active</span>
                    </td>

                </tr>
                <tr>
                    <td>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="customCheck8">
                            <label class="form-check-label" for="customCheck8">&nbsp;</label>
                        </div>
                    </td>
                    <td class="table-user">
                        <img src="images/pic1.jpg" alt="table-user" class="me-2 rounded-circle">
                        <a href="javascript:void(0);" class="text-body fw-semibold">Jenny C. Gero</a>
                    </td>
                    <td>
                        078 7173 9261
                    </td>
                    <td>
                        jennygero@teleworm.us
                    </td>
                    <td>
                        Lesotho
                    </td>
                    <td>
                        08/02/2018
                    </td>
                    <td>
                        <span class="text-danger">Inactive</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="customCheck9">
                            <label class="form-check-label" for="customCheck9">&nbsp;</label>
                        </div>
                    </td>
                    <td class="table-user">
                        <img src="images/pic6.png" alt="table-user" class="me-2 rounded-circle">
                        <a href="javascript:void(0);" class="text-body fw-semibold">Edward Roseby</a>
                    </td>
                    <td>
                        078 6013 3854
                    </td>
                    <td>
                        edwardR@armyspy.com
                    </td>
                    <td>
                        Monaco
                    </td>
                    <td>
                        08/23/2018
                    </td>
                    <td>
                        <span class="text-success">Active</span>
                    </td>

                    
                </tr>
                <tr>
                    <td>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="customCheck10">
                            <label class="form-check-label" for="customCheck10">&nbsp;</label>
                        </div>
                    </td>
                    <td class="table-user">
                        <img src="images/pic3.jpg" alt="table-user" class="me-2 rounded-circle">
                        <a href="javascript:void(0);" class="text-body fw-semibold">Anna Ciantar</a>
                    </td>
                    <td>
                        (216) 76 298 896
                    </td>
                    <td>
                        annac@hotmai.us
                    </td>
                    <td>
                        Philippines
                    </td>
                    <td>
                        05/06/2018
                    </td>
                    <td>
                        <span class="text-success">Active</span>
                    </td>

                   
                </tr>
                <tr>
                    <td>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="customCheck11">
                            <label class="form-check-label" for="customCheck11">&nbsp;</label>
                        </div>
                    </td>
                    <td class="table-user">
                        <img src="images/pic4.jpg" alt="table-user" class="me-2 rounded-circle">
                        <a href="javascript:void(0);" class="text-body fw-semibold">Dean Smithies</a>
                    </td>
                    <td>
                        077 6157 4248
                    </td>
                    <td>
                        deanes@dayrep.com
                    </td>
                    <td>
                        Singapore
                    </td>
                    <td>
                        04/09/2018
                    </td>
                    <td>
                        <span class="text-success">Active</span>
                    </td>

                   
                </tr>
                <tr>
                    <td>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="customCheck12">
                            <label class="form-check-label" for="customCheck12">&nbsp;</label>
                        </div>
                    </td>
                    <td class="table-user">
                        <img src="images/pic1.jpg" alt="table-user" class="me-2 rounded-circle">
                        <a href="javascript:void(0);" class="text-body fw-semibold">Labeeb Ghali</a>
                    </td>
                    <td>
                        050 414 8778
                    </td>
                    <td>
                        labebswad@teleworm.us
                    </td>
                    <td>
                        United Kingdom
                    </td>
                    <td>
                        06/19/2018
                    </td>
                    <td>
                        <span class="text-success">Active</span>
                    </td>

                   
                </tr>
                <tr>
                    <td>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="customCheck13">
                            <label class="form-check-label" for="customCheck13">&nbsp;</label>
                        </div>
                    </td>
                    <td class="table-user">
                        <img src="images/pic1.jpg" alt="table-user" class="me-2 rounded-circle">
                        <a href="javascript:void(0);" class="text-body fw-semibold">Rory Seekamp</a>
                    </td>
                    <td>
                        078 5054 8877
                    </td>
                    <td>
                        roryamp@dayrep.com
                    </td>
                    <td>
                        United States
                    </td>
                    <td>
                        03/24/2018
                    </td>
                    <td>
                        <span class="text-danger">Inactive</span>
                    </td>

            
                </tr>
            </tbody> -->
        </table>
    </div>
  </div>
</div>
</div>


<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>