<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sign_up_system";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$first_name = $_POST['first-name'];
$last_name = $_POST['last-name'];
$gender = $_POST['gender'];
$phone_number = $_POST['phone-number'];
$room_number = $_POST['room-number'];
$email = $_POST['email'];
$password = $_POST['password'];

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (first_name, last_name, gender, phone_number, room_number, email, password)
VALUES ('$first_name', '$last_name', '$gender', '$phone_number', '$room_number', '$email', '$hashed_password')";
if ($conn->query($sql) === TRUE) {
  echo "User created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

header('Location: index.html');
exit;
echo 'Redirecting to Home page...';

$conn->close();
?>