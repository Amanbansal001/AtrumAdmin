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

      <?php $breadcrumbs = ['Auction Name Detail'];
      $breadcrumbActive = "Auction Name Detail";
      require_once(__DIR__ . '/../layout/global/breadcrumb.php'); ?>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <?php if ($_GET && $_GET['id']) { ?>
                    <h3 class="card-title">Auction Name Edit</h3>
                  <?php } else { ?>
                    <h3 class="card-title">Auction Name Add</h3>
                  <?php } ?>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form onsubmit="return validateData();">

                  <div class="card-body">


                    <div class="form-group">
                      <label for="name">Auction Name</label>
                      <input type="text" class="form-control" id="name" maxlength="100" placeholder="Auction Name" required>
                    </div>

                    <div class="form-group">
                      <label for="startDate">Start Date</label>
                      <input type="date" class="form-control" id="startDate" placeholder="startDate" required>
                    </div>

                    <div class="form-group">
                      <label for="expiryDate">End Date</label>
                      <input type="date" class="form-control" id="expiryDate" placeholder="expiryDate" required>
                    </div>

                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->

              <!--/.col (right) -->
            </div>
            <!-- /.row -->
          </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php require_once(__DIR__ . '/../layout/footer.php'); ?>


  </div>
  <!-- ./wrapper -->
  <?php require_once(__DIR__ . '/../layout/scripts.php'); ?>

  <script>
    function validateData(e) {
      makeData();
      return false;
    }

    function callBack_func(res) {
      if (res.code != 200) {
        alert(res.errorMessage);
        return;
      }
      goto('list.php');
    }

    function getData() {
      var pkId = getParameterByName("id");
      if (pkId == null) {
        return
      }
      __ajax_http("auctionNames/" + pkId, null, [], "GET", "nft", function(res) {

        var data = res.data.fetch;
        $("#name").val(data.name)
        $("#expiryDate").val((new Date(res.data.fetch.expiryDate).toISOString().substr(0, 10)));
        $("#startDate").val((new Date(res.data.fetch.startDate).toISOString().substr(0, 10)));

      });
    }

    function makeData() {

      var pkId = getParameterByName("id");

      var data = {
        name: $("#name").val(),
        expiryDate: $("#expiryDate").val(),
        startDate: $("#startDate").val(),
      };

      if (pkId) {
        data.id = pkId;
        data.isUpdate = 1;
        __ajax_http("auctionNames/" + pkId, data, [], "PUT", "auctionNames", callBack_func);
      } else {
        __ajax_http("auctionNames", data, [], "POST", "auctionNames", callBack_func);
      }

    }

    function __init_call() {
      getData();
    }
  </script>

</body>

</html>