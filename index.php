<?php include 'db/connect.php' ?>

<?php include 'inc/header.php'; ?>

<main class="mt-5">
    <div class="container">
        <?php if (isset($_GET['msg'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?php echo $_GET['msg']; ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>    
        <?php endif; ?>
        <?php if (isset($_GET['username'])): ?>
        <?php $username = $_GET['username']; ?>
        <?php $user = $pdo->query('SELECT * FROM users WHERE username = "'. $username .'"')->fetch(); ?>
        <?php if ($user): ?>
        <?php else: ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Not found.</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>
        <?php else: ?>
        <!-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Not found.</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> -->
        <?php endif; ?>
        <!-- list all medicines -->
        <?php $medicines = $pdo->query('SELECT * FROM medicines')->fetchAll(\PDO::FETCH_ASSOC) ?>
        <div class="row">
        <?php foreach($medicines as $medicine): ?>
            <div class="col-md-4 col-sm-6 col-12 my-2">
                <div class="card text-center shadow-lg">
                    <img src="asset/images/job_offer2.jpg" class="card-img-top" alt="job image">
                    <div class="card-header">
                        <h3><?php echo strtoupper($medicine['name']); ?></h3>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><?php echo $medicine['description']; ?></p>
                        <a href="details.php?id=<?php echo $medicine['id'] ?>" class="btn btn-primary">See more</a>
                    </div>
                    <div class="card-footer text-muted">
                        <?php echo $medicine['expired_date']; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</main>

<?php include 'inc/footer.php'; ?>