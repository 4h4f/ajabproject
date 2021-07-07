<?php include 'db/connect.php' ?>

<?php include 'inc/header.php'; ?>

<?php $medicines = $pdo->query('SELECT * FROM users')->fetchAll(\PDO::FETCH_ASSOC) ?>
        <div class="row">
        <?php foreach($medicines as $medicine): ?>
            <div class="col-md-4 col-sm-6 col-12 my-2">
                <div class="card text-center shadow-lg">
                    <img src="asset/images/job_offer2.jpg" class="card-img-top" alt="job image">
                    <div class="card-header">
                        <h3><?php echo strtoupper($medicine['username']); ?></h3>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><?php echo $medicine['fullname']; ?></p>
                       
                    </div>
                    <div class="card-footer text-muted">
                        <?php echo $medicine['email']; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>