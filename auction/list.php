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

      <?php $breadcrumbs = ['Auction'];
      $breadcrumbActive = "Auction";
      require_once(__DIR__ . '/../layout/global/breadcrumb.php'); ?>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">


              <?php
              $heading = "Auction Listing";
              $dtTagLine = "Atrumart Auction Listing";
              $columns = ["name","startDate","expiryDate","product.productName", "product.productDescription", "product.productImage", "price", "softaction"];
              $columnsFace = ["Auction Name","Start Date","End Date","Product Name", "Product Description", "Product Image", "Min Bid Price", "Action"];
              $columnsImg = "product.productImage";
              $apiCall = "auction?status=0";
              $actionDel = 1;
              require_once(__DIR__ . '/../layout/global/table-auction.php');
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
  <script>
    function __status_call(id) {

      __ajax_http("auction/" + id, {
        isUpdate: 1,
        status: 0,
        id: id
      }, [], "PUT", "nft", () => {
        window.location.reload();
      });
    }

    function __status_active_call(id) {

      __ajax_http("auction/" + id, {
        isUpdate: 1,
        status: 1,
        id: id
      }, [], "PUT", "nft", () => {
        window.location.reload();
      });
    }
  </script>
</body>

</html>