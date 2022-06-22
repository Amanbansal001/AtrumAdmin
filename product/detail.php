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
            <div class="col-md-9"></div>
            <div class="col-md-3">
              <?php if ($_GET && $_GET['id']) { ?>
                <a href="shipping.php?id=<?php echo $_GET["id"] ?>" class="btn btn-outline-primary btn-block"><i class="fa fa-plus"></i>&nbsp;&nbsp;Shipping</a>
              <?php } ?>
            </div>
          </div>
          <div class="row mt-4">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <?php if ($_GET && $_GET['id']) { ?>
                    <h3 class="card-title">Product Edit</h3>
                  <?php } else { ?>
                    <h3 class="card-title">Product Add</h3>
                  <?php } ?>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="addEdit">

                  <div class="card-body">

                    <div class="row">
                      <div class="form-group col-md-3">
                        <label for="userId">Artist(s)</label>
                        <select class="form-control" id="userId">

                        </select>
                      </div>

                      <div class="form-group col-md-3">
                        <label for="categoryId">Category</label>
                        <select class="form-control" id="categoryId">

                        </select>
                      </div>


                      <div class="form-group col-md-3">
                        <label for="publishYear">Publish Year</label>
                        <input type="text" class="form-control" id="publishYear" placeholder="Publish Year" maxlength="4">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="productName">Product Name</label>
                        <input type="text" class="form-control" id="productName" placeholder="Product Name" maxlength="100" required>
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-md-3">
                        <label for="productDescription">Product Description</label>
                        <input type="text" class="form-control" id="productDescription" placeholder="Product Description" maxlength="500">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="productImage">Product Image</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="productImage" accept="image/png, image/jpeg" <?php if ($_GET && $_GET['id']) {
                                                                                                                            echo "";
                                                                                                                          } else {
                                                                                                                            echo "required";
                                                                                                                          } ?>>
                            <label class="custom-file-label" for="productImage">Choose file</label>
                          </div>

                        </div>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="price" placeholder="price" pattern="\d*" maxlength="8" required>
                      </div>

                    </div>
                    <div class="row">
                      <div class="form-group col-md-3">
                        <label for="collection">Collection</label>
                        <input type="text" class="form-control" id="collection" placeholder="collection" maxlength="100">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="medium">Medium</label>
                        <input type="text" class="form-control" id="medium" placeholder="medium" maxlength="100" required>
                      </div>

                    </div>
                    <div class="row">

                      <div class="form-group col-md-3">
                        <label for="frame">Frame</label>

                        <select class="form-control" id="frame">
                          <option value="" selected>No Frame</option>
                          <option value="Framed">Framed</option>
                          <option value="Unframed">Unframed</option>
                        </select>
                      </div>

                      <div class="form-group col-md-3">
                        <label for="length">Length(cm)</label>
                        <input type="text" class="form-control" id="length" placeholder="length" maxlength="6" required>
                      </div>



                      <div class="form-group col-md-3">
                        <label for="frame">Height(cm)</label>
                        <input type="text" class="form-control" id="height" placeholder="height" maxlength="6" required>
                      </div>
                    </div>
                    <div class="row">

                      <div class="form-group col-md-3">
                        <label for="weight">Weight</label>
                        <input type="text" class="form-control" id="weight" placeholder="weight" required>
                      </div>

                      <div class="form-group col-md-3">
                        <label for="frame">Google Map</label>
                        <input type="text" class="form-control" id="geoMap" placeholder="geoMap" maxlength="200">
                      </div>


                      <div class="form-group col-md-3">
                        <label for="frame">Orientation</label>

                        <select class="form-control" id="orientation" placeholder="showPrice">
                          <option value="" selected>No Orientation</option>
                          <option value="Landscape">Landscape</option>
                          <option value="Portrait">Portrait</option>
                        </select>
                      </div>


                      <div class="form-group col-md-3">
                        <label for="frame">ShowPrice</label>
                        <select class="form-control" id="showPrice" placeholder="showPrice" required>
                          <option value="1">Yes</option>
                          <option value="0">No</option>
                        </select>
                      </div>

                      <div class="form-group col-md-3">
                        <label for="logistics">Logistics</label>
                        <select class="form-control" id="logistics" placeholder="logistics" required>
                          <option value="CONSTANTINE">CONSTANTINE</option>
                          <option value="DHL">DHL</option>
                        </select>
                      </div>

                    </div>
                    <div class="row">

                      <div class="form-group col-md-3">
                        <label for="frame">Edition</label>
                        <input type="text" class="form-control" id="edition" maxlength="100" placeholder="edition">
                      </div>

                      <div class="form-group col-md-3">
                        <label for="frame">Status</label>
                        <select class="form-control" id="inStock" placeholder="inStock" required>
                          <option value="1">Available</option>
                          <option value="0">Sold</option>

                          <option value="2">Hold</option>
                        </select>
                      </div>

                      <div class="form-group col-md-3">
                        <label for="frame">Date Of Production</label>
                        <input type="date" class="form-control" id="dateOfProduction" placeholder="">
                      </div>


                    </div>

                    <div class="row">

                      <div class="form-group col-md-3">
                        <label for="frame">Active</label>
                        <select class="form-control" id="active" placeholder="active" required>
                          <option value="1">Yes</option>
                          <option value="0">No</option>
                        </select>
                      </div>

                      <div class="form-group col-md-3">
                        <label for="frame">Add to Wonder Room</label>
                        <select class="form-control" id="isWonderRoom" placeholder="isWonderRoom" required>
                          <option value="0" selected>No</option>
                          <option value="1">Yes</option>
                        </select>
                      </div>

                      <div class="form-group col-md-3">
                        <label for="frame">Add to View Room</label>
                        <select class="form-control" id="isViewRoom" placeholder="isViewRoom" required>
                          <option value="0">No</option>
                          <option value="1">Yes</option>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-3">
                        <img src="" id="url" width="100px" accept="image/png, image/jpeg" />
                      </div>
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
    let fileUpload2;

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

    function validateDataShipping(e) {
      //e.preventDefault();
      makeDataShipping();
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
      __ajax_http("products/" + pkId, null, [], "GET", "product", function(res) {
        var data = res.data.fetch;
        $("#publishYear").val(data.publishYear)
        $("#productName").val(data.productName)
        $("#productDescription").val(data.productDescription)
        $("#price").val(data.price)

        $("#medium").val(data.medium)

        $("#certificateAuth").val(data.certificateAuth)
        $("#frame").val(data.frame)
        $("#weight").val(data.weight)

        $("#userId").val(data.userId)
        $("#categoryId").val(data.categoryId)
        $("#inStock").val(data.inStock);
        $("#geoMap").val(data.geoMap);

        $("#length").val(data.length);
        $("#breadth").val(data.breadth);
        $("#height").val(data.height);
        $("#logistics").val(data.logistics);


        $("#orientation").val(data.orientation);
        $("#material").val(data.material);
        $("#showPrice").val(data.showPrice);
        $("#isWonderRoom").val(data.isWonderRoom);
        $("#isViewRoom").val(data.isViewRoom);
        $("#edition").val(data.edition);
        $("#collection").val(data.collection);
        $("#gallery").val(data.gallery);
        $("#active").val(data.active);
        $("#dateOfProduction").val(new Date(data.dateOfProduction).toISOString().substr(0, 10))

        $("#fromCity").val(data.user.country);

        fileUpload = {
          url: data.productImage,
        };

        $("#url").attr('src', data.productImage);

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
        productImage: (fileUpload) ? fileUpload.url : '',
       
        price: $("#price").val(),

        collection: $("#collection").val(),
        medium: $("#medium").val(),
  
        certificateAuth: $("#certificateAuth").val(),
        frame: $("#frame").val(),
        weight: $("#weight").val(),
        userId: $("#userId").val(),
        categoryId: $("#categoryId").val(),
        inStock: $("#inStock").val(),
        geoMap: $("#geoMap").val(),
        logistics: $("#logistics").val(),
        length: $("#length").val(),
        breadth: $("#breadth").val(),
        height: $("#height").val(),


        isWonderRoom: $("#isWonderRoom").val(),
        isViewRoom: $("#isViewRoom").val(),
        orientation: $("#orientation").val(),
        material: $("#material").val(),
        showPrice: $("#showPrice").val(),
        edition: $("#edition").val(),
        isStock: 1,
        dateOfProduction: $("#dateOfProduction").val(),
        gallery: $("#gallery").val(),
        active: $("#active").val()
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
      __ajax_http("users?roleType=Artist", null, [], "GET", "users", function(res) {
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

    function upload_func_sign(files) {

      var formData = new FormData();
      formData.append("file", files);
      __ajax_http_upload("upload", formData, [], "POST", "upload", function(res) {
        fileUpload2 = res.data;
        fileUpload2.signature = API_URL + res.data.filename;


      });
    }

    function makeDataShipping() {

      var pkId = getParameterByName("id");

      var data = {
        productId: pkId,
        fromCity: $("#fromCity").val(),
        toCity: $("#toCity").val(),
      };

      if (pkId) {
        data.id = pkId;
        __ajax_http("artworksShipping/" + pkId, data, [], "PUT", "product", toProduct);
      } else {
        __ajax_http("artworksShipping", data, [], "POST", "product", toProduct);
      }
      return false;
    }

    document.getElementById("productImage").addEventListener("change", function(event) {
      var files = document.getElementById("productImage").files;
      if (files[0].size > 2097152) {
        alert("File is too big!");
        files.value = "";
        return;
      };

      var allowedExtensions =
        /(\.jpg|\.jpeg|\.png|\.gif)$/i;

      if (!allowedExtensions.exec(files[0].name)) {
        alert("File must be image type");
        files.value = "";
        return;
      }
      if (files.length) {
        upload_func(files[0])
      }

    }, false);

    function __init_call() {

      fetchOptions();
      getData();
    }
  </script>

</body>

</html>