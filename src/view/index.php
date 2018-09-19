<?php include_once("../controller/DocObjViewController.php");?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>GROUBEX</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
       
    <div class="card text-center">
      <h3 class="card-header">
          <img src="../img/logo_groubex.png" width="150" alt="..." class="margin"/>
      </h3>
      <!-- body -->
      <?php
        $tempDocument = $docObj->getDocument();
        $extension = explode('.', $tempDocument);
        $extension = strtolower(end($extension));
      ?>
      <!-- if video -->
      <?php if (in_array($extension, $arrayVideo)): ?>      
        <video width="75%" controls controlsList="nodownload">
          <source src="<?php echo $tempDocument;?>" type="video/<?php echo $extension;?>"/>
        Your browser does not support the video
        </video>
      <?php endif;?>
      <!-- if image -->
      <?php if (in_array($extension, $arrayImage)): ?>
        <image width="75%" src="<?php echo $tempDocument;?>"/>
      <?php endif;?>
      <!-- if doc -->
      <?php if (in_array($extension, $arrayDoc)): ?>
        <embed width="75%" src="<?php echo $tempDocument;?>"></embed>
      <?php endif;?>
      <!-- body -->
      <div class="card-footer text-muted">
          <h1><?php echo $docObj->getViews();?> Views</h1>
      </div>
    </div>

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
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
