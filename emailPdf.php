<?php

require_once './DB.php';
$cust_id = isset($_GET['cust_id']) ? $_GET['cust_id'] : '';
$sql = "SELECT * FROM customer where id='$cust_id'";
$sql_result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($sql_result);
$emailTo = $row["c_email"];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

include('pdf.php');

ob_start();
require 'invoice_preview.php';
$html = ob_get_contents();
ob_get_clean();

$file_name = 'invoice' . '.pdf';
$pdf = new Pdf();
$pdf->load_html($html);
$pdf->render();
$file = $pdf->output();
file_put_contents($file_name, $file);

if (!empty($emailTo)) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'mocha6007.mochahost.com'; // Your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'saddam@octaveinfosys.com'; // Your SMTP username
        $mail->Password = '9920341097'; // Your SMTP password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('saddam@octaveinfosys.com', 'Invoice');
        $mail->addAddress($emailTo);

        // Attach the PDF file
        $mail->addAttachment($file_name);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Invoice';
        $mail->Body = 'Please find the attached PDF file.';

        // Send email
        if ($mail->Send()) {        //Send an Email. Return true on success or false on error
            $message = '<label class="text-success">Email has been send successfully...</label>';
            header("location:invoice_list?sucess=Email has been send successfully");
        }
    } catch (Exception $e) {
        $message= 'Error sending email: '. $mail->ErrorInfo;
    }
}else {
    $message= 'Email ID is Not Valid';
}
unlink($file_name);
