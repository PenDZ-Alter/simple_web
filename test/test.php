<!DOCTYPE html>
<html>
<head>
  <title>Admin | ABX Blogs</title>
</head>
<body>
  <?php 
    include "../navbar.php"; 
    
    if (!isset($_SESSION["authenticated"]) && !isset($_SESSION["username"])) {
      header("location: ../login.php");
      exit();
    } else if (!isset($_SESSION["authenticated"]) && isset($_SESSION["username"])) {
      header("location: ../test/test.php");
      return "You're not allowed to visit this page!!";
    }
  ?>

  <h2>Admin Page</h2>
  <table border="1">
    <tr>
      <thead>
        <td>No.</td>
        <th>ID</th>
        <th>Nama</th>
        <th>Username</th>
      </thead>
    </tr>
    <tbody>
      <?php 
        $no = 1;
        include "../routes/connect.test.php";
        $a = "SELECT * FROM user";
        $b = $conn -> query($a);
        while ($c = $b -> fetch_array()) { ?>
        <tr>
          <th><?php echo $no++; ?></th>
          <th><?php echo $c['id_user']; ?></th>
          <th><?php echo $c['name']; ?></th>
          <th><?php echo $c['user_name']; ?></th>
        </tr>
        <?php
        }
        ?>
    </tbody>
  </table>

  <a href="../routes/logout.session.php">Logout</a>
</body>
</html>