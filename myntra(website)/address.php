<?php
include("navbar.php");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Fetch the current user's username from the register table
$username = ""; // Initialize username variable
if (isset($_SESSION['username'])) {
    $currentUserEmail = $_SESSION['username'];
    $getUserQuery = "SELECT username FROM registertable WHERE email = ?";
    $stmt = $con->prepare($getUserQuery);
    $stmt->bind_param("s", $currentUserEmail);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $username = $row['username'];
    }
    $stmt->close();
}

// Retrieve products and quantities from the cart
$selectCart = "SELECT product_name, quantity FROM cart";
$resultCart = $con->query($selectCart);
$productsList = [];
while ($rowCart = $resultCart->fetch_assoc()) {
    $productsList[] = $rowCart['product_name'] . ' (' . $rowCart['quantity'] . ')';
}

// Fetch product details (name, image, price) from the database
$productsDetails = [];
foreach ($productsList as $product) {
    $productName = explode('(', $product)[0];
    $selectProduct = "SELECT * FROM cart WHERE product_name = ?";
    $stmt = $con->prepare($selectProduct);
    $stmt->bind_param("s", $productName);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $productsDetails[] = [
            'name' => $row['product_name'],
            'image' => $row['product_picture'],
            'price' => $row['price'],
            'quantity' => explode('(', $product)[1]
        ];
    }
    $stmt->close();
}

