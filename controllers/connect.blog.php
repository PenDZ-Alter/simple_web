<?php
  // require_once "../vendor/autoload.php";
  // use Dotenv\Dotenv;
  // $dotenv = Dotenv::createImmutable(__DIR__);
  // $dotenv->load();

  $database = "abx_blogs";
  $user = "root";
  $pass = "";
  $host = "localhost";
  $port = 3307;

  $conn = mysqli_connect($host, $user, $pass, $database, $port);

  if (!$conn) {
    die("Connection Error : " . $conn->connect_error);
  }
?>