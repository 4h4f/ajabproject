<?php include 'db/connect.php' ?>

<?php include 'inc/header.php'; ?>

<?php
  // validation section
  if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    $errors = array();
    $name = $_POST['name'];
    $description = $_POST['description'];
    $expired_date = $_POST['expired_date'];
    $amount = $_POST['amount'];

    if (empty($name))
    {
        $errors[] = 'Name is required';
    }
    else
    {
        if (empty($description))
        {
            $errors[] = 'Description is required';
        }
        else
        {
            if (empty($expired_date))
            {
                $errors[] = 'Expired date is required';
            }
            else
            {
                if (empty($amount))
                {
                    $errors[] = 'Amount is required';
                }
                else
                {
                    $pdo->query('INSERT INTO medicines(name, description, expired_date, amount) VALUES("'.$name.'", "'.$description.'", "'.$expired_date.'", "'.$amount.'")');
                    header('Location: index.php');
                }
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
    <h3>New job offer</h3>
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
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
  </div>

  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <input type="text" class="form-control" id="description" name="description" placeholder="Description">
  </div>


  <div class="mb-3">
    <label for="expired_date" class="form-label">Expired date</label>
    <input type="date" class="form-control" id="expired_date" name="expired_date" placeholder="Expired date">
  </div>

  <div class="mb-3">
    <label for="amount" class="form-label">Amount</label>
    <input type="number" class="form-control" id="amount" name="amount" placeholder="Amount">
  </div>

  <button type="submit" class="btn btn-success">Add</button>
</form>
  </div>
</div>
    </div>
       </div>
    </div>
</main>

<?php include 'inc/footer.php'; ?>