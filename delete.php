<?php include 'db/connect.php' ?>

<?php include 'inc/header.php'; ?>

<main class="mt-5">
    <div class="container">
        <?php if (isset($_GET['id'])): ?>
        <?php $id = $_GET['id']; ?>
        <?php $medicine = $pdo->query('DELETE FROM medicines WHERE id = ' . $id); ?>
        <?php
        header('Location: index.php?msg=Medicine deleted successfully');
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