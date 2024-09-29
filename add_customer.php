<?php
include './headerLink.php';
session_start();
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
                <div class="alert-box">
                    <?php
                    $success = isset($_GET['success']) ? $_GET['success'] : '';
                    $failed = isset($_GET['failed']) ? $_GET['failed'] : '';
                    if ($success != NULL) {
                        ?>
                        <div class="alert alert-success border-2 d-flex align-items-center" role="alert">
                            <div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
                            <p class="mb-0 flex-1"><strong>Success !</strong><?php echo $success ?></p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                    }
                    if ($failed != NULL) {
                        ?>
                        <div class="alert alert-danger text-left"><strong><i class="fa fa-warning"></i> Error !</strong>  <?php echo $failed ?> </div>
                        <?php
                    }
                    ?>
                </div>
                <!-- start: page -->
                <form class="ecommerce-form action-buttons-fixed" id="form" method="post">
                    <div class="row">
                        <div class="col">
                            <section class="card card-modern card-big-info">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-2-5 col-xl-1-5">
                                            <i class="card-big-info-icon bx bx-slider"></i>
                                            <h2 class="card-big-info-title">Add New Customer</h2>
                                        </div>
                                        <div class="col-lg-3-5 col-xl-4-5">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="input-block mb-3">
                                                        <label>Billing Name* <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Billing Name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="input-block mb-3">
                                                        <label>Email <span class="text-danger">*</span></label>
                                                        <input type="email" name="email" class="form-control" placeholder="Enter Email Address">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="input-block mb-3">
                                                        <label>Phone* <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="phone" placeholder="Phone Number" name="phone">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="input-block mb-3">
                                                        <label>Address*</label>
                                                        <textarea class="form-control" id="address" name="address" placeholder="Enter Address"></textarea>

                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="input-block mb-3">
                                                        <label>City</label>
                                                        <input type="text" class="form-control" name="city" placeholder="Enter City">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="input-block mb-3">
                                                        <label>State</label>
                                                        <input type="text" class="form-control" name="state" placeholder="Enter State">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="input-block mb-3">
                                                        <label>Pincode</label>
                                                        <input type="text" class="form-control" name="pincode" placeholder="Enter Pincode">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="input-block mb-3">
                                                        <label>Website(optional)</label>
                                                        <input type="text" class="form-control" name="website" placeholder="Ex: www.example.com">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="input-block mb-3">
                                                        <label>GST Number(optional)</label>
                                                        <input type="text" class="form-control" name="gst" placeholder="">
                                                    </div>
                                                </div>

                                            </div>
                                            <button type="button" id="btnSubmit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                    <div class="row action-buttons" style="margin-top: -20px">
                        <div class="col-12 col-md-auto">
                            <img src="loader.gif" alt="loader" style="width: 55px;height: 55px;" id="loader">
                            <label id="error_field" style="color: red"></label>
                            <label id="success" style="color: green"></label>
                            <br>
                            <a href="customer_list" style="text-decoration: underline">Customer List</a>
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
 <script>

        $(document).ready(function () {
            $('#loader').hide();
            $("#btnSubmit").on("click", function () {
                $('#loader').show();
                var form = $("#form").serialize();
                var name = $("#name").val();
                var address = $("#address").val();
                var mobile = $("#phone").val();
                if (name === "") {
                    $('#loader').hide();
                    $("#error_field").html("*Please fill the required field.");
                } else if (mobile === "") {
                    $('#loader').hide();
                    $("#error_field").html("*Please fill the required field.");
                } else if (address === "") {
                    $('#loader').hide();
                    $("#error_field").html("*Please fill the required field.");
                } else {
                    $("#error_field").html("");
                    $.ajax({
                        type: 'POST',
                        data: form,
                        url: "insertCustomer.php",
                        success: function (data) {       
                            $('#loader').hide();
                            window.location.href = "customer_list";


                        }
                    });
                }
            });
        });


    </script>
</body>

</html>