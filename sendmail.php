<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);

    $to = "your-email@example.com"; // 🔁 Replace with your real email address
    $email_subject = "New Message from Contact Form: $subject";
    $email_body = "Name: $name\nEmail: $email\nSubject: $subject\n\nMessage:\n$message";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $email_subject, $email_body, $headers)) {
        header("Location: thank-you.html");
        exit();
    } else {
        echo "Sorry, your message couldn't be sent.";
    }
}
?>
