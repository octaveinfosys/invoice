<?php

require_once './DB.php';

$cust_id = $_POST["cust_id"];
$date = $_POST["date"];
$total_before_tax = $_POST["totalBeforetax"];
$tax_rate = $_POST["taxRate"];
$total_tax = $_POST["taxAmount"];
$total_after_tax = $_POST["totalAftertax"];
$amount_paid = $_POST["amountPaid"];
$total_amount_due = $_POST["amountDue"];
$notes = $_POST["notes"];


$productCode = $_POST["productCode"];
$item_name = $_POST["productName"];
$quantity = $_POST["quantity"];
$price = $_POST["price"];
$total = $_POST["total"];

$sql = "INSERT INTO invoice_order(cust_id,date,	total_before_tax,tax_rate,total_tax,total_after_tax,amount_paid,total_amount_due,notes) "
        . "VALUES ('$cust_id','$date','$total_before_tax','$tax_rate','$total_tax','$total_after_tax','$amount_paid','$total_amount_due','$notes')";
mysqli_query($conn, $sql);
$last_id = $conn->insert_id;
if ($sql) {
    for ($i = 0; $i < count($productCode); $i++) {
        $sql1 = "INSERT INTO invoice_order_item(invoice_id,item_code,item_name,item_quantity,item_price,item_final_amount) "
                . "VALUES ('$last_id','$productCode[$i]','$item_name[$i]','$quantity[$i]',$price[$i],$total[$i])";
        mysqli_query($conn, $sql1);
        if ($sql1) {
             header("location:invoice_list?sucess=Data Sucessfully Inserted");
        }
    }
} else {
    echo 'Error to Insertion';
}
