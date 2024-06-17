<?php 
  include "connect.test.php";
  session_start();

  $username_get = "";
  $password_get = "";
  $id_prefix = "";

  if (isset($_GET['username']) && isset($_GET['password'])) {
    $username_get = $_GET['username'];
    $password_get = $_GET['password'];
  }

  // Query the database for the user's information
  $sql = "SELECT * FROM user WHERE user_name = '$username_get'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // User found, check password
    $row = $result->fetch_assoc();
    $stored_password = $row['password']; // Assuming 'password' is the column name in the database
    $id_prefix = substr($row['id_user'], 0, 2);

    // Compare the entered password with the stored password
    if ($password_get === $stored_password && $id_prefix === "AD") {
      // Passwords match, identifier true
      $_SESSION['message'] = "";
      $_SESSION['authenticated'] = true;
      $_SESSION['username'] = $username_get;
      header('location: ../test/test.php');
      exit();
    } else if ($password_get === $stored_password && $id_prefix != "AD") {
      // Password match, identifier false
      $_SESSION['message'] = "";
      $_SESSION['username'] = $username_get;
      header('location: ../index.php');
      exit();
    }
    else {
      // Passwords don't match
      $_SESSION['message'] = "Incorrect password.";
    }
  } else {
    // User not found
    $_SESSION['message'] = "User not found.";
  }

  header('location: ../login.php');
  $conn -> close();
?>