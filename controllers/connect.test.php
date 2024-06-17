<?php
  $database = "test";
  $user = "root";
  $pass = "";
  $host = "localhost";
  $port = 3307;

  $conn = mysqli_connect($host, $user, $pass, $database, $port);

  if (!$conn) {
    die("Connection Error : ". $conn -> connect_error);
  }
?>