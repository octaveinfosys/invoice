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
        $page = 'ecommerce';
        include './header.php';
        ?>
        <!-- end: header -->

        <div class="inner-wrapper">
            <!-- start: sidebar -->
            <?php
            include './sidebar.php';
            ?>
            <!-- end: sidebar -->

            <section role="main" class="content-body content-body-modern">
                <h2 class="text-center">Invoice System</h2>
                <!-- start: page -->
                <div class="row justify-content-center">
                    <div class="col-md-3 col-sm-6 col-xs-4">
                        <section class="card">
                            <div class="card-body">
                                <a href="add-customer">  
                                    <div class="text-center">
                                        <i class="fa fa-user" style="font-size: 100px" aria-hidden="true"></i>
                                        <p class="text-3 text-muted mb-0">Add Customer</p>
                                    </div>
                                </a>

                            </div>
                        </section>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-4">
                        <section class="card">
                            <div class="card-body">
                                <a href="customer_list">  
                                    <div class="text-center">
                                        <i class="fa fa-file-alt" style="font-size: 100px" aria-hidden="true"></i>
                                        <p class="text-3 text-muted mb-0">Customer List</p>
                                    </div>
                                </a>

                            </div>
                        </section>
                    </div>
                    <div class="col-md-3 col-sm-6 col-">
                        <section class="card">
                            <div class="card-body">
                                <a href="invoice_list">  
                                    <div class="text-center">
                                        <i class="fa fa-file-alt" style="font-size: 100px" aria-hidden="true"></i>
                                        <p class="text-3 text-muted mb-0">Invoice List</p>
                                    </div>
                                </a>

                            </div>
                        </section>
                    </div>

                </div>
                <!-- end: page -->
                
            </section>
        </div>



    </section>

    <?php
    include './footerLink.php';
    ?>
    <script>
        //            Delete Query

        $(document).ready(function () {
            $('.deleteBtn').click(function () {
                var id = $(this).attr("id");
                if (confirm("Are you sure you want to delete this ?" + id)) {
                    $.ajax({
                        type: "POST",
                        url: "delete_order.php",
                        data: ({
                            id: id
                        }),
                        cache: false,
                        success: function (value) {
                            location.reload();
                            $("#success").html(value);
                        }
                    });
                } else {
                    return false;
                }
            });
        });

    </script>
</body>

</html>