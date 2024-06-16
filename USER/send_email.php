<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    // Địa chỉ email nhận
    $to = "your_email@example.com";
    
    // Tiêu đề email
    $subject = "New Message from Contact Form";
    
    // Nội dung email
    $body = "Name: $name\nEmail: $email\nMessage: $message";
    
    // Gửi email
    if (mail($to, $subject, $body)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send message. Please try again later.";
    }
}
?>
