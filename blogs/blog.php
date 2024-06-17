<?php
  include "../controllers/connect.blog.php";

  $id = $_GET['id'];
  if (!isset($_GET['id'])) {
    header("location: visit.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/styles/blogs.css">
  <title>Article | ABX Blogs</title>
  <?php include "../components/toggle_tailwind.php" ?>
</head>
<body>
  <?php include "../components/header.php"; ?>
  <?php
    $query = "SELECT a.*, c.*, d.*, k.* FROM user a JOIN artikel c JOIN kategori k JOIN kontributor d ON a.id_user = d.id_user AND c.id_artikel = d.id_artikel AND k.id_kategori = d.id_kategori WHERE d.id_kontributor='$id'";
    $result = $conn -> query($query);
    $res = $result -> fetch_array();
  ?>

  <!-- Blog Content -->
  <div class="container mx-auto py-8 px-4 lg:px-8">
    <div class="bg-gray-800 rounded-lg shadow-md p-6">
      <h1 class="text-3xl font-bold text-white mb-4"><?php echo $res['judul']; ?></h1>
      <p class="text-white mb-6">Created By <span class="font-semibold text-gray-800"><?php echo $res['nama']; ?></span> · <?php echo $res['nama_kategori'] ?></p>
      <article class="prose max-w-none text-white">
        <?php echo nl2br($res['isi']); ?>
      </article>
    </div>
  </div>
</body>
</html>