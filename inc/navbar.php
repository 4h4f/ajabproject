<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php">
      <img src="asset/images/job_offer.png" alt="logo" class="img-fluid" width="32" height="32">
      Jobs 
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="create.php">Create job offer</a>
        </li>


        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="otherUsers.php">Other users</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="search.php">Search</a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
        <?php if ($_SESSION['isloggedin']): ?>
          <li class="nav-item">
          <a class="nav-link" aria-current="page" href="dashboard.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="logout.php">Logout</a>
          </li>
        <?php else: ?>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="register.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="login.php">Login</a>
        </li>
        <?php endif; ?>
      </ul>

    </div>
  </div>
</nav>