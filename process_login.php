<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
   
    $usernames = $_POST['usernames'];
    $passwords = $_POST['passwords'];

    $stmt = $conn->prepare("INSERT INTO exam_table ( usernames, passwords) VALUES (?,  ?)");
    $stmt->bind_param("ss", $usernames, $passwords);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
