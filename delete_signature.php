<?php
require_once 'DB.php';
$id = $_POST["id"];
$sql1 = "SELECT * FROM signature WHERE id='$id'";
$result1 = mysqli_query($conn, $sql1);
// output data of each row
while ($row1 = mysqli_fetch_array($result1)) {
    $logo = $row1 ['signature'];
}
unlink($logo);

$query = "DELETE from signature WHERE id='$id'";

if (!mysqli_query($conn, $query)) {
    header("location:signature_list?failed=Sorry, there was an error Deleting your data. !");
} else {
    header("location:signature_list?success=Data delete successfully");
} 
