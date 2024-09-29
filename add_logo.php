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
                <!-- start: page -->
                <form class="ecommerce-form action-buttons-fixed" action="insertLogo" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col">
                            <section class="card card-modern card-big-info">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-2-5 col-xl-1-5">
                                            <i class="card-big-info-icon bx bx-slider"></i>
                                            <h2 class="card-big-info-title">Upload Company Logo</h2>
                                        </div>
                                        <div class="col-lg-3-5 col-xl-4-5">
                                            <div class="row">
                                               

                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="input-block mb-3">
                                                        <label>Upload Logo</label>
                                                        <input type="file" name="fileToUpload1"class="form-control" />
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

</body>

</html>