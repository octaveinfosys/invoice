<?php
require_once ('./DB.php');
$invoice_id = isset($_GET['invoice_id']) ? $_GET['invoice_id'] : '';
$cust_id = isset($_GET['cust_id']) ? $_GET['cust_id'] : '';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Inline</title>
        <!-- CSS Code: Place this code in the document's head (between the 'head' tags) -->
        <style>
            tr.border_bottom td {
                border-bottom: 1px solid #ddd !important;
                padding: 5px;
                vertical-align: top;
                font-size: 14px;
            }
            tr.heading td {
                padding: 5px;
                vertical-align: top;
                background: #eee;
                border-bottom: 1px solid #ddd;
                font-weight: bold;
            }
            tr.heading1 td {
                padding: 3px;
                vertical-align: top;
                border-bottom: 1px solid #ddd;
                font-family: DejaVu Sans;
                font-size: 14px;
            }
            .heading{
                padding: 3px;
                vertical-align: top;
                border-bottom: 1px solid #ddd;
                font-family: DejaVu Sans;
                font-size: 14px;
            }
            .invoice-box {
                max-width: 100%;
                margin: auto;
                padding-bottom: 0px;
                /*border: 1px solid #eee;*/
                box-shadow: 0 0 10px rgba(0, 0, 0, .15);
                font-size: 16px;
                line-height: 24px;
                font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
                color: #555;
            }
            tr.bottom-table td{
                border: 1px solid #ddd !important;
                padding: 5px;
                vertical-align: top;
                font-size: 14px;
                text-align: center;
            }
        </style>

    </head>
    <body>
        <div class="invoice-box">
            <?php
            $sql1 = "SELECT * FROM invoice_order WHERE invoice_id=$invoice_id";
            $sql_result1 = mysqli_query($conn, $sql1);
            $row1 = mysqli_fetch_array($sql_result1);
            $cgst = $row1['total_tax'] / 2;
            $subtotal = $row1['total_after_tax'];
            ?>
            <table cellpadding="0" cellspacing="0" style="width: 100%;line-height: inherit;text-align: left;">
                <tr class="top">
                    <td colspan="2" style="padding: 5px;vertical-align: top;">
                        <table style="width: 100%;line-height: inherit;text-align: left;">
                            <tr>
                                <td style="padding: 5px;vertical-align: top;text-align: left;padding-bottom: 20px; width: 30%">
                                    <span><strong style="font-size: 26px">INVOICE <br>#<?php echo $invoice_id; ?></strong></span>
                                </td>

                                <td style="padding: 5px;vertical-align: top;text-align: left;padding-bottom: 20px;width: 40%;font-size: 12px;line-height: 15px">
                                    <?php
                                    $sql4 = "SELECT * FROM company";
                                    $sql_result4 = mysqli_query($conn, $sql4);
                                    $row4 = mysqli_fetch_array($sql_result4);
                                    ?>
                                    <strong><span style="text-transform: uppercase"><?php echo $row4['name']; ?></span></strong><br>
                                    <strong> Address: </strong><?php echo $row4['address']; ?><br>
                                    <?php
                                    if ($row4['gst_number']!=null) {
                                        ?>
                               <strong>GST No.</strong><?php echo $row4['gst_number']; ?><br>
                                <?php
                            } else {
                               
                            }
                            ?>
                            

                            <strong> Phone:</strong> <?php echo $row4['phone']; ?><br>
                            <strong>Email:</strong> <?php echo $row4['email']; ?><br>
                            <?php echo $row4['website']; ?>


                            </td>
                            <td class="title" style="padding: 5px;vertical-align: top;padding-bottom: 20px;text-align: right;width: 30%">
                                <?php
                                $sql2 = "SELECT logo FROM logo";
                                $sql_result2 = mysqli_query($conn, $sql2);
                                $row2 = mysqli_fetch_array($sql_result2);
                                ?>
                                <img src="<?php echo $row2['logo']; ?>" style="width:100%; max-width:200px;">
                            </td>
                </tr>

            </table>
            <hr>
            </td>

            </tr>

            <tr class="information">
                <td colspan="2" style="padding: 5px;vertical-align: top;">
                    <table style="width: 100%;line-height: inherit;text-align: left;">
                        <tr>
                            <?php
                            $sql = "SELECT * FROM customer WHERE id=$cust_id";
                            $sql_result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_array($sql_result);
                            ?>

                            <td style="padding: 5px;vertical-align: top;padding-bottom: 40px;width: 40%">
                                <span><strong>TO</strong></span><br>
                                <?php echo $row['c_name']; ?><br>
                                <span style="font-size: 13px;line-height: 17px"> <?php echo $row['c_address']; ?><br>
                                    <?php echo $row['city']; ?>- <?php echo $row['pincode']; ?><br>
                                    <?php echo $row['state']; ?><br>
                                    <?php echo $row['c_phone']; ?><br>

                                </span>
                            </td>

                            <td style="padding: 5px;vertical-align: top;text-align: right;padding-bottom: 40px;width: 60%">
                                Invoice #: <strong><?php echo $invoice_id ?></strong><br>
                                Customer ID: <strong><?php echo $cust_id ?></strong><br>
                                Date: <strong><?php echo $row1['date']; ?></strong> <br>

                                <?php
                                if ($row1['total_amount_due'] == 0) {
                                    ?>
                                    Status: <strong>paid</strong> 
                                    <?php
                                } else {
                                    ?>
                                    Status: <strong>Unpaid</strong> 
                                    <?php
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

        </table>
        <table cellpadding="0" cellspacing="0" style="width: 100%;line-height: inherit;text-align: left;">

            <thead>

                <tr class="heading">
                    <td style="width: 5%">#</td>
                    <td style="width: 40%">ITEM</td>
                    <td style="width: 10%">PRICE</td>
                    <td style="width: 10%">QTY</td>
                    <td style="width: 10%;text-align: right">TOTAL</td>
                </tr>
            </thead>

            <?php
            $sql = "SELECT * FROM invoice_order_item WHERE invoice_id=$invoice_id";
            $sql_result = mysqli_query($conn, $sql);
            $counter = 0;
            while ($row = mysqli_fetch_array($sql_result)) {
                ?>

                <tr class="border_bottom">
                    <td><?php echo $row['item_code']; ?></td>
                    <td><?php echo $row['item_name']; ?></td>
                    <td><?php echo $row['item_price']; ?></td>
                    <td><?php echo $row['item_quantity']; ?></td>
                    <td style="text-align: right"><?php echo $row['item_final_amount']; ?></td>
                </tr>
                <?php
            }
            ?>

            <tr class="border_bottom" >
                <td colspan="5" style="height: 10px"></td>
            </tr>
            <tr class="border_bottom" >
                <td colspan="5" style="height: 10px"></td>
            </tr>
            <tr class="border_bottom" >
                <td colspan="5" style="height: 10px"></td>
            </tr>

        </table>


        <table cellpadding="0" cellspacing="0" style="width: 100%;line-height: inherit;text-align: right;">
            <?php
//                Number to word conversion
            $number = $subtotal;
            $no = floor($number);
            $point = round($number - $no, 2) * 100;
            $hundred = null;
            $digits_1 = strlen($no);
            $i = 0;
            $str = array();
            $words = array('0' => '', '1' => 'One', '2' => 'Two',
                '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
                '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
                '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
                '13' => 'Thirteen', '14' => 'Fourteen',
                '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
                '18' => 'Eighteen', '19' => 'Nineteen', '20' => 'Twenty',
                '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
                '60' => 'Sixty', '70' => 'Seventy',
                '80' => 'Eighty', '90' => 'Ninety');
            $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
            while ($i < $digits_1) {
                $divider = ($i == 2) ? 10 : 100;
                $number = floor($no % $divider);
                $no = floor($no / $divider);
                $i += ($divider == 10) ? 1 : 2;
                if ($number) {
                    $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                    $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                    $str [] = ($number < 21) ? $words[$number] .
                            " " . $digits[$counter] . $plural . " " . $hundred :
                            $words[floor($number / 10) * 10]
                            . " " . $words[$number % 10] . " "
                            . $digits[$counter] . $plural . " " . $hundred;
                } else
                    $str[] = null;
            }
            $str = array_reverse($str);
            $result = implode('', $str);

            echo $result . "Rupees  ";
            ?>
            <tr class="heading1">
                <td style="text-align: left">IN WORD <b>(<?php echo $result . "Rupees"; ?>)</b></td>
                <td style="font-weight: bold">Sub Total</td>
                <td style="font-weight: bold">&#8377; <?php echo $row1['total_after_tax']; ?></td>
            </tr>
            <?php
            if ($row4['gst_aplicable'] == 'yes') {
                ?>
                <tr>
                    <td rowspan="7" style="text-align: left;vertical-align: top;"> 
                        <?php
                        if ($row1['total_amount_due'] == 0) {
                            ?>
                            <img src="img/paid.jpg" style="width:100%; max-width:160px;">
                            <?php
                        } else {
                            ?>
                            <img src="img/unpaid.jpg" style="width:100%; max-width:160px;">
                            <?php
                        }
                        ?>
                    </td>
                    <td class="heading" sty>CGST(<?php echo $row4['gst_perc'] / 2; ?>%)</td>
                    <td class="heading">&#8377; <?php echo $cgst ?></td>
                </tr>
                <tr class="heading1">
                    <td>SGST(<?php echo $row4['gst_perc'] / 2; ?>%)</td>
                    <td>&#8377; <?php echo $cgst ?></td>
                </tr>
                <?php
            } else {
                ?>
                <tr>
                    <td rowspan="6" style="text-align: left;vertical-align: top;">
                        <?php
                        if ($row1['total_amount_due'] == 0) {
                            ?>
                            <img src="img/paid.jpg" style="width:100%; max-width:160px;">
                            <?php
                        } else {
                            ?>
                            <img src="img/unpaid.jpg" style="width:100%; max-width:160px;">
                            <?php
                        }
                        ?>
                    </td>

                </tr>
                <?php
            }
            ?>

            <tr class="heading1">
                <td style="font-weight: bold">Total Payable Amount</td>
                <td style="font-weight: bold">&#8377; <?php echo $row1['total_after_tax']; ?></td>
            </tr>
            <tr class="heading1">
                <td>Amount Paid</td>
                <td>&#8377; <?php echo $row1['amount_paid']; ?></td>
            </tr>
            <tr class="heading1">
                <td>Amount Due</td>
                <td>&#8377; <?php echo $row1['total_amount_due']; ?></td>
            </tr>
        </table>
        <table cellpadding="0" cellspacing="0" style="width: 100%;line-height: inherit;">
            <tr class="bottom-table">
                <td>Bank Details</td>
                <td>Authorized Signature</td>
            </tr>
            <tr  class="bottom-table">
                <td  style="height: 100px; text-align: left">
                    <?php
                    $sql5 = "SELECT * FROM bank_details";
                    $sql_result5 = mysqli_query($conn, $sql5);
                    $row5 = mysqli_fetch_array($sql_result5);
                    ?>
                    <span><strong>Bank Name:</strong> <?php echo $row5['bank_name']; ?></span><br>
                    <span><strong>Branch Name:</strong>  <?php echo $row5['branch_name']; ?></span><br>
                    <span><strong>Account Number:</strong> <?php echo $row5['account_number']; ?></span><br>
                    <span><strong>Bank IFSC Code:</strong>  <?php echo $row5['ifsc_code']; ?></span><br>

                </td>
                <td  style="height: 100px">
                    <?php
                    $sql3 = "SELECT signature FROM signature";
                    $sql_result3 = mysqli_query($conn, $sql3);
                    $row3 = mysqli_fetch_array($sql_result3);
                    ?>
                    <img src="<?php echo $row3['signature']; ?>" style="width:100%; max-width:200px;">
                </td>
            </tr>
        </table>
        <h2 style="text-align: center;padding: 0px">Thank You</h2>
    </div>
</body>
</html>
