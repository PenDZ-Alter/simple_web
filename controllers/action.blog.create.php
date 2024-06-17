<?php
  include "./connect.blog.php";
  session_start();

  $user_id = $_SESSION['user_id'];
  $title = "";
  $cat = "";
  $ctx = "";
  
  if (isset($_GET['title']) && isset($_GET['category']) && isset($_GET['context'])) {
    $title = $_GET['title'];
    $cat = $_GET['category'];
    $ctx = $_GET['context'];
  } else { ?>
    <script>
      alert("Please fill all forms!!");
    </script>
<?php
  }
?>

<?php
  $prefix_article = "AT";
  $prefix_contrib = "KA";
  $random_number = random_int(5, 9999);
  $article_id = $prefix_article . $random_number;

  $sql_check_id = "SELECT id_artikel FROM artikel WHERE id_artikel = '".$article_id."'";
  $result_check_id = $conn -> query($sql_check_id);

  if ($result_check_id && $result_check_id->num_rows > 0) {
    do {
      $random_number = random_int(5, 9999);
      $article_id = $prefix_article . $random_number;
      $sql_check_id = "SELECT id_user FROM user WHERE id_user = '".$article_id."'";
      $result_check_id = $conn->query($sql_check_id);
    } while ($result_check_id && $result_check_id->num_rows > 0);
  }

  $sql_article = "INSERT INTO artikel (`id_artikel`, `judul`, `isi`) VALUES ('".$article_id."', '".$title."', '".$ctx."')";
  $article_status = $conn -> query($sql_article);

  $contrib_id = $prefix_contrib . $random_number;
  $sql_check_contrib = "SELECT id_kontributor FROM kontributor WHERE id_kontributor = '".$contrib_id."'";
  $result_check_contrib = $conn -> query($sql_check_contrib);

  if ($result_check_contrib && $result_check_contrib->num_rows > 0) {
    do {
      $random_number = random_int(5, 9999);
      $contrib_id = $prefix_contrib . $random_number;
      $sql_check_contrib = "SELECT id_kontributor FROM kontributor WHERE id_kontributor = '".$contrib_id."'";
      $result_check_contrib = $conn -> query($sql_check_contrib);
    } while ($result_check_contrib && $result_check_contrib->num_rows > 0);
  }

  $sql_contrib = "INSERT INTO kontributor (`id_kontributor`, `id_user`, `id_kategori`, `id_artikel`) VALUES 
      ('".$contrib_id."', '".$user_id."', '".$cat."', '".$article_id."')";
  
  $contrib_status = $conn -> query($sql_contrib);

  if ($article_status === true && $contrib_status) {
    header("location: ../index.php");
  } else {
    echo "Error: " . $conn->error;
  }
?>