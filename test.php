New! Keyboard shortcuts … Drive keyboard shortcuts have been updated to give you first-letters navigation
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

if (isset($_POST['send'])) {
    // Get recipient email
    $recipient_email = $_POST['email'];

    // Check if a file was uploaded
    if (isset($_FILES['pdf']) && $_FILES['pdf']['error'] == UPLOAD_ERR_OK) {
        // Get file details
        $pdf_name = $_FILES['pdf']['name'];
        $pdf_tmp_name = $_FILES['pdf']['tmp_name'];

        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'mocha6007.mochahost.com';// Your SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'saddam@octaveinfosys.com'; // Your SMTP username
            $mail->Password = '9920341097'; // Your SMTP password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Recipients
            $mail->setFrom('saddam@octaveinfosys.com', 'Tarif');
            $mail->addAddress($recipient_email);

            // Attach the PDF file
            $mail->addAttachment($pdf_tmp_name, $pdf_name);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'PDF Attachment';
            $mail->Body = 'Please find the attached PDF file.';

            // Send email
            $mail->send();

            echo "<script> alert('Email sent successfully.');</script>";
        } catch (Exception $e) {
            echo 'Error sending email: ', $mail->ErrorInfo;
        }
    } else {
        echo 'Please upload a PDF file.';
    }
}

?>
<body>
    <div>
        <h2>Send PDF Form</h1>
        <form  method="post" enctype="multipart/form-data">
            <label for="email">Recipient Email:</label>
            <input type="email" name="email" required><br><br>
            <label for="pdf">PDF File:</label>
            <input type="file" name="pdf" accept=".pdf" required><br><br>
            <input type="submit" name="send" value="Send PDF">
        </form>
    </div>
</body>
</html>