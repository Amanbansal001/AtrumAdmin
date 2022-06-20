<!DOCTYPE html>
<html lang="en">
<?php require_once(__DIR__.'/../layout/head.php'); ?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php require_once(__DIR__.'/../layout/nav.php'); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php require_once(__DIR__.'/../layout/aside.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <?php $breadcrumbs=['Product'];$breadcrumbActive="Product"; require_once(__DIR__.'/../layout/global/breadcrumb.php'); ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          
          
          <?php 
          $heading="Featured Artwork";
          $dtTagLine="Atrumart Featured Artwork";
          $columns = ["id","arts.categoryId","arts.publishYear","arts.productName","arts.productDescription","arts.productImage","arts.price","arts.shippingInfo","arts.collection","arts.medium","arts.signature","arts.certificateAuth","arts.frame","action"];
          $columnsFace = ["id","Category Id","Publish Year","Product Name","Product Description","Product Image","Price","ShippingInfo","Collection","Medium","Signature","CertificateAuth","Frame","Action"];
          $columnsImg="arts.productImage";
          $apiCall="trendingArtworks";
          $isTblAdd=false;
          $actionDel=true;
          require_once(__DIR__.'/../layout/global/table.php'); 
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
  <?php require_once(__DIR__.'/../layout/footer.php'); ?>

  
</div>
<!-- ./wrapper -->
<?php require_once(__DIR__.'/../layout/scripts.php'); ?>

</body>
</html>
