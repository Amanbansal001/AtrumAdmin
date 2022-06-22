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

                    <div class="row mt-4">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <?php if ($_GET && $_GET['id']) { ?>
                                        <h3 class="card-title">Auction Edit</h3>
                                    <?php } else { ?>
                                        <h3 class="card-title">Auction Add</h3>
                                    <?php } ?>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form id="addEdit">

                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="auctionId">Auction Name</label>
                                            <select class="form-control" id="auctionId">

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="userId">Artwork</label>
                                            <select class="form-control" id="productId">

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="price">Starting Bid Price</label>
                                            <input type="text" class="form-control" id="price" placeholder="Price" onkeypress='validateNumber(event)' maxlength="8" required>
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
            __ajax_http("auction/" + pkId, null, [], "GET", "auction", function(res) {
                $("#productId").val(res.data.fetch.productId)
                $("#price").val(res.data.fetch.price);
                $("#auctionNameId").val(res.data.fetch.auctionNameId);
            });

        }

        function makeData() {

            var pkId = getParameterByName("id");

            var data = {
                productId: $("#productId").val(),
                auctionNameId: $("#auctionId").val(),
                price: $("#price").val()

            };

            if (pkId) {
                data.id = pkId;
                data.isUpdate = 1;
                __ajax_http("auction/" + pkId, data, [], "PUT", "auction", toProduct);
            } else {
                __ajax_http("auction", data, [], "POST", "auction", toProduct);
            }
            return false;
        }

        function fetchOptions() {
            __ajax_http("products?active=1", null, [], "GET", "products", function(res) {
                var data = res.data.fetch;
                var html = "";
                data.forEach((e, idx) => {
                    html += "<option value=" + e.id + ">" + e.productName + " by " + _.get(e, "user.name") + "(@" + e.price + ") </option>";
                })

                $("#productId").html(html);
            });

            __ajax_http("auctionNames", null, [], "GET", "auctionNames", function(res) {
                var data = res.data.fetch;
                var html = "";
                data.forEach((e, idx) => {
                    html += "<option value=" + e.id + ">" + e.name + " </option>";
                })

                $("#auctionId").html(html);
            });

        }

        function __init_call() {

            fetchOptions();
            getData();
        }
    </script>

</body>

</html>