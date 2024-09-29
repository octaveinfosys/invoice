<?php

require_once './DB.php';


    $target_dir1 = "uploads/";
    $target_file1 = $target_dir1 . basename($_FILES["fileToUpload1"]["name"]);
    $imageFileType1 = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));

    if (move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file1)) {
        $uploadOk = 1;
        $sql = "INSERT INTO logo (logo) VALUES ('$target_file1')";
        // use exec() because no results are returned
        mysqli_query($conn, $sql);
        if ($sql) {
            header("location:logo_list?uccess= Image Added successfully");
        } else {
            header("location:logo_list?failed=There was an error uploading your Image.");
        }
    }
