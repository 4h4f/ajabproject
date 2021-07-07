<?php include 'db/connect.php' ?>

<?php include 'inc/header.php'; ?>

<?php
  // validation section
  if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    $errors = array();
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username))
    {
      $errors[] = 'Username is required';
    }
    else
    {
        if (empty($password))
        {
          $errors[] = 'Password is required';
        }
        else
        {
          $user = $pdo->query('SELECT * FROM users WHERE username = "'. $username .'" AND password = "'.$password.'"')->fetch();
          if ($user)
          {
            $_SESSION['isloggedin'] = true;
            $_SESSION['username'] = $username;
            echo "'<script>alert('welcome back $username')</script>";
            //echo 'alert(login went successfully)';
            header('Location: index.php?username=' . $username);
          }
          else
          {
            $errors[] = 'Not found';
          }
        }
    }

  }
?>

<main class="mt-5">
    <div class="container">
    <div class="row">
       <div class="col-6 mx-auto">
       <div class="card text-center shadow-lg">
  <div class="card-header">
    <h3>Login</h3>
  </div>
  <div class="card-body">
  <?php if (isset($errors)): ?>
    <?php foreach($errors as $error): ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong><?php echo $error; ?></strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
  <form method="POST">

  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
  </div>

  <button type="submit" class="btn btn-success">Login</button>
</form>
  </div>
</div>
    </div>
       </div>
    </div>
</main>

<?php include 'inc/footer.php'; ?>