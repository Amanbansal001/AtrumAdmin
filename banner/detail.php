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
                    <h3 class="card-title">Banner Edit</h3>
                  <?php } else { ?>
                    <h3 class="card-title">Banner Add</h3>
                  <?php } ?>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form onsubmit="return validateData();">

                  <div class="card-body">



                    <div class="form-group">
                      <label for="name">Banner File</label>
                      <input type="file" class="form-control" id="upload" name="upload" placeholder="Banner Url" required>
                    </div>
                   
                    <div class="form-group">
                      <label for="name">Text</label>
                      <input type="text" class="form-control" id="text" name="text" maxlength="100" placeholder="Banner Text" required>
                    </div>

                    <div class="form-group">
                      <label for="heading">Heading</label>
                      <input type="text" class="form-control" id="heading" name="heading" maxlength="100" placeholder="Banner Heading" required>
                    </div>

                    <div class="form-group col-md-3">
                      <label for="frame">Platform</label>
                      <select class="form-control" id="type" placeholder="type" required>
                        <option value="WEB">WEB</option>
                        <option value="MOBILE">MOBILE</option>
                      </select>
                    </div>


                    <div class="form-group">
                      <img src="" id="url" width="100px"/>
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
      console.log(res);
      if(res.code!=200){
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
      __ajax_http("banner/" + pkId, null, [], "GET", "product", function(res) {
        var data = res.data.fetch;
        $("#text").val(data.text)
        $("#heading").val(data.heading)
        $("#type").val(data.type)
        fileUpload = {filename : data.url};
      });
    }

    function makeData() {

      var pkId = getParameterByName("id");

      var data = {
        url: fileUpload.filename,
        text:$("#text").val(),
        heading:$("#heading").val(),
        type:$("#type").val()
      };

      if (pkId) {
        data.id = pkId;
        __ajax_http("banner/" + pkId, data, [], "PUT", "categorys", toUser);
      } else {
        __ajax_http("banner", data, [], "POST", "categorys", toUser);
      }

    }

    function upload_func(files) {
      
      var formData = new FormData();
      formData.append("file", files);
      __ajax_http_upload("upload", formData, [], "POST", "upload", function(res) {
        fileUpload = res.data;
        fileUpload.url = API_URL+fileUpload.filename;
        console.log(fileUpload);
        $("#url").attr('src',fileUpload.url);
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