<!DOCTYPE html>
<?php 
    include "../proses_login/session.php";
?>
<html lang="en">

<head>

  <?php 
    include "head.php";
  ?>

  <meta charset="utf-8" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
 
  <?php 
    include "navigation.php";
  ?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Blank Page</li>
      </ol>
      <div class="row">
        <div class="col-12">
          <h1>Blank</h1>
          <p>This is an example of a blank page that you can use as a starting point for creating new ones.</p>
        </div>
      </div>
    </div>

    <textarea id="editor">
        Lorem <b>ipsum </b><i>dolor </i><strike>sit</strike> <u>amet</u>, <b><i>consectetur</i></b> <u><strike>adipiscing</strike></u> elit, <i><u>sed</u></i> do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        <div style="text-align: center;">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
        <div style="text-align: right;">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</div>
        <div>
            <ul>
                <li>Excepteur sint occaecat cupidatat non proident.<br></li>
                <li>Sunt in culpa qui officia deserunt mollit anim id est laborum.<br></li>
            </ul>
        </div>
    </textarea>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#editor").editor({
                uiLibrary: 'bootstrap4'
            });
        });
    </script>
    <!-- /.container-fluid-->
    <?php 
      include "footer.php";
    ?>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
  </div>
</body>

</html>
