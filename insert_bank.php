<?php

require_once './DB.php';
$acc_name = $_POST["acc_name"];
$bank_name = $_POST["bank_name"];
$branch_name = $_POST["branch_name"];
$account_number	 = $_POST["account_number"];
$ifsc_code= $_POST["ifsc_code"];

$sql = "INSERT INTO bank_details(acc_name,bank_name,branch_name,account_number,ifsc_code) VALUES ('$acc_name','$bank_name','$branch_name','$account_number','$ifsc_code')";
mysqli_query($conn, $sql);
if ($sql) {
    header("location:bank_list?sucess=Data Sucessfully Inserted");
} else {
    echo'error to uploading';
}
