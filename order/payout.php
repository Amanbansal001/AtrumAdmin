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

            <?php $breadcrumbs = ['Payout'];
            $breadcrumbActive = "Payout";
            require_once(__DIR__ . '/../layout/global/breadcrumb.php'); ?>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-2">
                            <div class="form-group">
                                <label for="name">From Date</label>
                                <input type="date" class="form-control" id="fromDate" placeholder="fromDate" onchange="usercart()">
                            </div>

                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="name">To Date</label>
                                <input type="date" class="form-control" id="toDate" placeholder="toDate" onchange="usercart()">
                            </div>

                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <label for="userId">Artist(s)</label>
                                <select class="form-control" id="userId" onchange="usercart()">

                                </select>
                            </div>

                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="userId">Order Status</label>
                                <select class="form-control" multiple id="orderStatus" onchange="usercart()">
                                    <option value="">All</option>
                                    <option value="PENDING FOR SHIPPING CHARGES">PENDING FOR SHIPPING CHARGES</option>
                                    <option value="PENDING FOR PAYMENT ABOVE LIMIT">PENDING FOR PAYMENT ABOVE LIMIT</option>
                                    <option value="PENDING FOR PAYMENT">PENDING FOR PAYMENT</option>
                                    <option value="CONFIRMED">CONFIRMED</option>
                                    <option value="ACCEPTED">ACCEPTED</option>
                                    <option value="SHIPPED">SHIPPED</option>
                                    <option value="DELIVERED">DELIVERED</option>
                                </select>
                            </div>

                        </div>
                        <div class="col-2">
                            <label for="userId"></label>
                            <button type="submit" class="btn btn-primary form-control" onclick="handlePaid()">Mark as Paid</button>
                        </div>
                        <div class="col-2">
                            <label for="userId"></label>
                            <button type="submit" class="btn btn-primary form-control" onclick="handleUnPaid()">Mark as Un Paid</button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">


                            <?php
                            $heading = "Payout Listing";
                            $dtTagLine = "Atrumart Payout Listing";
                            $columns = ["nocol", "checkbox", "id", "arts.user.name", "order.orderId", "createdAt", "comission", "arts.productName", "orderStatus", "artistPayment", "qty", "price"];
                            $columnsFace = ["", "", "#", "Artist Name", "Order Id", "Order Date", "Comission", "Product Name", "Order Status", "Payment Status", "Qty", "Price"];
                            $columnsImg = "profilePic";
                            $apiCall = "userCarts";
                            $tblId = "id";
                            $isTblAdd = false;
                            $actionDel = true;
                            require_once(__DIR__ . '/../layout/global/table.php');
                            ?>


                        </div>

                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-9"></div>
                        <div class="col-3">
                            <div class="text-right">Total : USD&nbsp;<label id="totalPayout">0.00</label></div>
                        </div>
                    </div>
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
        var totalPayout = 0;

        function usercart() {
            $('#dataTableEl').DataTable().clear().destroy();

            var data = "createdAtFrom=" + $("#fromDate").val() + "&createdAtTo=" + $("#toDate").val() +
                "&$arts.userId$=" + $("#userId").val() + "&orderStatusIn=" + $("#orderStatus").val();

            __ajax_http("userCarts?" + data, "", [], "GET", "categorys", function(res) {
                makeDt(res);
            });
        }

        function handlePaid() {
            let data = [];

            if (document.querySelectorAll(".checkbox:checked").length == 0) {
                alert(`Select order to continue`);
                return;
            }

            document.querySelectorAll(".checkbox").forEach((e, idx) => {
                if (e.checked) {
                    data.push({
                        isUpdate: 1,
                        id: tableData[idx].id,
                        artistPayment: 'PAID'
                    });
                }
            })

            __ajax_http("userCarts/" + data[0].id, data, [], "PUT", "userCarts", function(res) {
                location.reload();
            });

        }

        function handleUnPaid() {
            let data = [];

            if (document.querySelectorAll(".checkbox:checked").length == 0) {
                alert(`Select order to continue`);
                return;
            }

            document.querySelectorAll(".checkbox").forEach((e, idx) => {
                if (e.checked) {
                    data.push({
                        isUpdate: 1,
                        id: tableData[idx].id,
                        artistPayment: 'UNPAID'
                    });
                }
            })

            __ajax_http("userCarts/" + data[0].id, data, [], "PUT", "userCarts", function(res) {
                location.reload();
            });

        }

        __ajax_http("users", null, [], "GET", "users", function(res) {
            var data = res.data.fetch;
            var html = '<option value="">All</option>';
            data.forEach((e, idx) => {
                html += "<option value=" + e.id + ">" + e.name + "</option>";
            })

            $("#userId").html(html);
        });


        function handleCheckbox() {
            totalPayout = 0;
            document.querySelectorAll(".checkbox").forEach((e, idx) => {
                if (e.checked) {

                    var comission = _.get(tableData[idx], "comission");
                    var price = _.get(tableData[idx], "price");
                    var qty = _.get(tableData[idx], "qty");
                    var grandTotal = price * qty;
                    var commisisonToArtist = (grandTotal * comission) / 100;
                    totalPayout += parseFloat(commisisonToArtist);
                }
            });

            $("#totalPayout").html(totalPayout);
        }
    </script>
</body>

</html>