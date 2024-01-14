<?php
require_once VIEWS . "/incs/header.tpl.php";
?>

<!-- <h1>Registration</h1> -->

<?php
require_once VIEWS . "/incs/footer.tpl.php";
?>

<div class="container mt-3">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <h1><?php echo $title; ?></h1>

      <form action="registration.php" method="POST">

        <div class="form-floating mb-3">
          <input name="name" type="text" class="form-control" id="name" placeholder="Name" value="<?php echo old("name"); ?>">
          <label for="name">Name</label>
        </div>

        <div class="form-floating mb-3">
          <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com" value="<?php echo old("email"); ?>">
          <label for="email">Email address</label>
        </div>

        <div class="form-floating mb-3">
          <input name="password" type="password" class="form-control" id="password" placeholder="Password">
          <label for="password">Password</label>
        </div>

        <button type="submit" class="btn btn-primary">Registration</button>
      </form>
    </div>
  </div>
</div>