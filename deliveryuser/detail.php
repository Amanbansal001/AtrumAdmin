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
                                        <h3 class="card-title">Delivery User Edit</h3>
                                    <?php } else { ?>
                                        <h3 class="card-title">Delivery User Add</h3>
                                    <?php } ?>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form onsubmit="return validateData();">

                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="roleType">Role Type</label>
                                            <select class="form-control" id="roleType">
                                                <option value="Delivery" selected>Delivery</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" placeholder="name" maxlength="100" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" placeholder="email" maxlength="200" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="name">Password</label>
                                            <input type="text" class="form-control" id="password" maxlength="100" placeholder="password">
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
            __ajax_http("users/" + pkId, null, [], "GET", "product", function(res) {
                var data = res.data.fetch;
                $("#roleType").val(data.roleType)
                $("#name").val(data.name)
                $("#country").val(data.country)
                $("#bio").val(data.bio)
                $("#email").val(data.email)

                $("#countryCode").val(data.countryCode)
                $("#phone").val(data.phone)
                $("#commission").val(data.comission)
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
                country: $("#country").val(),
                bio: $("#bio").val(),
                email: $("#email").val(),

                countryCode: $("#countryCode").val(),
                phone: $("#phone").val(),
                comission: $("#commission").val(),
                password: $("#password").val(),
            };

            if (pkId) {
                data.id = pkId;
                __ajax_http("users/" + pkId, data, [], "PUT", "users", toUser);
            } else {
                __ajax_http("users", data, [], "POST", "users", toUser);
            }

        }

        function __init_call() {
            getData();
        }
    </script>

</body>

</html>