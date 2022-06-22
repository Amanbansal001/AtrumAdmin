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
                            $heading = "Order Detail Listing";
                            $dtTagLine = "Atrumart Order Detail Listing";
                            $columns = [
                                "orderId", "labelId", "arts.logistics", "url", "arts.productImage", "arts.productName", "price", "qty", "user.name", "user.phone",
                                "order.ship.country", "order.ship.state", "order.ship.city", "order.ship.zipCode", "order.ship.addressLine1", "order.ship.addressLine2",
                                "arts.user.country", "arts.user.state", "arts.user.city", "arts.user.zipCode", "arts.user.address",
                                "vat",
                                "shippingAmount", "orderStatus", "order.trackingId", "estimatedPickupDate", "estimatedDeliveryDate", "pickUpDate", "deliveryDate",
                                "arts.publishYear", "arts.edition", "arts.productDescription", "arts.frame", "arts.orientation", "arts.material", "arts.collection", "arts.medium",
                                "arts.length", "arts.breadth", "arts.height",
                                "createdAt"
                            ];
                            $columnsFace = [
                                "Order Id", "Shipping Label", "Logistics", "Download Invoice", "ProductImage", "Product Name", "Price", "Product Qty", "Purchased By", "Customer Phone",
                                "Shipping Country", "Shipping State", "Shipping City", "Shipping ZipCode", "Shipping Address", "Shipping Address Line 2",
                                "Pickup Country", "Pickup State", "Pickup City", "Pickup ZipCode", "Pickup Address",
                                "Vat",
                                "Shipping Amount", "Order Status", "Tracking Id", "Estimate Pick Up Date", "Estimate Delivery Date", "Actual PickUp Date", "Delivery Date",
                                "Publish Year", "Edition", "Product Description", "Frame", "Orientation", "Material", "Collection", "Medium",
                                "Length", "Breadth", "Height",
                                "Created At"
                            ];
                            $columnsImg = "arts.productImage";
                            $apiCall = "userCarts?orderId=" . $_GET['id'];
                            $isTblAdd = false;
                            $actionDel = true;
                            $updateShippingAmount = "1";
                            require_once(__DIR__ . '/../layout/global/table-order.php');
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
        let nocall = false;

        const statuses = {
            "PENDING FOR SHIPPING CHARGES": "1",
            "PENDING FOR PAYMENT": "2",
            "CONFIRMED": "3",
            "ACCEPTED": "4",
            "SHIPPED": "5",
            "DELIVERED": "6",
            "PENDING FOR PAYMENT ABOVE LIMIT": 7
        }

        function orderStatus() {
            var data = [];
            let orderStatus = $("#orderStatus").val();
            let trackingId = $("#trackingId").val();

            tableData.forEach((e, idx) => {
                let temp = {
                    id: e.id,

                };

                if (orderStatus) {
                    temp.orderStatus = orderStatus;
                }

                if (trackingId) {
                    temp.trackingId = trackingId;
                }


                data.push(temp)
            });

            __ajax_http("userCarts/0", data, [], "PUT", "userCarts", function() {
                window.location.reload();
            });
        }

        function updateShipping() {
            nocall = false;
            var data = [];

            tableData.forEach((e, idx) => {

                let shippingAmount = $(".dtr-details #shippingAmount" + idx).val();
                let deliveryDate = $(".dtr-details #deliveryDate" + idx).val();
                let pickUpDate = $(".dtr-details #pickUpDate" + idx).val();
                let estimatedPickupDate = $(".dtr-details #estimatedPickupDate" + idx).val();
                let estimatedDeliveryDate = $(".dtr-details #estimatedDeliveryDate" + idx).val();
                let orderStatus = $(".dtr-details #orderStatus" + idx).val();
                let trackingId = $(".dtr-details #trackingId" + idx).val();

                let temp = {
                    id: e.id,
                    orderStatus: e.orderStatus
                };


                if (shippingAmount) {
                    temp.shippingAmount = shippingAmount;
                    temp.orderStatus = `PENDING FOR PAYMENT`;
                }

                if (estimatedPickupDate) {
                    if (!deliveryDate) {
                        temp.orderStatus = `ACCEPTED`;
                        temp.estimatedPickupDate = estimatedPickupDate;
                    }
                }

                if (estimatedDeliveryDate) {
                    if (!deliveryDate) {
                        temp.orderStatus = `ACCEPTED`;
                        temp.estimatedDeliveryDate = estimatedDeliveryDate;
                    }
                }

                if (pickUpDate) {

                    temp.orderStatus = `SHIPPED`;
                    temp.pickUpDate = pickUpDate;
                }
                if (deliveryDate) {
                    temp.orderStatus = `DELIVERED`;
                    temp.deliveryDate = deliveryDate;
                }

                // NO payment
                if (statuses[temp.orderStatus] > 3 && temp.orderStatus == orderStatus) {
                    if (statuses[e.orderStatus] < 3) {
                        nocall = true;
                        alert(`Customer payment is pending`);
                        return;
                    }
                }

                //
                if (statuses[temp.orderStatus] == 4 && temp.orderStatus == orderStatus) {
                    if (statuses[e.orderStatus] < 3) {
                        nocall = true;
                        alert(`Customer payment is pending`);
                        return;
                    }
                }

                if (statuses[temp.orderStatus] == 5 && temp.orderStatus == orderStatus) {
                    if (statuses[e.orderStatus] < 4) {
                        nocall = true;
                        alert(`Estimated Pickup and Delivery date is pending`);
                        return;
                    }
                }

                if (statuses[temp.orderStatus] == 6 && temp.orderStatus == orderStatus) {
                    if (statuses[e.orderStatus] < 5) {
                        nocall = true;
                        alert(`Actual pickup date is pending`);
                        return;
                    }
                }

                // if(temp.orderStatus!=e.orderStatus){
                //   temp = {
                //     id:e.id,
                //     orderStatus:orderStatus,
                //     trackingId:trackingId,
                //   };
                // }

                data.push(temp)
            })

            if (nocall) {
                return;
            }

            __ajax_http("userCarts/0", data, [], "PUT", "users", function() {
                window.location.reload();
            });
        }
    </script>

</body>

</html>