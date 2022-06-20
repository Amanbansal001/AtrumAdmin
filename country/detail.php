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

      <?php $breadcrumbs = ['Product Detail'];
      $breadcrumbActive = "Product Detail";
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
                    <h3 class="card-title">Country Edit</h3>
                  <?php } else { ?>
                    <h3 class="card-title">Country Add</h3>
                  <?php } ?>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form onsubmit="return validateData();">

                  <div class="card-body">

                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" name="name" maxlength="100" placeholder="" required>
                    </div>

                    <div class="form-group">
                      <label for="name">Vat</label>
                      <input type="text" class="form-control" id="vat" name="vat" maxlength="8" placeholder="" required>
                    </div>

                    <div class="form-group">
                      <label for="name">Iso2</label>
                      <input type="text" class="form-control" id="iso2" name="iso2" maxlength="100" placeholder="" required>
                    </div>

                    <div class="form-group">
                      <label for="name">Currency</label>
                      <input type="text" class="form-control" id="currency" name="currency" maxlength="100" placeholder="" required>
                    </div>

                    <div class="form-group">
                      <label for="name">Currency Symbol</label>
                      <input type="text" class="form-control" id="currency_symbol" name="currency_symbol" maxlength="100" placeholder="" required>
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
    let fileUpload;

    function validateData(e) {
      makeData();
      return false;
    }

    function toUser(res) {

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
      __ajax_http("country/" + pkId, null, [], "GET", "product", function(res) {
        var data = res.data.fetch;
        $("#name").val(data.name)
        $("#vat").val(data.vat)
        $("#iso2").val(data.iso2)
        $("#currency").val(data.currency)
        $("#currency_symbol").val(data.currency_symbol)


      });
    }

    function makeData() {

      var pkId = getParameterByName("id");

      var data = {
        name: $("#name").val(),
        vat: $("#vat").val(),
        iso2: $("#iso2").val(),
        currency: $("#currency").val(),
        currency_symbol: $("#currency_symbol").val(),

      };

      if (pkId) {
        data.id = pkId;
        data.isUpdate = 1;
        __ajax_http("country/" + pkId, data, [], "PUT", "country", toUser);
      } else {
        __ajax_http("country", data, [], "POST", "country", toUser);
      }

    }

    function __init_call() {
      getData();
    }
  </script>

</body>

</html>