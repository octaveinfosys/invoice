<?php

require_once './DB.php';

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$address = $_POST["address"];

$website = $_POST["website"];
$gst_aplicable = $_POST["gst"];
$gst_number = $_POST["gst_number"];
$gst_perc = $_POST["gst_perc"];

$sql = "INSERT INTO company(name,email,phone,address,website,gst_aplicable,gst_number,gst_perc) VALUES ('$name','$email','$phone','$address','$website','$gst_aplicable','$gst_number','$gst_perc')";
mysqli_query($conn, $sql);
if ($sql) {
    header("location:company_list?sucess=Data Sucessfully Inserted");
} else {
    echo'error to uploading';
}
