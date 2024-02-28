<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Compose the email message
    $to = "your_email@example.com"; // Change this to your email address
    $subject = "New message from your website: $subject";
    $body = "First Name: $fname\nLast Name: $lname\nEmail: $email\n\n$message";

    // Send the email
    if (mail($to, $subject, $body)) {
        echo "Message sent successfully!";
    } else {
        echo "Oops! There was a problem sending your message.";
    }
} else {
    echo "This method is not allowed.";
}
?>