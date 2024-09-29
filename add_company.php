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
            $page = 'setting';
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
                <form class="ecommerce-form action-buttons-fixed" action="insert_company" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col">
                            <section class="card card-modern card-big-info">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-2-5 col-xl-1-5">
                                            <i class="card-big-info-icon bx bx-slider"></i>
                                            <h2 class="card-big-info-title">Add New Company</h2>
                                        </div>
                                        <div class="col-lg-3-5 col-xl-4-5">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="input-block mb-3">
                                                        <label>Company Name <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control"  name="name" placeholder="Enter Company Name">
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
                                                        <label>Phone <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="phone" placeholder="Phone Number" name="phone">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="input-block mb-3">
                                                        <label>Full Address*</label>
                                                        <textarea class="form-control" id="address" name="address" placeholder="Enter Address"></textarea>

                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="input-block mb-3">
                                                        <label>Website(optional)</label>
                                                        <input type="text" class="form-control" name="website" placeholder="Ex: www.example.com">
                                                    </div>
                                                </div>
                                              
                                                <div class="col-lg-6 col-md-6 col-sm-12 pt-3">
                                                    <div class="input-block mb-3">
                                                        <label>Do you have GST Number?</label><br>
                                                        <label for="chkYes">
                                                            <input type="radio" id="chkYes" value="yes" name="gst" />
                                                            Yes
                                                        </label>
                                                        <label for="chkNo">
                                                            <input type="radio" id="chkNo" value="no" name="gst" checked=""/>
                                                            No
                                                        </label><br>
                                                        GST Details:
                                                        <input type="text" name="gst_number" class="form-control" id="txtPassportNumber" disabled="disabled"  placeholder="GST Number"/>
                                                        <input type="number" name="gst_perc" class="form-control" style="margin-top: 10px" id="txt_gst_perc" disabled="disabled" placeholder="GST Percentage %" />
                                                    </div>
                                                </div>

                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                     <div class="row action-buttons">
                        <div class="col-12 col-md-auto">
                            <button type="submit" class="submit-button btn btn-secondary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" data-loading-text="Loading...">
                                <i class="bx bx-save text-4 me-2"></i> Save Product
                            </button>
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
    <script type="text/javascript">
        $(function () {
            $("input[name='gst']").click(function () {
                if ($("#chkYes").is(":checked")) {
                    $("#txtPassportNumber").removeAttr("disabled");
                    $("#txt_gst_perc").removeAttr("disabled");
                    $("#txtPassportNumber").focus();
                } else {
                    $("#txtPassportNumber").attr("disabled", "disabled");
                    $("#txt_gst_perc").attr("disabled", "disabled");
                }
            });
        });
    </script>
</body>

</html>