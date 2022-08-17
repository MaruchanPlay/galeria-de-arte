<?php
//print_r($_SESSION);
session_start();
//print_r($_SESSION);
if(!isset($_SESSION['id'])){
  header("Location: ../sign-in/index.php");
}
?>

<!doctype html>
<html lang="en">

<head>
  <?php
  include "../layout/head.php";
  ?>
</head>

<body>
  <?php
  include "./header.php";
  ?>

  <div class="container-fluid">
    <div class="row">
      <?php
      include "../layout/navbar.php"
      ?>
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-1">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3">
          <h1 class="h2"><?php echo $_SESSION['nombre'] . '' . $_SESSION['apellidos'] ?></h1>
        </div>
      </main>
    </div>
  </div>
  <?php
  include "../layout/footer.php   "
  ?>
</body>

</html>