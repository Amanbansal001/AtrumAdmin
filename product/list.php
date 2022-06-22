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

            <?php $breadcrumbs = ['Product'];
            $breadcrumbActive = "Product";
            require_once(__DIR__ . '/../layout/global/breadcrumb.php'); ?>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">


                            <?php
                            $heading = "Product Listing";
                            $dtTagLine = "Atrumart Products Listing";
                            $columns = ["id", "coa", "featured_art", "productName", "user.name", "inStock", "length","height", "categoryId", "publishYear", "productDescription", "productImage", "price", "collection", "medium", "frame", "action"];
                            $columnsFace = ["id", "COA", "Featured", "Product Name", "Artist Name", "In Stock", "Length","Height", "Category Id", "Publish Year", "Product Description", "Product Image", "Price","Collection", "Medium", "Frame", "Action"];
                            $columnsImg = "productImage";
                            $apiCall = "products";
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