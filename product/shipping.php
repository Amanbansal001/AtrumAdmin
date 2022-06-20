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

                <form id="shipping">

                  <div class="card-body">

                    <div class="form-group">
                      <label for="categoryId">Artist Country</label>
                      <input type="text" class="form-control" id="fromCountry" placeholder="Atrist Country" disabled>
                    </div>

                    <div class="form-group">
                      <label for="categoryId">Artist State</label>
                      <input type="text" class="form-control" id="fromState" placeholder="Atrist State" disabled>
                    </div>

                    <div class="form-group">
                      <label for="categoryId">Artist City</label>
                      <input type="text" class="form-control" id="fromCity" placeholder="Atrist City" disabled>
                    </div>


                    <div class="form-group">
                      <label for="country">To Country</label>
                      <!-- <input type="text" class="form-control" id="toCity" placeholder="toCity" required> -->
                      <select id="country" class="form-control" onchange="getState()"></select>
                    </div>

                    <div class="form-group">
                      <label for="state">To State</label>
                      <select id="state" class="form-control" onchange="getCity()"></select>
                    </div>

                    <div class="form-group">
                      <label for="city">To City</label>
                      <select id="city" class="form-control" ></select>
                    </div>

                    <!-- <div class="form-group">
                      <label for="userId">To City</label>
                      <input type="text" class="form-control" id="toCity" placeholder="toCity" required>
                    </div> -->

                    <div class="form-group">
                      <label for="userId">Price</label>
                      <input type="text" class="form-control" id="price" placeholder="price" required>
                    </div>

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
              </div>
              <!-- /.card -->

              <!--/.col (right) -->
            </div>

            <div class="container-fluid">
              <div class="row">
                <div class="col-12">


                  <?php
                  $heading = "Shipping Listing";
                  $dtTagLine = "Atrumart Shipping Listing";
                  $columns = ["id", "fromCity","toCity","price"];
                  $columnsFace = ["id", "From City","To City","Price"];
                  $apiCall = "artworksShipping?productId=".$_GET["id"];
                  $isTblAdd=false;
                  $actionDel=true;
                  require_once(__DIR__ . '/../layout/global/table.php');
                  ?>


                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
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

    $('form#shipping').submit(function(e) {
     
      e.preventDefault();
      // or return false;
      validateDataShipping(e);
    });

    function validateData(e) {
      //e.preventDefault();
      makeData();
      return false;
    }

    function validateDataShipping(e) {
      //e.preventDefault();
      makeDataShipping();
      return false;
    }

    function toProduct(res) {
      
      goto('shipping.php?id='+getParameterByName("id"));
    }

    function getData() {
      var pkId = getParameterByName("id");
      if (pkId == null) {
        return
      }
      __ajax_http("products/" + pkId, null, [], "GET", "product", function(res) {
        var data = res.data.fetch;
      

        $("#fromCountry").val(data.user.country);
        $("#fromCity").val(data.user.city);
        $("#fromState").val(data.user.state);
      });

      __ajax_http("artworksShipping?productId=" + pkId, null, [], "GET", "product", function(res) {

      })
    }

    function makeData() {

      var pkId = getParameterByName("id");

      var data = {
        publishYear: $("#publishYear").val(),
        productName: $("#productName").val(),
        productDescription: $("#productDescription").val(),
        productImage: fileUpload.filename,
        price: $("#price").val(),
        shippingInfo: $("#shippingInfo").val(),
        collection: $("#collection").val(),
        medium: $("#medium").val(),
        signature: $("#signature").val(),
        certificateAuth: $("#certificateAuth").val(),
        frame: $("#frame").val(),
        userId: $("#userId").val(),
        categoryId: $("#categoryId").val(),
        inStock: $("#inStock").val(),

        length: $("#length").val(),
        breadth: $("#breadth").val(),
        height: $("#height").val(),
      };

      if (pkId) {
        data.id = pkId;
        __ajax_http("products/" + pkId, data, [], "PUT", "product", toProduct);
      } else {
        __ajax_http("products", data, [], "POST", "product", toProduct);
      }
      return false;
    }

    function fetchOptions() {
      __ajax_http("users", null, [], "GET", "users", function(res) {
        var data = res.data.fetch;
        var html = "";
        data.forEach((e, idx) => {
          html += "<option value=" + e.id + ">" + e.name + "</option>";
        })

        $("#userId").html(html);
      });
      __ajax_http("categorys", null, [], "GET", "categorys", function(res) {
        var data = res.data.fetch;
        var html = "";
        data.forEach((e, idx) => {
          html += "<option value=" + e.id + ">" + e.categoryName + "</option>";
        })

        $("#categoryId").html(html);
      });

      __ajax_http("country", null, [], "GET", "country", function(res) {
        var data = res.data.fetch;
        var html = "<option>Select</option>";
        data.forEach((e, idx) => {
          html += "<option value=" + e.id + ">" + e.name + "</option>";
        })

        $("#country").html(html);
      });
    }

    function getState(){
      __ajax_http("state?country_id="+document.getElementById("country").value, null, [], "GET", "state", function(res) {
        var data = res.data.fetch;
        var html = "<option>Select</option>";
        data.forEach((e, idx) => {
          html += "<option value=" + e.id + ">" + e.name + "</option>";
        })

        $("#state").html(html);
      });
    }

    function getCity(){
      __ajax_http("city?state_id="+document.getElementById("state").value, null, [], "GET", "city", function(res) {
        var data = res.data.fetch;
        var html = "<option>Select</option>";
        data.forEach((e, idx) => {
          html += "<option value=" + e.name + ">" + e.name + "</option>";
        })

        $("#city").html(html);
      });
    }

    function upload_func(files) {

      var formData = new FormData();
      formData.append("file", files);
      __ajax_http_upload("upload", formData, [], "POST", "upload", function(res) {
        fileUpload = res.data;
        fileUpload.url = API_URL + fileUpload.filename;
        
        $("#url").attr('src', fileUpload.url);
      });
    }

    function makeDataShipping() {

      var pkId = getParameterByName("id");
      let toCity= $("#city").val();
      let check = tableData.find(e=>e.toCity==toCity);
      if(check){alert(`City already mapped`);return;}

      var data = {
        productId: pkId,
        fromCity: $("#fromCity").val(),
        toCity: toCity,
        price:$("#price").val()
      };

      if (pkId) {
        //data.id = pkId;
        __ajax_http("artworksShipping/" + pkId, data, [], "PUT", "product", toProduct);
      } else {
        __ajax_http("artworksShipping", data, [], "POST", "product", toProduct);
      }
      return false;
    }

    // document.getElementById("productImage").addEventListener("change", function(event) {
    //   var files = document.getElementById("productImage").files;
    //   if (files.length) {
    //     upload_func(files[0])
    //   }

    // }, false);


    fetchOptions();
    getData();
  </script>

</body>

</html>