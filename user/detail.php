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
                    <h3 class="card-title">User Edit</h3>
                  <?php } else { ?>
                    <h3 class="card-title">User Add</h3>
                  <?php } ?>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form>

                  <div class="card-body">

                    <div class="form-group">
                      <label for="roleType">Role Type</label>
                      <select class="form-control" id="roleType" onchange="handleRoletype()">
                        <option value="Artist">Artist</option>
                        <option value="User">User</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="profilePic">User Image</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="profilePic" accept="image/png, image/jpeg" <?php if ($_GET && $_GET['id']) {
                                                                                                                        echo "";
                                                                                                                      } else {
                                                                                                                        echo "required";
                                                                                                                      } ?>>
                          <label class="custom-file-label" for="profilePic">Choose file</label>
                        </div>
                        <!-- <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div> -->
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" maxlength="100" placeholder="name" required>
                    </div>

                    <div class="form-group">
                      <label for="nationality">Nationality</label>
                      <!-- <input type="text" class="form-control" id="country" placeholder="country" required> -->
                      <select id="nationality" class="form-control" required></select>
                      <!-- <select class="form-control" id="country">
                        
                      </select> -->
                    </div>

                    <div class="form-group">
                      <label for="country">Country</label>
                      <!-- <input type="text" class="form-control" id="country" placeholder="country" required> -->
                      <select id="country" class="form-control" onchange="getState()" required></select>
                      <!-- <select class="form-control" id="country">
                        
                      </select> -->
                    </div>
                    <div class="form-group">
                      <label for="state">State</label>
                      <!-- <input type="text" class="form-control" id="state" placeholder="state" required> -->
                      <select id="state" class="form-control" onchange="getCity()" required></select>
                      <!-- <select class="form-control" id="state">
                        
                      </select> -->
                    </div>
                    <div class="form-group">
                      <label for="city">City</label>
                      <!-- <input type="text" class="form-control" id="city" placeholder="city" required> -->
                      <select id="city" class="form-control" required></select>
                      <!-- <select class="form-control" id="city">
                        
                      </select> -->
                    </div>
                    <div class="form-group">
                      <label for="bio">Zip Code</label>
                      <input type="text" class="form-control" id="zipCode" placeholder="zipCode" pattern="\d*" maxlength="6" required>
                    </div>
                    <div class="form-group">
                      <label for="address">Address</label>
                      <input type="text" class="form-control" id="address" placeholder="address" maxlength="100" required>
                    </div>
                    <div class="form-group">
                      <label for="bio">Bio</label>
                      <input type="text" class="form-control" id="bio" placeholder="bio" maxlength="1000" required>
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" placeholder="email" maxlength="200" required>
                    </div>
                    <div class="form-group">
                      <label for="countryCode">Country Code</label>
                      <input type="text" class="form-control" id="countryCode" placeholder="countryCode" pattern="\d*" maxlength="4" required>
                    </div>
                    <div class="form-group">
                      <label for="phone">Phone</label>
                      <input type="text" class="form-control" id="phone" placeholder="phone" pattern="\d*" maxlength="10" required>
                    </div>

                    <div class="form-group artist">
                      <label for="phone">Commission</label>
                      <input type="text" class="form-control" id="commission" placeholder="commission" maxlength="10" pattern="\d*">
                    </div>

                    <div class="form-group">
                      <label for="name">Password</label>
                      <input type="text" class="form-control" id="password" placeholder="password">
                    </div>

                    <!-- <div class="form-group col-md-3">
                        <label for="signature">Signature</label>
                        <input type="text" class="form-control" id="signature" placeholder="signature" required>
                      </div> -->
                    <div class="form-group col-md-12 artist">
                      <label for="signature">Signature</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="signature" accept="image/png, image/jpeg" <?php if ($_GET && $_GET['id']) {
                                                                                                                        echo "";
                                                                                                                      } else {
                                                                                                                        echo "required";
                                                                                                                      } ?>>
                          <label class="custom-file-label" for="signature">Choose file</label>
                        </div>

                      </div>
                    </div>

                    <div class="form-group col-md-3">
                      <label for="frame">Add to Wonder Room</label>
                      <select class="form-control" id="isWonderRoom" placeholder="isWonderRoom" required>
                        <option value="0" selected>No</option>
                        <option value="1">Yes</option>
                      </select>
                    </div>

                    <div class="form-group col-md-3">
                      <label for="frame">Active</label>
                      <select class="form-control" id="status" placeholder="status" required>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                      </select>
                    </div>

                  </div>


                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>

              <h5 class="mt-4 mb-2">
                Address Book
              </h5>
              <div class="row" id="addressBook">

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

    function validateData(e) {
      e.preventDefault();
      makeData();
      debugger;
      return false;
    }

    $("form").submit(function(e) {
      makeData();
      return false;
    });

    function toUser(res) {
      // alert(JSON.stringify(res));
      // console.log(res);
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
      __ajax_http("users/" + pkId, null, [], "GET", "product", function(res) {
        var data = res.data.fetch;
        $("#roleType").val(data.roleType)
        $("#name").val(data.name)
        //$("#country :selected").text(data.country)
        $("#bio").val(data.bio)
        $("#email").val(data.email)
        //$("#profilePic").val(data.profilePic)
        $("#countryCode").val(data.countryCode)
        $("#phone").val(data.phone)
        $("#commission").val(data.comission)
        //$("#signature").val(data.signature)
        // $("#city :selected").text(data.city)
        // $("#state :selected").text(data.state)
        $("#zipCode").val(data.zipCode)
        $("#address").val(data.address)
        $("#status").val(data.status)
        $("#isWonderRoom").val(data.isWonderRoom);
        $("#country :selected").text(data.country);
         $("#nationality :selected").text(data.nationality);
        //$("#country").html("<option value='"+data.country+"'>"+data.country+"</option>")
        $("#city").html("<option value='" + data.city + "'>" + data.city + "</option>")
        $("#state").html("<option value='" + data.state + "'>" + data.state + "</option>")

        fileUpload = {
          url: data.profilePic
        };
      });

      __ajax_http("orderAddresses?userId=" + pkId, null, [], "GET", "orderAddresses", function(res) {
        var html = "";

        res.data.fetch.forEach((e) => {
          html += '<div class="col-md-3 col-sm-6 col-12">' +
            '<div class="info-box bg-gradient-info">' +
            ' <span class="info-box-icon"><i class="far fa-envelope"></i></span>' +
            '<div class="info-box-content">' +
            ' <span class="info-box-text">' + e.name + '</span>' +
            '<span class="info-box-number">' + e.shippingType + '</span>' +
            '<span class="progress-description">' +
            e.addressLine1 + " " + e.addressLine2 + " " + e.city + " " + e.state + " " + e.country + " " + e.zipCode + " " +
            +' </span>' +
            ' </div>' +
            ' </div>' +
            '</div>';

          $("#addressBook").html(html);
        })
      })
    }

    function makeData() {

      var pkId = getParameterByName("id");

      var data = {
        roleType: $("#roleType").val(),
        name: $("#name").val(),
        country: $("#country :selected").text(),
        bio: $("#bio").val(),
        email: $("#email").val(),
        profilePic: (fileUpload) ? fileUpload.url : '',
        countryCode: $("#countryCode").val(),
        phone: $("#phone").val(),
        comission: $("#commission").val(),
        password: $("#password").val(),
        city: $("#city :selected").text(),
        state: $("#state :selected").text(),
        zipCode: $("#zipCode").val(),
        address: $("#address").val(),
        status: $("#status").val(),
        isWonderRoom: $("#isWonderRoom").val(),
        nationality: $("#nationality :selected").text(),
        signature: (fileUpload2) ? fileUpload2.signature : '',
      };

      if (pkId) {
        data.id = pkId;
        __ajax_http("users/" + pkId, data, [], "PUT", "users", toUser);
      } else {
        __ajax_http("users", data, [], "POST", "users", toUser);
      }
      return false;
    }

    function upload_func(files) {

      var formData = new FormData();
      formData.append("file", files);
      __ajax_http_upload("upload", formData, [], "POST", "upload", function(res) {
        fileUpload = res.data;
        fileUpload.url = API_URL + fileUpload.filename;
        console.log(fileUpload);
        //$("#url").attr('src', fileUpload.url);
      });
    }

    function upload_func_sign(files) {

      var formData = new FormData();
      formData.append("file", files);
      __ajax_http_upload("upload", formData, [], "POST", "upload", function(res) {
        fileUpload2 = res.data;
        fileUpload2.signature = API_URL + res.data.filename;
        console.log(fileUpload2);

      });
    }

    document.getElementById("profilePic").addEventListener("change", function(event) {


      var files = document.getElementById("profilePic").files;
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

    document.getElementById("signature").addEventListener("change", function(event) {


      var files = document.getElementById("signature").files;
      if (files[0].size > 2097152) {
        alert("File is too big!");
        files.value = "";
      };

      var allowedExtensions =
        /(\.jpg|\.jpeg|\.png|\.gif)$/i;
      if (!allowedExtensions.exec(files[0].name)) {
        alert("File must be image type");
        files.value = "";
      }
      if (files.length) {
        upload_func_sign(files[0])
      }

    }, false);

    function country() {
      __ajax_http("country", null, [], "GET", "country", function(res) {
        var data = res.data.fetch;
        var html = "<option selected disabled value=''>Select</option>";
        data.forEach((e, idx) => {
          html += "<option value=" + e.id + ">" + e.name + "</option>";
        })

        $("#country").html(html);
        $("#nationality").html(html);
        getData();
      });
    }

    function getState() {
      __ajax_http("state?country_id=" + document.getElementById("country").value, null, [], "GET", "state", function(res) {
        var data = res.data.fetch;
        var html = "<option selected disabled value=''>Select</option>";
        data.forEach((e, idx) => {
          html += "<option value=" + e.id + ">" + e.name + "</option>";
        })

        $("#state").html(html);
      });
    }

    function getCity() {
      __ajax_http("city?state_id=" + document.getElementById("state").value, null, [], "GET", "city", function(res) {
        var data = res.data.fetch;
        var html = "<option selected disabled value=''>Select</option>";
        data.forEach((e, idx) => {
          html += "<option value=" + e.name + ">" + e.name + "</option>";
        })

        $("#city").html(html);
      });
    }

    function __init_call() {
      country();
    }

    function handleRoletype() {
      const rt = $("#roleType").val();
      if (rt == "User" || rt == "USER") {
        $('.artist').addClass('hide');
      } else {
        $('.artist').removeClass('hide');
      }
    }
  </script>

</body>

</html>