<?php

$errors = [];
$data = [];

if (empty($_POST['fname'])) {
    $errors['fname'] = 'First Name is required.';
}
if (empty($_POST['lname'])) {
    $errors['lname'] = 'Last Name is required.';
}
if (empty($_POST['email'])) {
    $errors['email'] = 'Email is required.';
}
if (empty($_POST['subject'])) {
    $errors['subject'] = 'Subject is required.';
}
if (empty($_POST['message'])) {
    $errors['message'] = 'Message is required.';
}

if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    $to = 'makhdoomkhizar1@gmail.com'; // Change this to your email address
    $subject = 'New message from your website: ' . $_POST['subject'];
    $message = 'First Name: ' . $_POST['fname'] . "\n";
    $message .= 'Last Name: ' . $_POST['lname'] . "\n";
    $message .= 'Email: ' . $_POST['email'] . "\n";
    $message .= 'Subject: ' . $_POST['subject'] . "\n";
    $message .= 'Message: ' . $_POST['message'] . "\n";

    // Set SMTP settings using ini_set()
    ini_set('SMTP', 'smtp.gmail.com');
    ini_set('smtp_port', 587);
    ini_set('sendmail_from', 'makhdoomkhizar1@gmail.com'); // Replace 'your_email@gmail.com' with your Gmail address
    ini_set('sendmail_path', '"/usr/sbin/sendmail -t -i"'); // This line is necessary for some servers to work with Gmail SMTP
    ini_set('smtp_ssl', 'tls'); // Set TLS encryption

    $headers = 'From: ' . $_POST['email'] . "\r\n" .
               'Reply-To: ' . $_POST['email'] . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    if (mail($to, $subject, $message, $headers)) {
        $data['success'] = true;
        $data['message'] = 'Success! Message has been sent.';
    } else {
        $data['success'] = false;
        $data['message'] = 'Oops! There was a problem sending your message.';
    }
}

echo json_encode($data);
?>