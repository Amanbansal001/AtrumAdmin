<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="/assets/dist/css/adminlte.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css'>
<style>
  body:not(.layout-fixed) .main-sidebar {
    height: 1400px !important;
  }

  .svgLoader {
    animation: spin 0.5s linear infinite;
    margin: auto;
  }

  .divLoader {
    width: 100vw;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    z-index: 9999999;
    overflow: hidden;
  }

  .divLoader-post {
    width: 100vw;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    z-index: 9999999;
    overflow: hidden;
  }

  #dataTableEl td {
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
    max-width: 200px;
  }

  .hide {
    display: none !important;
  }

  .chat-body .container {
    margin: -20px auto;
    background: #fff;
    padding: 0;
    border-radius: 7px;
    max-width: 1206px;

  }

  .profile-image {
    width: 50px;
    height: 50px;
    border-radius: 40px;
  }

  .settings-tray {
    background: #eee;
    padding: 10px 15px;
    border-radius: 7px;
  }

  .settings-tray .no-gutters {
    padding: 0;
  }

  .settings-tray--right {
    float: right;
  }

  .settings-tray--right i {
    margin-top: 10px;
    font-size: 25px;
    color: grey;
    margin-left: 14px;
    transition: 0.3s;
  }

  .settings-tray--right i:hover {
    color: #74b9ff;
    cursor: pointer;
  }

  .search-box {
    background: #fafafa;
    padding: 10px 13px;
  }

  .search-box .input-wrapper {
    background: #fff;
    border-radius: 40px;
  }

  .search-box .input-wrapper i {
    color: grey;
    margin-left: 7px;
    vertical-align: middle;
  }

  input {
    border: none;
    border-radius: 30px;
    width: 80%;
  }

  .chat-body input::placeholder {
    color: #e3e3e3;
    font-weight: 300;
    margin-left: 20px;
  }

  .chat-body input:focus {
    outline: none;
  }

  .friend-drawer {
    padding: 10px 15px;
    display: flex;
    vertical-align: baseline;
    background: #fff;
    transition: 0.3s ease;
  }

  .friend-drawer--grey {
    background: #eee;
  }

  .friend-drawer .text {
    margin-left: 12px;
    width: 60%;
  }

  .friend-drawer .text h6 {
    margin-top: 6px;
    margin-bottom: 0;
  }

  .friend-drawer .text p {
    margin: 0;
  }

  .friend-drawer .time {
    color: grey;
  }

  .friend-drawer--onhover:hover {
    background: #74b9ff;
    cursor: pointer;
  }

  .friend-drawer--onhover:hover p,
  .friend-drawer--onhover:hover h6,
  .friend-drawer--onhover:hover .time {
    color: #fff !important;
  }

  hr {
    margin: 5px auto;
    width: 60%;
  }

  .chat-bubble {
    padding: 10px 14px;
    background: #eee;
    margin: 10px 30px;
    border-radius: 9px;
    position: relative;
    animation: fadeIn 1s ease-in;
  }

  .chat-bubble:after {
    content: '';
    position: absolute;
    top: 50%;
    width: 0;
    height: 0;
    border: 20px solid transparent;
    border-bottom: 0;
    margin-top: -10px;
  }

  .chat-bubble--left:after {
    left: 0;
    border-right-color: #eee;
    border-left: 0;
    margin-left: -20px;
  }

  .chat-bubble--right:after {
    right: 0;
    border-left-color: #74b9ff;
    border-right: 0;
    margin-right: -20px;
  }

  @keyframes fadeIn {
    0% {
      opacity: 0;
    }

    100% {
      opacity: 1;
    }
  }

  .offset-md-9 .chat-bubble {
    background: #74b9ff;
    color: #fff;
  }

  .chat-box-tray {
    background: #eee;
    display: flex;
    align-items: baseline;
    padding: 10px 15px;
    align-items: center;
    margin-top: 19px;
    bottom: 0;
  }

  .chat-box-tray input {
    margin: 0 10px;
    padding: 6px 2px;
  }

  .chat-box-tray i {
    color: grey;
    font-size: 30px;
    vertical-align: middle;
  }

  .chat-box-tray i:last-of-type {
    margin-left: 25px;
  }

  #leftside,
  #rightside {
    height: 50%;
    height: 541px;
    overflow-y: scroll;
  }

  @media (min-width: 768px) {
    .offset-md-9 {
      margin-left: 58%;
      padding: 0px;
    }
  }

  .hover {
    cursor: pointer;
  }

  .small {
    font-size: 57%;
  }
</style>

