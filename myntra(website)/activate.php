<?php

$database = new DataSource();
if (! empty($_GET["id"])) {
    $query = "UPDATE registered_users set status = ? WHERE id = ?";
    $paramType = 'si';
    $status = active;
    $paramValue = array(
        $status,
        $_GET["id"]
    );
    $result = $database->update($query, $paramType, $paramValue);
    if (! empty($result)) {
        $message = "Your account is activated.";
        $type = "success";
    } else {
        $message = "Problem in account activation.";
        $type = "error";
    }
}
?>
<html>
<head>
<title>PHP User Activation</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
<?php if(isset($message)) { ?>
    <div class="message <?php echo $type; ?>"><?php echo $message; ?></div>
    <?php } ?>
</body>
</html>