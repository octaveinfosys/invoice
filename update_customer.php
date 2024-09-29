<?php
include './headerLink.php';
session_start();
$cust_id = isset($_GET['cust_id']) ? $_GET['cust_id'] : '';
require_once ('./DB.php');
if (isset($_SESSION['user'])) {
    $id = isset($_GET['id']) ? $_GET['id'] : '';
} else {
    header("location:login");
}
?>
<body>
    <section class="body">

        <!-- start: header -->
        <?php
        include './header.php';
        ?>
        <!-- end: header -->

        <div class="inner-wrapper">
            <!-- start: sidebar -->
            <?php
            $page = 'ecommerce';
            include './sidebar.php';
            ?>
            <!-- end: sidebar -->

            <section role="main" class="content-body content-body-modern mt-0">
                <header class="page-header page-header-left-inline-breadcrumb">
                    <h2 class="font-weight-bold text-6">Customer</h2>
                    <div class="right-wrapper">
                        <ol class="breadcrumbs">

                            <li><span>Home</span></li>

                            <li><span>Add Customer</span></li>

                        </ol>

                        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
                    </div>
                </header>

                <!-- start: page -->
                <form class="ecommerce-form action-buttons-fixed" action="updating_customer" method="post" enctype="multipart/form-data">
                    <?php
                    $sql = "SELECT * FROM customer where id='$cust_id'";
                    $sql_result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($sql_result);
                    ?>
                    <div class="row">
                        <div class="col">
                            <section class="card card-modern card-big-info">
                                <div class="card-body">
                                    <div class="row">
                                        <input type="text" class="hidden" value="<?php echo $cust_id ?>" name="cust_id" placeholder="Enter Billing Name">
                                        <div class="col-lg-3-5 col-xl-4-5">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="input-block mb-3">
                                                        <label>Billing Name* <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" value="<?php echo $row["c_name"] ?>" name="name" placeholder="Enter Billing Name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="input-block mb-3">
                                                        <label>Email <span class="text-danger">*</span></label>
                                                        <input type="email" name="email" value="<?php echo $row["c_email"] ?>"class="form-control" placeholder="Enter Email Address">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="input-block mb-3">
                                                        <label>Phone* <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" value="<?php echo $row["c_phone"] ?>" placeholder="Phone Number" name="phone">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="input-block mb-3">
                                                        <label>Address*</label>
                                                        <textarea class="form-control" name="address" placeholder="Enter Address"><?php echo $row["c_address"] ?></textarea>

                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="input-block mb-3">
                                                        <label>City</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["city"] ?>"name="city" placeholder="Enter City">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="input-block mb-3">
                                                        <label>State</label>
                                                        <input type="text" class="form-control"value="<?php echo $row["state"] ?>" name="state" placeholder="Enter State">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="input-block mb-3">
                                                        <label>Pincode</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["pincode"] ?>"name="pincode" placeholder="Enter Pincode">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="input-block mb-3">
                                                        <label>Website(optional)</label>
                                                        <input type="text" class="form-control" value="<?php echo $row["website"] ?>"name="website" placeholder="Ex: www.example.com">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="input-block mb-3">
                                                        <label>GST Number(optional)</label>
                                                        <input type="text" class="form-control"value="<?php echo $row["gst_number"] ?>" name="gst" placeholder="">
                                                    </div>
                                                </div>

                                            </div>
                                            <button type="submit" class="submit-button btn btn-secondary  d-flex align-items-center ">
                                                Update 
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>

                </form>
                <!-- end: page -->
            </section>
        </div>



    </section>
    <?php
    include './footerLink.php';
    ?>

</body>

</html>