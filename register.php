<?php 
  session_start();
  $toggle_login = "";

  if (isset($_SESSION['message_err']) && !empty($_SESSION['message_err'])) {
    $error_message = $_SESSION['message_err'];
    $toggle_login = '<div class="alert alert-danger mt-3">' . $error_message . '</div>';
    unset($_SESSION['message_err']);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="./assets/styles/login.css">
  <title>Register</title>
</head>
<body>
  <div class="container mt-5 pt-5">
    <div class="row">
      <class class="col-12 col-sm-7 col-md-5 m-auto">
        <div class="card">
          <div class="card-body">
            <form action="./controllers/action.reg.user.php" method="POST">
              <h2 class="mt-2">Sign up your account</h2>
              <input type="text" name="name" placeholder="Name" class="form-control my-4 py-2">
              <input type="text" name="username" placeholder="Username" class="form-control my-4 py-2">
              <input type="password" name="password" placeholder="Password" class="form-control my-4 py-2">
              <div class="text-center mt-3">
                <button class="btn btn-primary">Sign Up</button>
                <a href="./login.php" class="nav-link mt-2">Already have an account?</a>
                <?php echo $toggle_login; ?>
              </div>
            </form>
          </div>
        </div>
      </class>
    </div>
  </div>
</body>
</html>