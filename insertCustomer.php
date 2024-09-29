<?php

require_once './DB.php';

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$city = $_POST["city"];
$state = $_POST["state"];
$pincode = $_POST["pincode"];
$website = $_POST["website"];
$gst = $_POST["gst"];


    $sql = "INSERT INTO customer(c_name,c_email,c_phone,c_address,city,pincode,state,website,gst_number) VALUES ('$name','$email','$phone','$address','$city','$pincode','$state','$website','$gst')";
    mysqli_query($conn, $sql);
    if ($sql) {
        echo'Cuctomer Added successfully';
    } else {
        echo'error to uploading';
    }
