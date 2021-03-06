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

            <?php $breadcrumbs = ['Category'];
            $breadcrumbActive = "Category";
            require_once(__DIR__ . '/../layout/global/breadcrumb.php'); ?>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">


                            <?php
                            $heading = "Order Listing";
                            $dtTagLine = "Atrumart Order Listing";
                            $columns = ["id", "orderId", "user.name", "user.phone", "ship.country", "ship.state", "ship.city", "ship.addressLine1", "createdAt", "total", "grandTotal", "paymentType"];
                            $columnsFace = ["#", "Order Id", "Customer Name", "Customer Phone", "Customer Country", "Customer State", "Customer City", "Customer Address", "Order Date", "Total", "Grand Total", "Payment Type"];
                            $columnsImg = "profilePic";
                            $apiCall = "orders";
                            $tblId = "id";
                            $isTblAdd = false;
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

</body>

</html>