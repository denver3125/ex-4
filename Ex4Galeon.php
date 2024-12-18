<?php
// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
   
    // Prepare feedback data
    $feedback = "Name: $name\nEmail: $email\nMessage: $message\n---\n";

    // Write feedback to a file
    file_put_contents('feedback.txt', $feedback, FILE_APPEND | LOCK_EX);

    // Display a thank-you message
    echo "<div class='contact-form' style='padding: 20px; text-align: center;'>";
    echo "<h2>Thank You for Your Message, $name!</h2>";
    echo "<p>We have received your message and will get back to you at $email soon.</p>";
    echo "</div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('https://www.freepik.com/free-photos-vectors/desktop-wallpaper-4k');
            color: #333;
            text-align: center;
        }
        header {
            background-color: #222;
            color: #fff;
            padding: 20px;
            border-bottom: 3px solid #388E3C;
        }
        .contact-form {
            padding: 20px;
            background-color: #fefefe;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin: 20px auto;
            max-width: 600px;
        }
        .contact-form input, .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .contact-form button {
            background-color: #388E3C;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .contact-form button:hover {
            background-color: #2c6b2f;
        }
        footer {
            background-color: #222;
            color: #fff;
            padding: 10px;
            border-top: 3px solid #388E3C;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Contact Us</h1>
    </header>
    <div class="contact-form">
        <h2>Get in Touch</h2>
        <form method="post" action="">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" placeholder="Your Message" rows="4" required></textarea>
            <button type="submit">Send Message</button>
        </form>
    </div>
    <footer>
        <p>&copy; 2024 Group Team Assessment</p>
    </footer>
</body>
</html>
