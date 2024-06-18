<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $user_id = $_POST['user_id'];
    $pet_name = $_POST['pet_name'];
    $appointment_type = $_POST['appointment_type'];
    $caretaker = $_POST['caretaker'];
    $date_of_appointment = $_POST['date_of_appointment'];
    $fees = $_POST['fees'];
    $payment_type = $_POST['payment_type'];

    // Prepare the SQL statement with placeholders
    $stmt = $conn->prepare("INSERT INTO `pay_table` (user_id, pet_name, appointment_type, caretaker, date_of_appointment, fees, payment_type) VALUES (?, ?, ?, ?, ?, ?, ?)");

    // Check if the statement preparation was successful
    if ($stmt === false) {
        die('Prepare() failed: ' . htmlspecialchars($conn->error));
    }

    // Bind parameters to the placeholders
    $stmt->bind_param("issssds", $user_id, $pet_name, $appointment_type, $caretaker, $date_of_appointment, $fees, $payment_type);

    // Execute the statement and check for success
    if ($stmt->execute()) {
        echo "Registration successful!";
        echo '<a href="services.php">Go back to services</a>'; 
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
