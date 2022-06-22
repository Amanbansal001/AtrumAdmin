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

            <?php $breadcrumbs = ['Bid'];
            $breadcrumbActive = "Bid";
            require_once(__DIR__ . '/../layout/global/breadcrumb.php'); ?>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-2">
                            <div class="form-group">
                                <label for="userId">Auction Name</label>
                                <select class="form-control" id="auctionId" onchange="getbyAuction()">

                                </select>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">


                            <?php
                            $heading = "Bid Listing";
                            $dtTagLine = "Atrumart Bid Listing";
                            $columns = ["id", "auction.auctionName.name", "name", "country", "city", "state", "bidPrice", "bidStatus", "bidaction", "arts.productName", "arts.productImage"];
                            $columnsFace = ["#", "Auction Name", "Customer Name", "Country", "City", "State", "Bid Price", "Bid Status", "Action", "Product Name", "Product Image"];
                            $columnsImg = "arts.productImage";
                            $apiCall = "productBids";
                            $actionDel = 1;
                            $tblId = "0";
                            require_once(__DIR__ . '/../layout/global/table.php');
                            ?>


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
        function __win_call(id) {

            __ajax_http("productBids/" + id, {
                bidStatus: 'Win',
                id: id
            }, [], "PUT", "productBids", (res) => {
                if (res.code != 200) {
                    alert(res.errorMessage);
                    return;
                } else {
                    window.location.reload();
                }

            }, err => {
                alert(err);
            });
        }

        function getbyAuction() {
            $('#dataTableEl').DataTable().clear().destroy();
            __ajax_http("<?php echo $apiCall; ?>?auctionId=" + $("#auctionId").val(), null, [], "GET", "<?php echo $apiCall; ?>", makeDt);
        }

        __ajax_http("auctionNames", null, [], "GET", "auctionNames", function(res) {
            var data = res.data.fetch;
            var html = "<option value=''>All</option>";
            data.forEach((e, idx) => {
                html += "<option value=" + e.id + ">" + e.name + " </option>";
            })

            $("#auctionId").html(html);
        });
    </script>
</body>

</html>