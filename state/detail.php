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
                    <h3 class="card-title">State Edit</h3>
                  <?php } else { ?>
                    <h3 class="card-title">State Add</h3>
                  <?php } ?>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form onsubmit="return validateData();">

                  <div class="card-body">

                    <div class="form-group">
                      <label for="country">Country</label>
                      <!-- <input type="text" class="form-control" id="country" placeholder="country" required> -->
                      <select id="country" class="form-control"></select>
                      <!-- <select class="form-control" id="country">
                        
                      </select> -->
                    </div>

                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="" maxlength="100" required>
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

      <div class="row">
        <div class="col-md-11"></div>
        <div class="col-md-1  mt-2 pb-4">
          <a href="/city/detail.php?state_id=<?php echo $_GET['id']; ?>" class="btn btn-outline-primary btn-block"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add</a>
        </div>
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">


              <?php
              $heading = "World Listing";
              $dtTagLine = "Atrumart World Listing";
              $columns = ["id", "name", "state.name", "createdAt", "action"];
              $columnsFace = ["id", "name", "State Name", "createdAt", "action"];
              $columnsImg = "url";
              $apiCall = ($_GET && $_GET['id']) ? "city?state_id=" . $_GET['id'] : "city/0";
              $apiCall2 = "city";
              $isTblAdd = false;
              $actionDel = true;
              require_once(__DIR__ . '/../layout/global/table.php');
              ?>


            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
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
      __ajax_http("state/" + pkId, null, [], "GET", "product", function(res) {
        var data = res.data.fetch;
        $("#name").val(data.name)
        $("#country").val(data.country_id);
      });
    }

    function makeData() {

      var pkId = getParameterByName("id");

      var data = {
        name: $("#name").val(),
        country_id: $("#country").val(),
      };

      if (pkId) {
        data.id = pkId;
        data.isUpdate = 1;
        __ajax_http("state/" + pkId, data, [], "PUT", "categorys", toUser);
      } else {
        __ajax_http("state", data, [], "POST", "categorys", toUser);
      }

    }

    function country() {
      __ajax_http("country", null, [], "GET", "country", function(res) {
        var data = res.data.fetch;
        var html = "<option>Select</option>";
        data.forEach((e, idx) => {
          html += "<option value=" + e.id + ">" + e.name + "</option>";
        })

        $("#country").html(html);
        getData();
      });
    }

    country();
  </script>

</body>

</html>