<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the PayPal email from the form
    $paypal_email = filter_var($_POST['paypal-email'], FILTER_SANITIZE_EMAIL);

    // Check if the email is valid
    if (filter_var($paypal_email, FILTER_VALIDATE_EMAIL)) {

        // Your email address where you want to receive notifications
        $to = "163nellygz@gmail.com";
        
        // Email subject
        $subject = "New CloudWare Purchase Request";
        
        // Email message
        $message = "You have a new request for CloudWare key. Here is the PayPal email of the buyer:\n\n";
        $message .= "PayPal Email: " . $paypal_email;
        
        // Headers for the email
        $headers = "From: noreply@yourdomain.com\r\n";
        $headers .= "Reply-To: noreply@yourdomain.com\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Send the email
        if (mail($to, $subject, $message, $headers)) {
            // Success, show confirmation message
            echo "<script>alert('Thank you! We have received your request. We\'ll verify your payment and send the key soon.'); window.location.href='payment.html';</script>";
        } else {
            // Failure, show error message
            echo "<script>alert('Sorry, something went wrong. Please try again later.'); window.location.href='payment.html';</script>";
        }
    } else {
        // Invalid email address
        echo "<script>alert('Invalid PayPal email address. Please check and try again.'); window.location.href='payment.html';</script>";
    }
}
?>
