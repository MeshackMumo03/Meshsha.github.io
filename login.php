<?php

session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sign_up_system";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


if (!empty($_POST['email']) && !empty($_POST['password'])) {
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);


  $sql = "SELECT * FROM users WHERE email = '$email'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hashed_password = $row['password'];

    if (password_verify($_POST['password'], $hashed_password)) {
      
      $_SESSION['email'] = $email;
      header('Location: index.html');
      exit();
    } else {
      
      echo "<script>alert('Incorrect email or password. Please try again.');</script>";
    }
  } else {
    
    echo "<script>alert('Please provide an email and password to login.');</script>";
  }
}

$conn->close();
?>
