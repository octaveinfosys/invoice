<?php

require_once './DB.php';
$email = mysqli_real_escape_string($conn, $_POST['email']);
if (isset($_POST["reset_password"])) {
    $select = mysqli_query($conn, "SELECT * FROM `login` WHERE `email` = '" . $email . "'") or exit(mysqli_error($conn));
    $row = mysqli_fetch_array($select);
    $email = $row ['email'];
    if (mysqli_num_rows($select)) {
        session_start();
        $_SESSION['email'] = $email;
         header("location:change_password");
    } else {
        header("location:forgot-password?failed=You are not registered with us. Please sign up.");
        //We cannot find an account with that email address
    }
}