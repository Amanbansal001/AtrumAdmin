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

            <?php $breadcrumbs = ['User'];
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
                                <div class="col-1">
                                    <label>NFT Wallet</label>
                                    <div>
                                        <label>On</label>
                                        <input type="radio" id="nft_wallet_on" name="nft_wallet" value="1" onchange="updateConfig('NFT_WALLET',1)" />
                                        <label>Off</label>
                                        <input type="radio" id="nft_wallet_off" name="nft_wallet" value="0" onchange="updateConfig('NFT_WALLET',0)" />
                                    </div>
                                </div>
                            </div>

                            <?php
                            $heading = "NFT Listing";
                            $dtTagLine = "Atrumart NFT Listing";
                            $columns = ["id", "nftImage", "nftTitle", "nftDescription", "nftUrl", "nftPrice", "createdAt", "action"];
                            $columnsFace = ["#", "Nft Image", "Nft Title", "Nft Description", "Nft Url", "Nft Price", "Created At", "Action"];
                            $columnsImg = "nftImage";
                            $apiCall = "nft";
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
        let nftWallet;

        function config() {
            __ajax_http("config", "", [], "GET", "nft", callBack_func)
        }

        function callBack_func(res) {
            nftWallet = res.data.fetch.find(e => e.col === "NFT_WALLET");
            if (nftWallet) {
                if (nftWallet.val == 1) {
                    document.getElementById("nft_wallet_on").checked = true;
                } else {
                    document.getElementById("nft_wallet_off").checked = true;
                }
            } else {
                document.getElementById("nft_wallet_off").checked = true;
            }
        }

        function updateConfig(col, val) {
            __ajax_http("config", {
                isUpdate: 1,
                col: col,
                val: val,
                id: nftWallet.id
            }, [], "POST", "nft", () => {
                __init_call();
            })
        }

        config();
    </script>

</body>

</html>