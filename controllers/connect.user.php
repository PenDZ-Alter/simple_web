<?php
  require_once "../vendor/autoload.php";
  use Dotenv\Dotenv;
  $dotenv = Dotenv::createImmutable(__DIR__);
  $dotenv->load();

  $database = "abx_blogs";
  $user = $_ENV["DB_USER"];
  $pass = $_ENV["DB_PASS"];
  $host = $_ENV["DB_HOST"];
  $port = $_ENV["DB_PORT"];

  $conn = mysqli_connect($host, $user, $pass, $database, $port);

  if (!$conn) {
    die("Connection Error : " . $conn->connect_error);
  }
?>