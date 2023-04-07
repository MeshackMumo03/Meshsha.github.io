<?php

session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.html");
    exit();
}

$user_id = $_SESSION['id'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sign_up_system";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users WHERE id = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<p>Name: " . $row["first_name"] . " " . $row["last_name"] . "</p>";
    echo "<p>Email: " . $row["email"] . "</p>";
    echo "<p>Phone number: " . $row["phone_number"] . "</p>";
    echo "<p>Room number: " . $row["room_number"] . "</p>";
  }
} else {
  echo "No user found";
}

$conn->close();

?>
