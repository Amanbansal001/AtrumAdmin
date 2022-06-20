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

      <?php $breadcrumbs = ['Content Detail'];
      $breadcrumbActive = "Content Detail";
      require_once(__DIR__ . '/../layout/global/breadcrumb.php'); ?>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">

          <div class="row mt-4">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <?php if ($_GET && $_GET['id']) { ?>
                    <h3 class="card-title">Content Edit</h3>
                  <?php } else { ?>
                    <h3 class="card-title">Content Add</h3>
                  <?php } ?>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="addEdit">

                  <div class="card-body">


                    <div class="form-group">
                      <label for="content">Content</label>
                      <textarea name="editor1" class="form-control" id="content" placeholder="content" rows="15" required>
                      </textarea>
                    </div>


                    <!-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div> -->
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

    $('form#addEdit').submit(function(e) {

      e.preventDefault();
      // or return false;
      validateData(e);
    });

    function validateData(e) {
      //e.preventDefault();
      makeData();
      return false;
    }

    function toProduct(res) {

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
      __ajax_http("content/" + pkId, null, [], "GET", "auction", function(res) {
        $("#content").val(res.data.fetch.content);

        CKEDITOR.replace('editor1');
      });

    }

    function makeData() {

      var pkId = getParameterByName("id");

      var data = {
        content: CKEDITOR.instances.content.getData(),
        _content: Date.now(),
      };

      if (pkId) {
        data.id = pkId;
        data.isUpdate = 1;
        __ajax_http("content/" + pkId, data, [], "PUT", "content", toProduct);
      } else {
        __ajax_http("content", data, [], "POST", "content", toProduct);
      }
      return false;
    }

    function __init_call() {
      getData();
    }
  </script>
  <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
</body>

</html>