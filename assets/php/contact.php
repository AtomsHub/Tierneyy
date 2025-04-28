<?php
// Make sure the form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and assign variables
    $name    = htmlspecialchars(strip_tags(trim($_POST["name"])));
    $email   = htmlspecialchars(strip_tags(trim($_POST["email"])));
    $subject = htmlspecialchars(strip_tags(trim($_POST["subject"])));
    $message = htmlspecialchars(strip_tags(trim($_POST["message"])));

    // Email settings
    $to = "oladitisodiq@gmail.com"; // 👉 Replace with your email address
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Create the email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Subject: $subject\n\n";
    $email_content .= "Message:\n$message\n";

    // Attempt to send the email
    if (mail($to, $subject, $email_content, $headers)) {
        http_response_code(200); // OK
        echo "Thank you! Your message has been sent.";
    } else {
        http_response_code(500); // Internal Server Error
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
} else {
    http_response_code(403); // Forbidden
    echo "There was a problem with your submission, please try again.";
}
?>
