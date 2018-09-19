<?php include_once("../controller/DocObjRegisterController.php");?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Upload
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
                <form class="form-horizontal" method="POST" action="<?php echo $_SERVER["PHP_SELF"]."?contentPage=".OBJ_REG;?>" autocomplete="off" enctype="multipart/form-data">
                    
                <div class="form-group" id="div_url">
                    <label for="url" class="col-sm-2 control-label">URL</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="url" placeholder="url" name="url" value="<?php echo $docObj->getUrl();?>"/>
                    </div>
                  </div>
                    
                  <div class="form-group" id="div_document">
                    <label for="document" class="col-sm-2 control-label">FILE</label>

                    <div class="col-sm-10">
                      <input type="file" id="document" name="document">

                  <p class="help-block">browse your file</p>
                    </div>
                  </div>
                    
                 <div class="form-group">
                    <label for="note" class="col-sm-2 control-label">NOTE</label>

                    <div class="col-sm-10">
                        <textarea class="form-control" rows="5" placeholder="note" name="note"><?php echo $docObj->getNote();?></textarea>
                    </div>
                  </div>
                    
                  <div class="form-group">
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button name="submit" type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
        </div>
	  <!-- end -->

    </section>
    <!-- /.content -->
 </div>
    
<!-- page script -->
<script>
$("document").ready(function(){
    
  $("#url").keyup(function(){
    if(this.value.length > 5){
        $("#div_document").hide();
    }else{
        $("#div_document").show();
    }
  });
    
  $("#document").change(function(){
    if($(this).val() != ""){
        $("#div_url").hide();
    }else{
        $("#div_url").show();
    }
  });
    
});
</script>