<body class="hold-transition sidebar-mini">
  <div class="divLoader-post" id="postLoader">
    <svg class="svgLoader" viewBox="0 0 100 100" width="10em" height="10em">
      <path ng-attr-d="{{config.pathCmd}}" ng-attr-fill="{{config.color}}" stroke="none" d="M10 50A40 40 0 0 0 90 50A40 42 0 0 1 10 50" fill="#51CACC" transform="rotate(179.719 50 51)">
        <animateTransform attributeName="transform" type="rotate" calcMode="linear" values="0 50 51;360 50 51" keyTimes="0;1" dur="1s" begin="0s" repeatCount="indefinite"></animateTransform>
      </path>
    </svg>
  </div>
  <div class="wrapper">
    <!-- Navbar -->
    <?php require_once(__DIR__ . '/../layout/nav.php'); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php require_once(__DIR__ . '/../layout/aside.php'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <?php $breadcrumbs = ['Enquiry'];
      $breadcrumbActive = "Enquiry";
      require_once(__DIR__ . '/../layout/global/breadcrumb.php'); ?>

      <!-- Main content -->
      <section class="content chat-body">
        <div class="container">
          <div class="row no-gutters">
            <div class="col-md-4 border-right">
              <div class="settings-tray">
                <img class="profile-image" src="https://www.kindpng.com/picc/m/24-248253_user-profile-default-image-png-clipart-png-download.png" alt="Profile img">

              </div>

              <div id="leftside">

              </div>
            </div>
            <div class="col-md-8">

              <div class="settings-tray">
                <div class="friend-drawer no-gutters friend-drawer--grey">

                  <div class="text">
                    <h6 id="user"></h6>
                    <p class="text-muted" id="productName"></p>
                  </div>
                  <span class="settings-tray--right">

                  </span>
                </div>
              </div>
              <div class="chat-panel">
                <div id="rightside"></div>
              </div>
              <div class="row sendMessage hide">
                <div class="col-12">
                  <div class="chat-box-tray">

                    <input id="message" type="text" placeholder="Type your message here...">

                    <i class="material-icons hover" onclick="sendMessage()">send</i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php require_once(__DIR__ . '/../layout/footer.php'); ?>


  </div>
  <!-- ./wrapper -->
  <?php require_once(__DIR__ . '/../layout/scripts.php'); ?>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
  <script>
    let enquiry = [];
    let _messageId;

    var input = document.getElementById("message");

    // Execute a function when the user releases a key on the keyboard
    input.addEventListener("keyup", function(event) {
      // Number 13 is the "Enter" key on the keyboard
      if (event.keyCode === 13) {
        sendMessage();
      }
    });

    function getallmessages() {
      __ajax_http("enquiry", ``, [], "GET", "enquiry", function(res) {
        enquiry = res.data.fetch;
        var data = _.uniqBy(res.data.fetch, "messageId");
        var html = "";
        data.forEach(e => {
          var date = new Date(e.createdAt);
          var name = (e.user) ? e.user.name : '';
          date = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate();
          html += '<div class="friend-drawer friend-drawer--onhover" onclick="getMesages(' + e.messageId + ')">' +
            '<img class="profile-image" src="' + e.product.productImage + '" alt="">' +
            '<div class="text">' +
            '<h6>' + name + '</h6>' +
            '<p class="text-muted">' + e.product.productName + '</p>' +
            '</div>' +
            '<span class="time text-muted small">' + date + '</span>' +
            '</div>' +
            '<hr>';
        })

        $("#leftside").html(html);

        if (_messageId) {
          getMesages(_messageId);
        }

      });
    }

    function sendMessage() {
      const m = enquiry.find(e => e.messageId == _messageId);
      let profile = JSON.parse(localStorage.getItem("profile"));
      __ajax_http("enquiry", {
        productId: m.productId,
        userId: m.userId,
        messageId: _messageId,
        message: $("#message").val(),
        byUserId: profile.id
      }, [], "POST", "enquiry", function(res) {
        getallmessages();
        $("#message").val("")
      })
    }

    function getMesages(messageId) {
      var html = "";
      _messageId = messageId;
      let profile = JSON.parse(localStorage.getItem("profile"));
      const m = enquiry.filter(e => e.messageId == messageId);
      m.forEach(f => {
        if (f.userId != f.byUserId) {
          html += '<div class="">' +
            '<div class="col-md-5 offset-md-9">' +
            '<div class="chat-bubble chat-bubble--right">' +
            f.message +
            '</div>' +
            '</div>' +
            '</div>';
        } else {
          html += '<div class="">' +
            '<div class="col-md-5">' +
            '<div class="chat-bubble chat-bubble--left">' +
            f.message +
            '</div>' +
            '</div>' +
            '</div>';
        }
      })

      $("#rightside").html(html);
      $("#user").html(m[0].user.name);
      $("#productName").html(m[0].product.productName);
      $(".sendMessage").removeClass('hide');
    }

    getallmessages();
  </script>
</body>

</html>