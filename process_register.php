<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $name = $_POST['name'];
    $username = $_POST['username'];
    $phone=$_POST['phone'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("INSERT INTO exam_register (name, username,phone, password) VALUES (?, ?,?, ?)");
    $stmt->bind_param("ssss", $name, $username,$phone, $password);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
