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
    
    <?php $breadcrumbs=['NFT Detail'];$breadcrumbActive="NFT Detail"; require_once(__DIR__.'/../layout/global/breadcrumb.php'); ?>

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
                <h3 class="card-title">NFT Edit</h3>
                <?php }else{ ?>
                <h3 class="card-title">NFT Add</h3>
                <?php } ?>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form onsubmit="return validateData();">
                
                <div class="card-body">

                
                  <div class="form-group">
                    <label for="nftImage">NFT Image</label>
                    <input type="text" class="form-control" id="nftImage" placeholder="Nft Image" required>
                  </div>
                  <div class="form-group">
                    <label for="nftTitle">NFT Title</label>
                    <input type="text" class="form-control" id="nftTitle" placeholder="Nft Title" maxlength="100" required>
                  </div>
                  <div class="form-group">
                    <label for="nftDescription">NFT Description</label>
                    <input type="text" class="form-control" id="nftDescription" placeholder="Nft Description" maxlength="200" required>
                  </div>
                  <div class="form-group">
                    <label for="nftUrl">NFT URL</label>
                    <input type="text" class="form-control" id="nftUrl" placeholder="Nft Url" required>
                  </div>

                  <div class="form-group">
                    <label for="nftPrice">NFT Price (in USD)</label>
                    <input type="text" class="form-control" id="nftPrice" placeholder="Nft Price" pattern="\d*" maxlength="8" required>
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
    
    function callBack_func(res){
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
        __ajax_http("nft/"+pkId,null,[],"GET","nft",function(res){
            
            var data = res.data.fetch;
            $("#nftImage").val(data.nftImage)
            $("#nftTitle").val(data.nftTitle)
            $("#nftDescription").val(data.nftDescription)
            $("#nftUrl").val(data.nftUrl)
            $("#nftPrice").val(data.nftPrice)
            
        });
    }

    function makeData(){

        var pkId = getParameterByName("id");

        var data = {
          nftImage:$("#nftImage").val(),
          nftTitle:$("#nftTitle").val(),
          nftDescription:$("#nftDescription").val(),
          nftUrl:$("#nftUrl").val(),
          nftPrice:$("#nftPrice").val()
        };

        if(pkId){
            data.id=pkId;
            __ajax_http("nft/"+pkId,data,[],"PUT","nft",callBack_func);
        }else{
            __ajax_http("nft",data,[],"POST","nft",callBack_func);
        }

    }

    function __init_call(){
        getData();
    }
</script>

</body>
</html>
