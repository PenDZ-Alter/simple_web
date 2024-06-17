<?php
  session_start();

  $toggle_login = "";
  $toggle_logout = "";

  if (!isset($_SESSION['username'])) {
    $toggle_login = "
      <form action=./login.php method=post class=d-flex>
        <button class='btn btn-primary' type=submit>Sign in</button>
      </form>";
  }

  if (isset($_SESSION['username'])) {
    $toggle_login = "
      <li class='nav-item'>
        <a href='/profile.php' class='nav-link'>" . $_SESSION['name'] . "</a>
      </li>";

    $toggle_logout = "<a href='../controllers/logout.session.php'>Log Out</a>";
  }
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <link rel="stylesheet" href="/styles/navbar.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark" data-bs-theme="dark">
    <div class="container-fluid">
      <a href="#" class="navbar-brand">ABX Blogs</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a href="/" class="nav-link active" aria-current="page">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Blogs</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/blogs.visit.php">Visit</a></li>
              <li><a class="dropdown-item" href="#">Filter</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Create</a></li>
            </ul>
          </li>
          <?php echo $toggle_login; ?>
        </ul>
      </div>
    </div>
  </nav>
</body>