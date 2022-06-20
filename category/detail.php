<!DOCTYPE html>
<html lang="en">
<?php require_once(__DIR__.'/../layout/head.php'); ?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php require_once(__DIR__.'/../layout/nav.php'); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php require_once(__DIR__.'/../layout/aside.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <?php $breadcrumbs=['Product Detail'];$breadcrumbActive="Product Detail"; require_once(__DIR__.'/../layout/global/breadcrumb.php'); ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <?php if($_GET && $_GET['id']){ ?>
                <h3 class="card-title">Category Edit</h3>
                <?php }else{ ?>
                <h3 class="card-title">Category Add</h3>
                <?php } ?>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                
                <div class="card-body">

                 
                  
                  <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control" id="categoryName" maxlength="100" placeholder="categoryName" required>
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
  <?php require_once(__DIR__.'/../layout/footer.php'); ?>

  
</div>
<!-- ./wrapper -->
<?php require_once(__DIR__.'/../layout/scripts.php'); ?>

<script>
    function validateData(e){
        makeData();
        return false;
    }

    $('form').submit(function(e) {
      console.log('form')
      e.preventDefault();
      // or return false;
      validateData(e);
    });
    
    function toUser(res){
        console.log(res);
        if(res.code!=200){
        alert(res.errorMessage);
        return;
      }
        goto('list.php');
    }

    function getData(){
        var pkId = getParameterByName("id");
        if(pkId==null){return}
        __ajax_http("categorys/"+pkId,null,[],"GET","product",function(res){
            var data = res.data.fetch;
            $("#categoryName").val(data.categoryName)
            
        });
    }

    function makeData(){

        var pkId = getParameterByName("id");

        var data = {
          categoryName:$("#categoryName").val(),
        };

        if(pkId){
            data.id=pkId;
            data.isUpdate=1;
            __ajax_http("categorys/"+pkId,data,[],"PUT","categorys",toUser);
        }else{
            __ajax_http("categorys",data,[],"POST","categorys",toUser);
        }

    }

    function __init_call(){
        getData();
    }
</script>

</body>
</html>
