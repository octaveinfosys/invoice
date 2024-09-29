<?php

require_once './DB.php';

$invoice_id = $_POST["invoice_id"];
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


$sql = "UPDATE invoice_order
SET date = '$date',total_before_tax = '$total_before_tax',tax_rate = '$tax_rate',total_tax = '$total_tax',total_after_tax = '$total_after_tax',amount_paid = '$amount_paid',total_amount_due = '$total_amount_due',notes = '$notes' 
WHERE invoice_id = '$invoice_id' ";

mysqli_query($conn, $sql);
if ($sql) {
    $sqlQuery = "DELETE FROM invoice_order_item WHERE invoice_id = '$invoice_id' ";
    mysqli_query($conn, $sqlQuery);
    for ($i = 0; $i < count($productCode); $i++) {
        $sql1 = "INSERT INTO invoice_order_item(invoice_id,item_code,item_name,item_quantity,item_price,item_final_amount) "
                . "VALUES ('$invoice_id','$productCode[$i]','$item_name[$i]','$quantity[$i]',$price[$i],$total[$i])";
        mysqli_query($conn, $sql1);
        if ($sql1) {
             header("location:invoice_list?sucess=Data Sucessfully Inserted");
        }
    }
} else {
    echo 'Error to Insertion';
}
