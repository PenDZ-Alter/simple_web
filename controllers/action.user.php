<?php 
  include "connect.user.php";
  session_start();

  $username_get = "";
  $password_get = "";
  $id_prefix = "";
  $name = "";

  if (isset($_GET['username']) && isset($_GET['password'])) {
    $username_get = $_GET['username'];
    $password_get = $_GET['password'];
  }

  $sql = "SELECT * FROM user WHERE username = '$username_get'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row['nama'];
    $stored_password = $row['password'];
    $id_prefix = substr($row['id_user'], 0, 2);

    if ($password_get === $stored_password && $id_prefix === "AD") {
      $_SESSION['message_err'] = "";
      $_SESSION['authenticated'] = true;
      $_SESSION['username'] = $username_get;
      $_SESSION['name'] = $name;
      $_SESSION['user_id'] = $row['id_user'];
      header('location: ../test/test.php');
      exit();
    } else if ($password_get === $stored_password && $id_prefix != "AD") {
      $_SESSION['message_err'] = "";
      $_SESSION['username'] = $username_get;
      $_SESSION['name'] = $name;
      $_SESSION['user_id'] = $row['id_user'];
      header('location: ../index.php');
      exit();
    }
    else {
      $_SESSION['message_err'] = "Incorrect password.";
    }
  } else {
    $_SESSION['message_err'] = "User not found.";
  }

  header('location: ../login.php');
  $conn -> close();
?>