<?php
include './headerLink.php';
session_start();
if (isset($_SESSION['user'])) {
    $id = isset($_GET['id']) ? $_GET['id'] : '';
} else {
    header("location:login");
}

$message = '';
?>
<style>
    #loading {
        display:none;
    }

    .loading-state {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.3);
        z-index: 9999;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .loading {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 80px;
        height: 80px;
        border-radius: 50%;
        border: 10px solid #ddd;
        border-top-color: orange;
        animation: loading 1s linear infinite;
    }
    @keyframes loading {
        to {
            transform: rotate(360deg);
        }
    }

</style>

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

            <section role="main" class="content-body">
                <header class="page-header page-header-left-inline-breadcrumb">
                    <h2 class="font-weight-bold text-6">Invoice List</h2>
                    <div class="right-wrapper">
                        <ol class="breadcrumbs">

                            <li><span>Home</span></li>

                            <li><span>Customer</span></li>

                        </ol>

                        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
                    </div>
                </header>
                <div class="loading-state" id="loading">
                    <div class="loading"></div>
                </div>
                <div class="row">
                    <div class="col">
                        <section class="card">
                            <div class="card-body">
                                <p><?php echo $message; ?></p>
                                <table class="table table-bordered table-striped mb-0" id="datatable-tabletools">

                                    <thead>
                                        <tr>
                                            <th width="5%">Sr. No.</th>
                                            <th width="5%">Invoice No.</th>
                                            <th width="20%">Invoice Date</th>
                                            <th width="30%">Invoice Name</th>
                                            <th width="10%">Invoice Total</th>
                                            <th width="10%">Due Amount</th>

                                            <th width="20%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once ('./DB.php');
                                        $sql = "SELECT * FROM customer,invoice_order WHERE customer.id=invoice_order.cust_id ORDER BY invoice_order.invoice_id DESC";
                                        $sql_result = mysqli_query($conn, $sql);
                                        $counter = 0;
                                        while ($row = mysqli_fetch_array($sql_result)) {
                                            ?>

                                            <tr>
                                                <td><?php echo ++$counter; ?></td>
                                                <td><strong><?php echo $row['invoice_id']; ?></strong></td>
                                                <td><?php echo $row['date']; ?></td>
                                                <td><?php echo $row['c_name']; ?></td>
                                                <td><?php echo $row['total_after_tax']; ?></td>
                                                <td><?php echo $row['total_amount_due']; ?></td>

                                                <td class="actions">
                                                    <a href="update_invoice?invoice_id=<?php echo $row['invoice_id']; ?>&cust_id=<?php echo $row['cust_id']; ?>" title="Update" class="on-default edit-row"><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="#!" id="<?php echo $row ['invoice_id']; ?>" class="on-default remove-row deleteBtn" title="Delete"><i class="far fa-trash-alt"></i></a>
                                                    <a href="invoice_pdf?invoice_id=<?php echo $row['invoice_id']; ?>&cust_id=<?php echo $row['cust_id']; ?>" target="_blank" title="Print" class="on-default remove-row"><i class="fa fa-print"></i></a>
                                                    <a href="emailPdf?invoice_id=<?php echo $row['invoice_id']; ?>&cust_id=<?php echo $row['cust_id']; ?>"  title="send to email" class="on-default remove-row emailBtn"><i class="fa fa-envelope"></i></a>


                                                </td>
                                            </tr>


                                            <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>

                        </section>
                    </div>
                </div>

            </section>
        </div>

    </section>

    <?php
    include './footerLink.php';
    ?>

    <script src="vendor/datatables/extras/TableTools/Buttons-1.4.2/js/dataTables.buttons.min.js"></script>
    <script src="vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.bootstrap4.min.js"></script>
    <script src="vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.html5.min.js"></script>
    <script src="vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.print.min.js"></script>
    <script src="vendor/datatables/extras/TableTools/JSZip-2.5.0/jszip.min.js"></script>
    <script src="vendor/datatables/extras/TableTools/pdfmake-0.1.32/vfs_fonts.js"></script>


    <script src="js/examples/examples.datatables.tabletools.js"></script>

    <script>

        //            Delete Query

        $(document).ready(function () {
            $('.deleteBtn').click(function () {
                var id = $(this).attr("id");
                if (confirm("Are you sure you want to delete this ?" + id)) {
                    $.ajax({
                        type: "POST",
                        url: "delete_invoice.php",
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

            $('.emailBtn').click(function () {

                $("#loading").show();


            });
        });

    </script>
</body>

</html>