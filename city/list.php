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

            <?php $breadcrumbs = ['World'];
            $breadcrumbActive = "World";
            require_once(__DIR__ . '/../layout/global/breadcrumb.php'); ?>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">


                            <?php
                            $heading = "World Listing";
                            $dtTagLine = "Atrumart World Listing";
                            $columns = ["id", "name", "state_id", "createdAt", "action"];
                            $columnsFace = ["id", "name", "state_id", "createdAt", "action"];
                            $columnsImg = "url";
                            $apiCall = ($_GET && $_GET['id']) ? "city?id=" . $_GET['id'] : "city/0";
                            $isTblAdd = true;
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