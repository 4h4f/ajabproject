<?php include 'db/connect.php' ?>

<?php include 'inc/header.php'; ?>

<main class="mt-5">
    <div class="container">
        <?php if (isset($_GET['id'])): ?>
        <?php $id = $_GET['id']; ?>
        <?php $medicine = $pdo->query('SELECT * FROM medicines where id = ' . $id)->fetchAll(\PDO::FETCH_ASSOC); ?>
        <div class="row">
        <?php foreach($medicine as $m): ?>
            <div class="col-8 mx-auto">
                <div class="card text-center shadow-lg">
                    <img src="asset/images/job_offer2.jpg" class="card-img-top" alt="medicine image">
                    <div class="card-header">
                        <h3><?php echo strtoupper($m['name']); ?></h3>
                    </div>
                    <div class="card-body">
                        <div class="card-title"><?php echo $m['amount']; ?></div>
                        <p class="card-text"><?php echo $m['description']; ?></p>
                        <div class="row">
                          <div class="col-6 float-left"><a href="update.php?id=<?php echo $m['id'] ?>" class="btn btn-success">Update</a></div>
                          <div class="col-6 float-right"><a href="delete.php?id=<?php echo $m['id'] ?>" class="btn btn-danger">Delete</a></div>
                          <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <?php echo $m['expired_date']; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
        <?php else: ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Not found.</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>
    </div>
</main>

<?php include 'inc/footer.php'; ?>