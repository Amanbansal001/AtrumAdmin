<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Atrumart | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="./assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="divLoader-post" id="postLoader">
    <svg class="svgLoader" viewBox="0 0 100 100" width="10em" height="10em">
        <path ng-attr-d="{{config.pathCmd}}" ng-attr-fill="{{config.color}}" stroke="none"
            d="M10 50A40 40 0 0 0 90 50A40 42 0 0 1 10 50" fill="#51CACC" transform="rotate(179.719 50 51)">
            <animateTransform attributeName="transform" type="rotate" calcMode="linear" values="0 50 51;360 50 51"
                keyTimes="0;1" dur="1s" begin="0s" repeatCount="indefinite"></animateTransform>
        </path>
    </svg>
</div>
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Atrumart</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form onsubmit="return validateData();">
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="email" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->

    
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<script src="/assets/dist/js/api.js"></script>
<!-- jQuery -->
<script src="./assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="./assets/dist/js/adminlte.min.js"></script>
</body>
<script>

    localStorage.clear();
    function validateData(){
       
        login();
        return false;
    }

    function login(){
         __ajax_http("auth/admin/login",{email:$("#email").val(),password:$("#password").val()},[],"POST","auth",function(res){
            if(res.errorMessage){
                alert(res.errorMessage);
                return false;
            }
            localStorage.setItem("access_token",res.data.auth.token);
            localStorage.setItem("profile",JSON.stringify(res.data.auth));

            if(res.data.auth.roleType=="Delivery"){
                window.location.href="/orders/list.php";
            }else if(res.data.auth.roleType=="Admin"){
              window.location.href="/user/list.php";
            }else{
              localStorage.clear();
              window.location.href="/";
            }
            //window.location.href="/user/list.php";
        },err=>{
          localStorage.clear();
          window.location.href="/";
        });
    }
</script>
</html>
