<?php
include './headerLink.php';
require_once ('./DB.php');
$cust_id = isset($_GET['id']) ? $_GET['id'] : '';
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

            <section role="main" class="content-body content-body-modern mt-0">

                <header class="page-header page-header-left-inline-breadcrumb">
                    <h2 class="font-weight-bold text-4">Customer #<?php echo $cust_id; ?> Details</h2>
                    <div class="right-wrapper">
                        <ol class="breadcrumbs">

                            <li><span>Home</span></li>

                            <li><span>Invoice</span></li>

                        </ol>

                        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
                    </div>
                </header>

                <!-- start: page -->
                <form class="order-details action-buttons-fixed" action="insert_invoice" method="post" enctype="multipart/form-data">
                    <?php
                    $sql1 = "SELECT * FROM customer where id='$cust_id'";
                    $sql_result1 = mysqli_query($conn, $sql1);
                    $row1 = mysqli_fetch_array($sql_result1);
                    $timezone = "Asia/Colombo";
                    date_default_timezone_set($timezone);
                    $today = date("Y-m-d");
                    ?>
                    <div class="row">
                        <div class="col-xl-5 mb-5 mb-xl-0">

                            <div class="card card-modern">
                                <div class="card-header">
                                    <h2 class="card-title">Invoice To</h2>
                                </div>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-row">
                                            <div class="form-group col mb-3">
                                                <label>Customer Name</label>
                                                <p><b><?php echo $row1['c_name']; ?></b></p>
                                                <input class="hidden" type="text" name="name" value="<?php echo $row1['c_name']; ?>" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6 mb-6">
                                                <div class="form-group col mb-3">
                                                    <label>Customer ID</label>
                                                    <div class="date-time-field">
                                                        <div class="date">
                                                            <input type="text" class="form-control form-control-modern" name="cust_id" value="<?php echo $cust_id; ?>" readonly="true" />
                                                        </div>
                                                    </div>  
                                                </div>
                                            </div>
                                            <div class="col-xl-6 mb-6">
                                                <div class="form-group col mb-3">
                                                    <label>Invoice Date</label>
                                                    <div class="date-time-field">
                                                        <div class="date">
                                                            <input type="date"class="form-control form-control-modern" name="date" value="<?php echo $today; ?>" required />
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="col-xl-7">

                            <div class="card card-modern">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-auto">
                                            <strong class="d-block text-color-dark">Address:</strong>
                                            <ul class="list list-unstyled list-item-bottom-space-0">
                                                <li><?php echo $row1['c_address']; ?></li>
                                                <li><?php echo $row1['city']; ?></li>
                                                <li><?php echo $row1['pincode']; ?></li>
                                                <li><?php echo $row1['state']; ?></li>
                                            </ul>   
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong class="d-block text-color-dark">Email address:</strong>
                                            <p><?php echo $row1['c_email']; ?></p>
                                        </div>
                                        <div class="col-md-6">       
                                            <strong class="d-block text-color-dark">Phone:</strong>
                                            <p><?php echo $row1['c_phone']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="row">
                        <div class="col">

                            <div class="card card-modern">
                                <div class="card-header">
                                    <h2 class="card-title">Products</h2>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <table class="table table-hover" id="invoiceItem">	
                                                <tr>
                                                    <th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
                                                    <th width="8%">Item No.</th>
                                                    <th width="40%">Item Name</th>
                                                    <th width="15%">Quantity</th>
                                                    <th width="15%">Price</th>								
                                                    <th width="15%">Total</th>
                                                </tr>							
                                                <tr>
                                                    <td><input class="itemRow" type="checkbox"></td>
                                                    <td><input type="text" name="productCode[]" id="productCode_1" class="form-control" autocomplete="off"></td>
                                                    <td><input type="text" name="productName[]" id="productName_1" class="form-control" autocomplete="off"></td>			
                                                    <td><input type="number" name="quantity[]" id="quantity_1" class="form-control quantity" autocomplete="off"></td>
                                                    <td><input type="number" name="price[]" id="price_1" class="form-control price" autocomplete="off"></td>
                                                    <td><input type="number" name="total[]" id="total_1" class="form-control total" autocomplete="off"></td>
                                                </tr>						
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                            <button class="btn btn-danger delete" id="removeRows" type="button">- Delete</button>
                                            <button class="btn btn-primary" id="addRows" type="button">+ Add More</button>
                                        </div>
                                    </div>
                                    <div class="row">	
                                        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                                            <h3>Notes: </h3>
                                            <div class="form-group">
                                                <textarea class="form-control txt" rows="5" name="notes" id="notes" placeholder="Your Notes"></textarea>
                                            </div>

                                        </div>
                                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                                            <div class="row pb-2">
                                                <label class="col-sm-6 control-label text-sm-end pt-2">Subtotal</label>
                                                <div class="col-sm-6">
                                                    <div class="input-group">
                                                        <span class="input-group-text">&#8377;</span>
                                                        <input value="" type="number" class="form-control" name="subTotal" id="subTotal" readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            $sql4 = "SELECT * FROM company";
                                            $sql_result4 = mysqli_query($conn, $sql4);
                                            $row4 = mysqli_fetch_array($sql_result4);
                                            ?>

                                            <?php
                                            if ($row4['gst_aplicable'] == 'yes') {
                                                ?>


                                                <div class="row pb-2">

                                                    <label class="col-sm-6 control-label text-sm-end pt-2">Tax Rate</label>
                                                    <div class="col-sm-6">
                                                        <div class="input-group">
                                                            <span class="input-group-text">&#8377;</span>
                                                            <input value=" <?php echo $row4['gst_perc']; ?>" type="text" class="form-control" name="taxRate" id="taxRate" disabled="true">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row pb-2">
                                                    <label class="col-sm-6 control-label text-sm-end pt-2">Tax Amount</label>
                                                    <div class="col-sm-6">
                                                        <div class="input-group">
                                                            <span class="input-group-text">&#8377;</span>
                                                            <input value="" type="number" class="form-control" name="taxAmount" id="taxAmount" readonly="true">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row pb-2">
                                                    <label class="col-sm-6 control-label text-sm-end pt-2">Taxable Amount</label>
                                                    <div class="col-sm-6">
                                                        <div class="input-group">
                                                            <span class="input-group-text">&#8377;</span>
                                                            <input value="" type="number" class="form-control" name="totalBeforetax" id="totalBeforetax" readonly="true">
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            } else {
                                                
                                            }
                                            ?>




                                            <div class="row pb-2">
                                                <label class="col-sm-6 control-label text-sm-end pt-2"><strong>Total Payable Amount</strong></label>
                                                <div class="col-sm-6">
                                                    <div class="input-group">
                                                        <span class="input-group-text">&#8377;</span>
                                                        <input value="" type="number" class="form-control" name="totalAftertax" id="totalAftertax" readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pb-2">
                                                <label class="col-sm-6 control-label text-sm-end pt-2">Amount Paid</label>
                                                <div class="col-sm-6">
                                                    <div class="input-group">
                                                        <span class="input-group-text">&#8377;</span>
                                                        <input value="" type="number" class="form-control" name="amountPaid" id="amountPaid" placeholder="Amount Paid">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pb-2">
                                                <label class="col-sm-6 control-label text-sm-end pt-2">Amount Due</label>
                                                <div class="col-sm-6">
                                                    <div class="input-group">
                                                        <span class="input-group-text">&#8377;</span>
                                                        <input value="" type="number" class="form-control" name="amountDue" id="amountDue" readonly="true">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

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
    <script src="js/invoice.js" type="text/javascript"></script>
    <script>

        $(document).ready(function () {
            $('#loader').hide();
            $("#btnSubmit").on("click", function () {
                $('#loader').show();
                var form = $("#form").serialize();

                $.ajax({
                    type: 'POST',
                    data: form,
                    url: "updateStatus.php",
                    success: function (data) {
                        $("#success").html(data);
                        $('#loader').hide();


                    }
                });

            });
        });


    </script>
</body>

</html>