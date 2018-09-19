<?php include_once("../controller/DocObjListController.php")?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data List
        <small>table</small>
      </h1>
      <!-- ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol -->
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!-- start -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="employeeList" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th> ID </th>
                  <th> DATE </th>
                  <th> QR CODE </th>
                  <th> NOTE </th>
                  <th> VIEW </th>
                  <th> EDIT </th>
                  <th> DELETE </th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($docObjs as $docObj):?>
                <tr>
                  <td><?php echo $docObj->getId();?></td>
                  <td><?php echo $docObj->getVarDate();?></td>
                  <td>
                    <?php
                      //$tmpQrCode = ($docObj->getUrl())?$docObj->getUrl():$docObj->getDocument();
                      $tmpQrCode = $_SERVER['HTTP_HOST']."/src/view/index.php?id=".$docObj->getId();
                    ?>
                    <div class="timeline-body">
                        <a href="https://chart.googleapis.com/chart?cht=qr&chl=<?php echo $tmpQrCode;?>&chs=177x177&chld=H|3" target="_blank"><img src="https://chart.googleapis.com/chart?cht=qr&chl=<?php echo $tmpQrCode;?>&chs=177x177&chld=H|3" alt="<?php echo $tmpQrCode;?>" class="margin"/></a>
                    </div>
                  </td>
                  <td><?php echo $docObj->getNote();?></td>
                  <td><a href="<?php echo $_SERVER["PHP_SELF"]."?contentPage=".OBJ_VIEW."&id=".$docObj->getId();?>" class="btn btn-block btn-warning btn-flat"> View </a></td>
                  <!-- td><a href="../controller/QRCodeDownloadController.php?id=<?php echo $docObj->getId();?>" target="_blank" class="btn btn-block btn-warning btn-flat"> QRD </a></td -->
                  <td><a href="<?php echo $_SERVER["PHP_SELF"]."?contentPage=".OBJ_EDIT."&id=".$docObj->getId();?>" class="btn btn-block btn-warning btn-flat"> Edit </a></td>
                  <td><a href="<?php echo $_SERVER["PHP_SELF"]."?contentPage=".OBJ_LIST."&delete=".$docObj->getId();?>" class="btn btn-block btn-danger btn-flat" onclick="if(!confirm('Are You Sure?')){ return false;}"> Delete </a></td>
                </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th> ID </th>
                  <th> DATE </th>
                  <th> QR CODE </th>
                  <th> NOTE </th>
                  <th> VIEW </th>
                  <th> EDIT </th>
                  <th> DELETE </th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
	  <!-- end -->

    </section>
    <!-- /.content -->
 </div>

<!-- page script -->
<script>
  $(function () {
    $('#employeeList').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true
    });
  });
</script>