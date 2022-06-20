<!DOCTYPE html>
<html lang="en">
<?php require_once(__DIR__ . '/../layout/head.php'); ?>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <?php require_once(__DIR__ . '/../layout/nav.php'); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php require_once(__DIR__ . '/../layout/aside.php'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <?php $breadcrumbs = ['User'];
      $breadcrumbActive = "User";
      require_once(__DIR__ . '/../layout/global/breadcrumb.php'); ?>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">


              <?php
              $heading = "Users Listing";
              $dtTagLine = "Atrumart Users Listing";
              $columns = ["id", "featured_artist", "roleType", "name", "country", "bio", "email", "comission", "profilePic", "phone", "city", "state", "nationality", "address", "isWonderRoom", "createdAt"];
              $columnsFace = ["id", "Featured", "Role Type", "name", "Artist User Name", "Bio", "Email", "Commision", "Profile Pic", "Phone", "city", "state", "nationality", "address", "isWonderRoom", "CreatedAt"];
              $columnsImg = "profilePic";
              $apiCall = "users";
              require_once(__DIR__ . '/../layout/global/table.php');
              ?>


            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php require_once(__DIR__ . '/../layout/footer.php'); ?>


  </div>
  <!-- ./wrapper -->
  <?php require_once(__DIR__ . '/../layout/scripts.php'); ?>

</body>

</html>