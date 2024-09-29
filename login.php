<?php
include './DB.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 
    $myusername = mysqli_real_escape_string($conn, $_POST['username']);
    $mypassword = mysqli_real_escape_string($conn, $_POST['password']);
    $sql = "SELECT * FROM login WHERE email = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $id = $row["id"];
    $profile_active = $row["profile_active"];
    $count = mysqli_num_rows($result);
    $_SESSION['user'] = $myusername;
    $_SESSION['id'] = $id;
    $_SESSION['pass'] = $mypassword;
    // If result matched $myusername and $mypassword, table row must be 1 row
    if ($count == 1) {
        header("location:dashboard");
    } else {
        header("location:login?failed=Email Address or Password is invalid");
    }
}
?>


<!doctype html>
<html class="fixed">

    <head>

        <!-- Basic -->
        <meta charset="UTF-8">
        <meta name="author" content="octaveinfosys.com">

        <!-- Web Fonts  -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" href="vendor/animate/animate.compat.css">
        <link rel="stylesheet" href="vendor/font-awesome/css/all.min.css" />
        <link rel="stylesheet" href="vendor/boxicons/css/boxicons.min.css" />
        <link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.css" />
        <link rel="stylesheet" href="vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

        <!-- Specific Page Vendor CSS -->


        <!-- Theme CSS -->
        <link rel="stylesheet" href="css/theme.css" />

        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="css/custom.css">

        <!-- Head Libs -->
        <script src="vendor/modernizr/modernizr.js"></script>

        <script src="master/style-switcher/style.switcher.localstorage.js"></script>

    </head>
    <body>
        <!-- start: page -->
        <section class="body-sign">
            <div class="center-sign">
                <a href="https://octaveinfosys.com" class="logo float-start">
                    <h1>Admin</h1>
                </a>

                <div class="panel card-sign">
                    <div class="card-title-sign mt-3 text-end">
                        <h2 class="title text-uppercase font-weight-bold m-0"><i class="bx bx-user-circle me-1 text-6 position-relative top-5"></i> Sign In</h2>
                    </div>
                    <div class="card-body">
                        <?php
                        $success = isset($_GET['success']) ? $_GET['success'] : '';
                        $failed = isset($_GET['failed']) ? $_GET['failed'] : '';
                        if ($success != NULL) {
                            ?>
                            <div class="alert alert-success text-left"><strong><i class="fa fa-check"></i> Success !</strong>  <?php echo $success ?> </div>
                            <?php
                        }
                        if ($failed != NULL) {
                            ?>
                            <div class="alert alert-danger text-left"><strong><i class="fa fa-warning"></i> Error !</strong>  <?php echo $failed ?> </div>
                            <?php
                        }
                        ?>
                        <form role="form" action="" method="post">
                            <div class="form-group mb-3">
                                <label>Email</label>
                                <div class="input-group">
                                    <input name="username" id="username" type="email"  class="form-control form-control-lg" />
                                    <span class="input-group-text">
                                        <i class="bx bx-user text-4"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <div class="clearfix">
                                    <label class="float-start">Password</label>
                                    <a href="forgot-password" class="float-end">Lost Password?</a>
                                </div>
                                <div class="input-group">
                                    <input  name="password" id="password" type="password" class="form-control form-control-lg" />
                                    <span class="input-group-text">
                                        <i class="bx bx-lock text-4"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="checkbox-custom checkbox-default">
                                        <input id="RememberMe" name="rememberme" type="checkbox"/>
                                        <label for="RememberMe">Remember Me</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 text-end">
                                    <button type="submit" class="btn btn-primary mt-2">Sign In</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                

                <p class="text-center text-muted mt-3 mb-3">&copy; Copyright 2023. All Rights Reserved.</p>
            </div>
        </section>
        <!-- end: page -->

        <!-- Vendor -->
        <script src="vendor/jquery/jquery.js"></script>
        <script src="vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
        <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
        <script src="master/style-switcher/style.switcher.js"></script>
        <script src="vendor/popper/umd/popper.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="vendor/common/common.js"></script>
        <script src="vendor/nanoscroller/nanoscroller.js"></script>
        <script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>
        <script src="vendor/jquery-placeholder/jquery.placeholder.js"></script>

        <!-- Specific Page Vendor -->


        <!-- Theme Base, Components and Settings -->
        <script src="js/theme.js"></script>

        <!-- Theme Custom -->
        <script src="js/custom.js"></script>

        <!-- Theme Initialization Files -->
        <script src="js/theme.init.js"></script>


    </body>

</html>