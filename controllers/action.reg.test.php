<?php 
  include "connect.test.php";
  
  $name = $_POST['name'];
  $user = $_POST['username'];
  $pass = $_POST['password'];

  $sql_get = "SELECT id_user FROM user";
  $result_get_id = $conn -> query($sql_get);
  
  $identifier_count = array();
  $count_user = 0;

  if ($result_get_id) {
    $row = $result_get_id -> fetch_all(MYSQLI_ASSOC);
    
    foreach ($row as $v) {
      $first_letter = substr($v['id_user'], 0, 2);

      if ($first_letter === "UA") {
        $count_user++;
      }

      if (isset($identifier_count[$first_letter])) {
        $identifier_count[$first_letter]++;
      } else {
        $identifier_count[$first_letter] = 1;
      }
    }

    // foreach ($identifier_count as $letters => $count) {
    //   echo "First two letters: $letters, Count: $count <br>";
    // }
  } else {
    echo "Error: " . $conn->error;
  }
  $count_user++;

  $id = "UA" . $count_user;
  
  $sql_query = "INSERT INTO user (`id_user`, `name`, `user_name`, `password`) VALUES ('".$id."', '".$name."', '".$user."', '".$pass."')";
  $status = $conn -> query($sql_query);
  if ($status === true) {
    header("location: ../login.php");
  } else {
    echo "Error: " . $conn->error;
  }
?>