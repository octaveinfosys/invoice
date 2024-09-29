<?php
require_once './DB.php';
$id = $_POST["id"];

$query = "DELETE invoice_order_item,invoice_order FROM invoice_order_item JOIN invoice_order ON invoice_order_item.invoice_id = invoice_order.invoice_id
WHERE invoice_order_item.invoice_id ='$id'";
mysqli_query($conn, $query);
if(mysqli_query($conn, $query)){
    echo "Data Deleted";
}else{
     echo "Error in Data Deleting";
}
