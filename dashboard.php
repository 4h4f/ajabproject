<?php include 'db/connect.php' ?>

<?php include 'inc/header.php'; ?>

<main class="mt-5">
    <div class="container">
    <?php if(isset($_SESSION['username'])): ?>
    <?php 
        $username = $_SESSION['username'];
        $user = $pdo->query('SELECT * FROM users WHERE username = "'. $username .'" LIMIT 1')->fetchAll(\PDO::FETCH_ASSOC);
    ?>
    <div class="row">
       <div class="col-6 mx-auto">
       <div class="card text-center shadow-lg">
  <div class="card-header">
    <h3>Account</h3>
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
        <?php foreach($user as $u): ?>
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" value="<?php echo $u['username'] ?>" class="form-control" id="username" name="username" placeholder="Username">
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" value="<?php echo $u['email']; ?>" class="form-control" id="email" name="email" placeholder="Email address">
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" value="<?php echo $u['password']; ?>" class="form-control" id="password" name="password" placeholder="Password">
  </div>

  <?php endforeach; ?>

  <button type="submit" class="btn btn-primary float-left">Update</button>
  <a href="deleteuser.php?username=<?php echo $username; ?>" class="btn btn-danger float-right">Delete</a>
  <div class="clearfix"></div>
</form>
  </div>
</div>
    </div>
       </div>
       <?php else: ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Not authorized</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
       <?php endif; ?>
    </div>
</main>

<?php include 'inc/footer.php'; ?>