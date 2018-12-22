<!DOCTYPE html>
<html lang="en">
  <head>

    <?php include "../view/header-user.php";?>
    <title>Sistem Pakar</title>

  </head>

  <body>

    <!-- Navigation -->
    <?php
      include "../view/navigation-user.php"; //include
    ?>
    <!-- Content -->
    <header class="masthead text-center text-white">
      <div class="masthead-content">
        <div class="container">
          <h1 class="masthead-heading mb-0">Sistem Pakar</h1>
          <h2 class="masthead-subheading mb-0">Diagnosa Penyakit Ayam Broiler</h2>
          <a href="tentang.php" class="btn btn-primary btn-xl rounded-pill mt-5">pelajari</a>
        </div>
      </div>
      <div class="bg-circle-1 bg-circle"></div>
      <div class="bg-circle-2 bg-circle"></div>
      <div class="bg-circle-3 bg-circle"></div>
      <div class="bg-circle-4 bg-circle"></div>
    </header>

    <!-- Footer -->
    <?php
      include "../view/footer-user.php";
    ?>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
