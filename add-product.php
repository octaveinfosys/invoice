<?php
include './header.php';
?>
<body>

    <div class="main-wrapper">

        <?php
        include './top_header.php';
        include './sidebar.php';
        ?>

        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="card mb-0">
                    <div class="card-body">

                        <div class="page-header">
                            <div class="content-page-header">
                                <h5>Add Products / Services</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <form  id="form" method="post">
                                    <div class="form-group-item">
                                        <h5 class="form-title">Basic Details</h5>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3">
                                                    <label>Products/Services Name <span class="text-danger">*</span></label>
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
                                                    <label>Pincode</label>
                                                    <input type="text" class="form-control" name="pincode" placeholder="Enter Pincode">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="input-block mb-3">
                                                    <label>Website</label>
                                                    <input type="text" class="form-control" name="website" placeholder="Ex: www.example.com">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="add-customer-btns">
                                      
                                        <button type="button" id="btnSubmit" style="margin-top: -45px" class="btn customer-btn-save">Save Changes</button>
                                        <img src="loader.gif" alt="loader" style="width: 55px;height: 55px;" id="loader">
                                          <label id="error_field" style="color: red"></label>
                                        <label id="success" style="color: green"></label>
                                        <br>
                                        <a href="add-invoice" style="text-decoration: underline">Generate Invoice</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>




    <?php
    include './setting.php';
    include './footer.php';
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
                            $("#success").html(data);
                            $('#loader').hide();


                        }
                    });
                }
            });
        });


    </script>
</html>