// Include product details from womenproductdetail page, menproductdetail page, and kidsproductdetails page
if (isset($_GET['type'])) {
    $productType = $_GET['type'];
    $productName = urldecode($_GET['name']);
    $productPrice = urldecode($_GET['price']);
    $productImage = urldecode($_GET['image']);
    $productsDetails[] = [
        'name' => $productName,
        'image' => $productImage,
        'price' => $productPrice,
        'quantity' => 1 // Assuming quantity is always 1 when adding from product detail pages
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Address</title>
    <link rel="stylesheet" href="css/address.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
        .product-item {
            margin-bottom: 20px; /* Add space between product items */
        }
        .product-item img {
            width: 100%;
            height: auto;
        }
        
        /* CSS for radio buttons */
.radio-container {
  display: inline-block;
  margin-right: 20px; /* Adjust spacing between radio buttons */
}

/* Hide the actual radio button */
.radio-container input[type="radio"] {
  display: none;
}

/* Style the custom radio button */
.radio-container .custom-radio {
  position: relative;
  display: inline-block;
  width: 20px;
  height: 20px;
  border: 1px solid #aaa;
  border-radius: 50%;
  cursor: pointer;
}

/* Style the inner circle of the custom radio button */
.radio-container .custom-radio::after {
  content: "";
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 10px;
  height: 10px;
  background-color: #2196F3; /* Change color of inner circle when selected */
  border-radius: 50%;
  display: none; /* Initially hide the inner circle */
}

/* Show the inner circle when the radio button is checked */
.radio-container input[type="radio"]:checked + .custom-radio::after {
  display: block;
}

/* Style the label for the radio button */
.radio-container label {
  font-size: 16px; /* Adjust font size as needed */
  vertical-align: middle;
  cursor: pointer;
}

/* Add margin to the label for spacing */
.radio-container label {
  margin-left: 5px;
}
.error {
  color: red;
  margin-left: 5px;
}

    </style>
</head>
<body>
<div class="container">
    <!-- Display selected products with images, names, prices, and quantities -->
    <?php include_once("navbar.php"); ?>
    <?php
    if (!isset($_SESSION['email'])) {
        ?>
        <script>
             window.location.href="login.php";
        </script>
        <?php
        exit();
    }
    $email = $_SESSION['email'];
    $select = "SELECT * FROM registertable WHERE email='$email';";
    $result = $con->query($select);
    $row = $result->fetch_assoc();
    ?>
    <br><span class="name mt-3" style="font-size:25px;margin-left:10px;"><?= $row['username']; ?>'s Products</span><br>

    <?php foreach ($productsDetails as $product) : ?>
        <div class="product-item">
            <img src="<?= $product['image']; ?>" style="width:20px;margin-left:10px;" alt="<?= $product['name']; ?>">
            <p style="margin-left:40px;margin-top:-30px;font-size:12px;"><?= $product['name'] . ' (' . $product['quantity']; ?></p>
            <p style="margin-left:40px;margin-top:-20px;font-size:12px;">₹<?= $product['price']; ?></p>
        </div>
    <?php endforeach; ?>

    <form id="second_form"  method="POST" action="">
       <hr> <div class="all">
            <label class="detail">Full Name* :</label>
            <input type="text" id="name" name="fullname" placeholder="Enter your full Name">
            <div id="name-error" class="error-message" style="color: red;"></div>

            <!-- Add more address fields as needed -->
            <label class="detail">Mobile No* :</label>
            <input type="number" id="number" name="number" placeholder="Mobile No.">
            <div id="number-error" class="error-message" style="color: red;"></div>

            <label class="detail">Email* :</label>
            <input type="email" id="email" name="email" placeholder="example@gmail.com">
            <div id="email-error" class="error-message" style="color: red;"></div>

            <label class="detail">Address* :</label>
            <input type="text" id="address" name="address" placeholder="Flat no.-Street-Area-Locality">
            <div id="address-error" class="error-message" style="color: red;"></div>

            <label class="detail">City* :</label>
            <input type="text" id="city" name="city" placeholder="Mumbai">
            <div id="city-error" class="error-message" style="color: red;"></div>

            <label class="detail">PinCode* :</label>
            <input type="number" id="pin" name="pincode" placeholder="123456">
            <div id="pin-error" class="error-message" style="color: red;"></div>

            <label class="detail">State* :</label>
            <input type="text" id="state" name="state" placeholder="Maharashtra">
            <div id="state-error" class="error-message" style="color: red;"></div>

            <!-- Payment method radio buttons -->
            <div class="radio-buttons">
                <div class="radio-container">
                    <input type="radio" id="cashOnDelivery" name="payment_method" value="cash" checked>
                    <label class="payment-label" for="cashOnDelivery"class="custom-radio">Cash on Delivery</label>
                </div>
                <div class="radio-container">
                    <input type="radio" id="payment" name="payment_method" value="payment">
                    <label class="payment-label" for="payment"class="custom-radio">Payment</label>
                </div>
            </div>
          
                <!-- Payment Details (Hidden by default) -->
                <div id="paymentDetails" style="display: none;">
                    <hr><label class="detail">Card Number* :</label>
                    <input type="text" id="cardNumber" style="border:solid 1px gray;height:30px;"name="card_number" placeholder="Card Number"><br>
                    <label class="detail">Exp Year* :</label>
                    <input type="text" id="expYear" style="border:solid 1px gray;height:30px;"name="exp_year" placeholder="Exp Year"><br>
                    <label class="detail">CVV* :</label>
                    <input type="text" id="cvv" style="border:solid 1px gray;height:30px;"name="cvv" placeholder="CVV"><hr>
                </div>
    </div>
        <button id="submit"style="width:105%;margin-left:-11px;" type="submit" onclick="validateForm()" name="btn">DELEVER</button>
           
    </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve address details from the form
    $number = $_POST['number'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];
    $state = $_POST['state'];
    $fullname = $_POST['fullname'];
    $card_number = $_POST['card_number'] ?? "";
    $exp_year = $_POST['exp_year'] ?? "";
    $cvv = $_POST['cvv'] ?? "";
    
    $delivery = !empty($card_number) ? "Payment" : "Cash on Delivery";
$sql = "INSERT INTO order_confirm (address, city, pincode, state, fullname, number, email, card_number, cvv, exp_year, delivery, products, price, product_image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $con->prepare($sql);
if ($stmt) {
    $stmt->bind_param("ssssssssssssss", $address, $city, $pincode, $state, $fullname, $number, $email, $card_number, $cvv, $exp_year, $delivery, $productName, $productPrice, $productImage);

    foreach ($productsDetails as $product) {
        $productName = $product['name'];
        $productPrice = $product['price'];
        $productImage = $product['image'];
        $stmt->execute();
    }
}

$stmt->close();

        echo "<script>window.location.href = 'order_history.php';</script>";
    }
?>  
 <script>
       const cashOnDeliveryRadio = document.getElementById("cashOnDelivery");
const paymentRadio = document.getElementById("payment");
const paymentDetails = document.getElementById("paymentDetails");

// Function to handle radio button change event
function handlePaymentMethodChange() {
    if (cashOnDeliveryRadio.checked) {
        // If "Cash on Delivery" radio button is checked, hide payment details
        paymentDetails.style.display = "none";
    } else if (paymentRadio.checked) {
        // If "Payment" radio button is checked, show payment details
        paymentDetails.style.display = "block";
    }
}

// Add event listener to radio buttons
cashOnDeliveryRadio.addEventListener("change", handlePaymentMethodChange);
paymentRadio.addEventListener("change", handlePaymentMethodChange);

// Call the function initially to set the initial state based on the checked radio button
handlePaymentMethodChange();

    </script>  
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
    $(document).ready(function () {
        // Add a custom method to validate name (disallow numbers)
        $.validator.addMethod("alphaSpace", function(value, element) {
            return this.optional(element) || /^[A-Za-z\s]+$/.test(value);
        }, "Please enter alphabets only");

        // Initialize validation for the form
        $('form[id="second_form"]').validate({
            rules: {
                fullname: {
                    required: true,
                    alphaSpace: true // Use the custom validation method
                },
                address: 'required',
                city: 'required',
                state: 'required',
                email: {
                    required: true,
                    email: true
                },
                number: {
                    required: true,
                    minlength: 10
                },
                pincode: {
                    required: true,
                    minlength: 6
                }
            },
            messages: {
                fullname: 'This field is required',
                address: 'This field is required',
                city: 'This field is required',
                state: 'This field is required',
                email: 'Enter a valid email',
                fullname: {
                    alphaSpace: 'Number can not allowed'
                },
                number: {
                    minlength: 'Number must be 10 characters long'
                },
                pincode: {
                    minlength: 'Pincode must be 6 characters long'
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>

</body>
</html>
<?php
include("footer.php");
?>