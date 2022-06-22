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

              <form onsubmit="return validateData();">

                <div class="card-body">

                  <div class="row">
                    <div class="col-3 form-group">
                      <label for="name">Auction Banner</label>
                      <input type="file" class="form-control" id="upload" name="upload" placeholder="AUCTION_BANNER">
                      <input type="hidden" class="form-control" id="AUCTION_BANNER" name="AUCTION_BANNER" placeholder="AUCTION_BANNER">
                    </div>
                    <div class="col-7 form-group"></div>
                    <div class="col-2 mt-3">
                      <label for="name"></label>
                      <div>
                        <img src="" id="AUCTION_BANNER_URL" width="100px" />
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="name">Current Auction Head</label>
                    <input type="text" class="form-control" id="CURRENT_AUCTION_HEAD" name="CURRENT_AUCTION_HEAD" placeholder="CURRENT_AUCTION_HEAD" required>
                  </div>


                  <div class="form-group">
                    <label for="name">Past Auction Head</label>
                    <input type="text" class="form-control" id="PAST_AUCTION_HEAD" name="PAST_AUCTION_HEAD" placeholder="PAST_AUCTION_HEAD" required>
                  </div>


                  <div class="form-group">
                    <label for="name">Upcoming Auction Head</label>
                    <input type="text" class="form-control" id="UPCOMING_AUCTION_HEAD" name="UPCOMING_AUCTION_HEAD" placeholder="UPCOMING_AUCTION_HEAD" required>
                  </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>

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
    let fileUpload;
    let fetchData;

    function validateData(e) {
      makeData();
      return false;
    }

    function makeData() {
      configUpdate("CURRENT_AUCTION_HEAD");
      configUpdate("AUCTION_BANNER");
      configUpdate("PAST_AUCTION_HEAD");
      configUpdate("UPCOMING_AUCTION_HEAD");

    }

    function configUpdate(col) {
      let id = fetchData.find(e => e.col == col).id;
      __ajax_http("config/" + id, {
        val: $("#" + col).val(),
        isUpdate: 1,
        id: id
      }, [], "PUT", "config", function() {

      });
    }

    function getData() {

      __ajax_http("config", null, [], "GET", "config", function(res) {
        var data = res.data.fetch;
        fetchData = data;
        fileUpload = data.find(e => e.col == "AUCTION_BANNER").val;
        $("#CURRENT_AUCTION_HEAD").val(data.find(e => e.col == "CURRENT_AUCTION_HEAD").val)
        $("#AUCTION_BANNER_URL").attr('src', data.find(e => e.col == "AUCTION_BANNER").val)
        $("#AUCTION_BANNER").val(data.find(e => e.col == "AUCTION_BANNER").val)
        $("#PAST_AUCTION_HEAD").val(data.find(e => e.col == "PAST_AUCTION_HEAD").val)
        $("#UPCOMING_AUCTION_HEAD").val(data.find(e => e.col == "UPCOMING_AUCTION_HEAD").val)


      });
    }

    function upload_func(files) {

      var formData = new FormData();
      formData.append("file", files);
      __ajax_http_upload("upload", formData, [], "POST", "upload", function(res) {
        fileUpload = res.data;
        fileUpload.url = API_URL + fileUpload.filename;

        $("#AUCTION_BANNER_URL").attr('src', fileUpload.url);
        $("#AUCTION_BANNER").val(fileUpload.url);
      });
    }


    document.getElementById("upload").addEventListener("change", function(event) {
      var files = document.getElementById("upload").files;
      if (files.length) {
        upload_func(files[0])
      }

    }, false);

    function __init_call() {
      getData();
    }
  </script>
</body>

</html>