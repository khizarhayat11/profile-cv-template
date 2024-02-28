<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Compose the email message
    $to = "makhdoomkhizar1@gmail.com"; // Change this to your email address
    $subject = "New message from your website: $subject";
    $body = "First Name: $fname\nLast Name: $lname\nEmail: $email\n\n$message";

    // Send the email
    if (mail($to, $subject, $body)) {
        http_response_code(200);
        echo "Message sent successfully!";
    } else {
        http_response_code(500);
        echo "Oops! There was a problem sending your message.";
    }
} else {
    http_response_code(405); // Method Not Allowed
    echo "This method is not allowed.";
}
?>