<?php include_once("../controller/DocObjViewController.php")?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data View
        <small>form</small>
      </h1>
      <!-- ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol -->
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!-- start -->
	   <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
              <li><a href="" data-toggle="tab">Application Form</a></li>
            </ul>
              <div class="tab-pane" id="">

                  <!-- body -->
                  <?php
                    $tempDocument = $docObj->getDocument();
                    $extension = explode('.', $tempDocument);
                    $extension = strtolower(end($extension));
                  ?>
                  <!-- if video -->
                  <?php if (in_array($extension, $arrayVideo)): ?>      
                    <video width="100%" controls controlsList="nodownload">
                      <source src="<?php echo $tempDocument;?>" type="video/<?php echo $extension;?>"/>
                    Your browser does not support the video
                    </video>
                  <?php endif;?>
                  <!-- if image -->
                  <?php if (in_array($extension, $arrayImage)): ?>
                    <image width="100%" src="<?php echo $tempDocument;?>"/>
                  <?php endif;?>
                  <!-- if doc -->
                  <?php if (in_array($extension, $arrayDoc)): ?>
                    <embed width="100%" src="<?php echo $tempDocument;?>"></embed>
                  <?php endif;?>
                  <!-- body -->
                  </div>
              </div>
        </div>
	  <!-- end -->

    </section>
    <!-- /.content -->
 </div>