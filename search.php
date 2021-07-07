<?php include 'db/connect.php' ?>

<?php include 'inc/header.php'; ?>

<main class="mt-5">
    <div class="container">
        <div id="display">
           <div class="row">
              <div class="col-9 mx-auto">
                 <input type="search" id="search" placeholder="Enter name" class="form-control">
              </div>
           </div>
        </div>
        <div id="output"></div>
    </div>
</main>

<?php include 'inc/footer.php'; ?>