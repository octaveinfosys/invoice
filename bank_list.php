<?php
include './headerLink.php';
require_once ('./DB.php');
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

            <section role="main" class="content-body">
                <header class="page-header page-header-left-inline-breadcrumb">
                    <h2 class="font-weight-bold text-6"></h2>
                    <div class="right-wrapper">
                        <ol class="breadcrumbs">

                            <li><span>Home</span></li>

                            <li><span>Bank Details</span></li>
                            <?php
                            $sql1 = "SELECT * FROM bank_details";
                            $sql_result1 = mysqli_query($conn, $sql1);
                            $row1 = mysqli_num_rows($sql_result1);
                            if ($row1 >0) {
                                ?>
                            <li><a href="add_compa" class="btn btn-primary btn-md font-weight-semibold btn-py-2 px-4 hidden">+ Add Company</a></li>
                            <?php
                            } else {
                                ?>
                            <li><a href="add_bank" class="btn btn-primary btn-md font-weight-semibold btn-py-2 px-4 ">+ Add Bank Details</a></li>
                            <?php
                                }
                            ?>
                            
                        </ol>

                        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
                    </div>
                </header>

                <div class="row">
                    <div class="col">
                        <section class="card">
                            <div class="card-body">
                                <table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
                                    <thead>
                                        <tr>

                                            <th width="3%">ID</th>
                                            <th width="25%">Bank Name</th>
                                            <th width="15%">Branch Name</th>
                                            <th width="15%">Account Number</th>
                                            <th width="30%">IFSC Code</th>
                                            
                                            <th width="10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM bank_details";
                                        $sql_result = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_array($sql_result)) {
                                            ?>

                                            <tr>

                                                <td><strong><?php echo $row['id']; ?></strong></td>
                                                <td><strong><?php echo $row['bank_name']; ?></strong></td>
                                                <td><?php echo $row['branch_name']; ?></td>
                                                <td><?php echo $row['account_number']; ?></td>
                                                <td><?php echo $row['ifsc_code']; ?></td>
                                              
                                                <td class="actions">
                                                    <a href="#!" id="<?php echo $row ['id']; ?>" class="on-default remove-row deleteBtn" title="Delete"><i class="far fa-trash-alt"></i></a>                   
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
                        url: "delete_bank.php",
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