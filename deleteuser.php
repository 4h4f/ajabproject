<?php include 'db/connect.php' ?>

<?php include 'inc/header.php'; ?>

<main class="mt-5">
    <div class="container">
        <?php if (isset($_GET['username'])): ?>
        <?php $username = $_GET['username']; ?>
        <?php $medicine = $pdo->query('DELETE FROM users WHERE username = "'.$username.'"'); ?>
        <?php
        session_start();
        unset($_SESSION['isloggedin']);
        unset($_SESSION['username']);
        session_destroy();
        header('Location: index.php?msg=User account deleted successfully');
        ?>
        <?php else: ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Not found.</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>
    </div>
</main>

<?php include 'inc/footer.php'; ?>