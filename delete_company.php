<?php
require_once './DB.php';
$id = $_POST["id"];

$query = "DELETE FROM company WHERE id ='$id'";
mysqli_query($conn, $query);
if(mysqli_query($conn, $query)){
    echo "Data Deleted";
}else{
     echo "Error in Data Deleting";
}
