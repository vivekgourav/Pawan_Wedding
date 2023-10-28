<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the existing counter value from the text file
    $counterFile = 'counter.txt';
    $existingCounter = (int) file_get_contents($counterFile);

    // Increment the counter
    $existingCounter++;

    // Save the updated counter value back to the text file
    file_put_contents($counterFile, $existingCounter);

    // Retrieve other form data
    $name = $_POST["name"];
    $email = $_POST["email"];

    // Format the form data
    $formData = "Name: $name\nEmail: $email\nCounter: $existingCounter\n\n";

    // Define the text file to save the form data
    $textFile = 'form_submissions.txt';

    // Append the form data to the text file
    file_put_contents($textFile, $formData, FILE_APPEND);

    // Send an email with the form data
    mail("vivekgourav.s@gmail.com", "Form Submission", $formData);

    // Display a pop-up message using JavaScript
    echo '<script>alert("Thanks, we have received your submission. We are hoping to see you soon.");</script>';
}
?>