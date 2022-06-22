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

            <?php $breadcrumbs = ['Auction Name'];
            $breadcrumbActive = "User";
            require_once(__DIR__ . '/../layout/global/breadcrumb.php'); ?>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <div class="row">
                                <div class="col-11">

                                </div>

                            </div>

                            <?php
                            $heading = "Auction Name Listing";
                            $dtTagLine = "Atrumart Auction Name Listing";
                            $columns = ["id", "startDate", "expiryDate", "name", "createdAt", "softaction"];
                            $columnsFace = ["#", "Start Date", "Expiry Date", "Auction Name", "Created At", "Action"];
                            $apiCall = "auctionNames?status=1,0";
                            $actionDel = true;
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
        function __status_call(id) {

            __ajax_http("auctionNames/" + id, {
                isUpdate: 1,
                status: 0,
                id: id
            }, [], "PUT", "nft", () => {
                window.location.reload();
            });
        }

        function __status_active_call(id) {

            __ajax_http("auctionNames/" + id, {
                isUpdate: 1,
                status: 1,
                id: id
            }, [], "PUT", "nft", () => {
                window.location.reload();
            });
        }
    </script>

</body>

</html>