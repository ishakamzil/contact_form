<!-- PHP Script (saved as `process-form.php`): -->
  
  
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $name = trim($_POST["name"]);
      $email = trim($_POST["email"]);
      $message = trim($_POST["message"]);
  
      // Validate name
      if (empty($name)) {
          $nameError = "Please enter your name.";
      } else {
          $name = htmlspecialchars($name);
      }
  
      // Validate email
      if (empty($email)) {
          $emailError = "Please enter your email address.";
      } else {
          $email = filter_var($email, FILTER_SANITIZE_EMAIL);
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $emailError = "Invalid email address.";
          }
      }
  
      // Validate message
      if (empty($message)) {
          $messageError = "Please enter a message.";
      } else {
          $message = htmlspecialchars($message);
      }
  
      // If there are no errors, send email
      if (empty($nameError) && empty($emailError) && empty($messageError)) {
          $to = "amzilishak@gmail.com"; // Replace with your email address
          $subject = "New message from $name";
          $body = "Name: $name\nEmail: $email\n\n$message";
  
          $headers = "From: $email\r\n";
          $headers .= "Reply-To: $email\r\n";
  
          if (mail($to, $subject, $body, $headers)) {
              $successMessage = "Your message has been sent.";
          } else {
              $errorMessage = "There was a problem sending your message.";
          }
      }
  }
  ?>
  
  
  <!-- Note that in the PHP script, you'll need to replace `your-email@example -->