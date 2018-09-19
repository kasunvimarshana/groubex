<?php
    if(isset($_POST)){
        $page = "src/view/mainpage.php?contentPage=3";
        $uname = isset($_POST["uname"])?$_POST["uname"]:null;
        $upassword = isset($_POST["upassword"])?$_POST["upassword"]:null;
        if($uname == "admin" && $upassword == "admin123"){
            require_once("src/model/Session.php");
            $session->set_session_data("loging", "admin");
            header('Location: '.$page);
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>GROUBEX</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="src/view/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="src/view/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="src/view/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="src/view/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="src/view/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
       
<div class="login-box">
  <div class="login-logo">
    <a href="<?php $_SERVER["PHP_SELF"];?>"><b>GROUBEX</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <div class="timeline-body" style="text-align: center;">
        <img src="src/img/logo_groubex.png" width="150" alt="..." class="margin"/>
    </div>
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" autocomplete="off">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="User Name" name="uname"/>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="upassword"/>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <!-- div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div -->
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!-- /.social-auth-links -->

    <!-- a href="#">I forgot my password</a --><br>
    <!-- a href="register.html" class="text-center">Register a new membership</a -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="src/view/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="src/view/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="src/view/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
