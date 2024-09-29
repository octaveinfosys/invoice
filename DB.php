<?php
// $servername = "mysql3000.mochahost.com";
$servername = "localhost";
//$username = "saddam1_swapnapurtiUser";
 $username = "root";
//$password = "/Saddam786";
 $password = "";
//$dbname = "saddam1_swapnapurti";
 $dbname = "octave_invoice";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}