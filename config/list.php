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

            <?php $breadcrumbs = ['Banner'];
            $breadcrumbActive = "Banner";
            require_once(__DIR__ . '/../layout/global/breadcrumb.php'); ?>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <form onsubmit="return validateData();">

                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-3 form-group">
                                            <label for="name">Site Logo</label>
                                            <input type="file" class="form-control" id="upload" name="upload" placeholder="SITE_LOGO" accept="image/png, image/jpeg">
                                            <input type="hidden" class="form-control" id="SITE_LOGO" name="SITE_LOGO" placeholder="SITE_LOGO">
                                        </div>
                                        <div class="col-7 form-group"></div>
                                        <div class="col-2 mt-3">
                                            <label for="name"></label>
                                            <div>
                                                <img src="" id="SITE_LOGO_URL" width="100px" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Site Color</label>
                                        <input type="color" class="form-control" id="SITE_COLOR" name="SITE_COLOR" placeholder="SITE_COLOR" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Commission</label>
                                        <input type="text" onkeypress='validateNumber(event)' maxlength="10" class="form-control" id="COMISSION" name="COMISSION" placeholder="COMISSION" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="name">New Arrival</label>
                                        <input type="text" onkeypress='validateNumber(event)' maxlength="10" class="form-control" id="NEW_ARRIVAL" name="NEW_ARRIVAL" placeholder="NEW_ARRIVAL" required>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>

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
        let fileUpload;
        let fetchData;

        function validateData(e) {
            makeData();
            return false;
        }

        function makeData() {
            configUpdate("SITE_COLOR");
            configUpdate("SITE_LOGO");
            configUpdate("COMISSION");
            configUpdate("NEW_ARRIVAL");

        }

        function configUpdate(col) {
            let id = fetchData.find(e => e.col == col).id;
            __ajax_http("config/" + id, {
                val: $("#" + col).val(),
                isUpdate: 1,
                id: id
            }, [], "PUT", "config", function() {

            });
        }

        function getData() {

            __ajax_http("config", null, [], "GET", "config", function(res) {
                var data = res.data.fetch;
                fetchData = data;
                fileUpload = data.find(e => e.col == "SITE_LOGO").val;
                $("#SITE_COLOR").val(data.find(e => e.col == "SITE_COLOR").val)
                $("#SITE_LOGO_URL").attr('src', data.find(e => e.col == "SITE_LOGO").val)
                $("#SITE_LOGO").val(data.find(e => e.col == "SITE_LOGO").val)
                $("#COMISSION").val(data.find(e => e.col == "COMISSION").val)
                $("#NEW_ARRIVAL").val(data.find(e => e.col == "NEW_ARRIVAL").val)


            });
        }

        function upload_func(files) {

            var formData = new FormData();
            formData.append("file", files);
            __ajax_http_upload("upload", formData, [], "POST", "upload", function(res) {
                fileUpload = res.data;
                fileUpload.url = API_URL + fileUpload.filename;

                $("#SITE_LOGO_URL").attr('src', fileUpload.url);
                $("#SITE_LOGO").val(fileUpload.url);
            });
        }


        document.getElementById("upload").addEventListener("change", function(event) {
            var files = document.getElementById("upload").files;
            if (files.length) {
                upload_func(files[0])
            }

        }, false);

        function __init_call() {
            getData();
        }
    </script>
</body>

</html>