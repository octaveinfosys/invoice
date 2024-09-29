<?php

require_once './DB.php';
$cust_id = $_POST["cust_id"];
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$city = $_POST["city"];
$state = $_POST["state"];
$pincode = $_POST["pincode"];
$website = $_POST["website"];
$gst = $_POST["gst"];

$sql = "UPDATE customer
SET c_name = '$name',c_email = '$email',c_phone = '$phone',c_address = '$address',city = '$city',state = '$state',pincode = '$pincode',website = '$website',gst_number = '$gst' 
WHERE id = '$cust_id' ";

mysqli_query($conn, $sql);
if ($sql) {
    header("location:customer_list?success=Data Sucessfully Updated");
} else {
    echo 'Error to Insertion';
}
