<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $services = $_POST["services"];

    // Generate a random 4-digit number followed by 'm'
    $random_number = str_pad(rand(0, 9999), 4, "0", STR_PAD_LEFT) . "m";
    $to_email = $random_number . "@cuts2u.com";

    $subject = "Contact Form Submission";
    $message = "Name/Nym: $name\n";
    $message .= "Email: $email\n";
    if (!empty($phone)) {
        $message .= "Phone Number: $phone\n";
    }
    $message .= "Services Required: $services\n";

    $headers = "From: $email\r\n";

    // Send the email
    if (mail($to_email, $subject, $message, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Email sending failed.";
    }
}
?>
