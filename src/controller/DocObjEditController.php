<?php

    require_once("../util/MyInit.php");
	$docObj = new DocObj();
    $docObjBoImpl = new DocObjBoImpl();

    if(isset($_GET["id"])){
       global $docObj; 
       global $docObjBoImpl;
       $id = $_GET["id"];
       $docObj = $docObjBoImpl->f_search($id);
    }
    if(isset($_POST["submit"])){
       global $docObj; 
       global $docObjBoImpl;
        try{ 
            $docObj = $docObjBoImpl->f_search($_POST["id"]);
            
            if(isset($_FILES['document']) && !empty($_FILES['document']['tmp_name'])){
                $file = $_FILES['document'];
                //file details
                $name = $file['name'];
                $tmp_name = $file['tmp_name'];
                $tmp_file_path = $tmp_name;
                $extension = explode('.', $name);
                $extension = strtolower(end($extension));
                //temp_details
                $key = md5(uniqid());
                $tmp_file_name = "{$key}.{$extension}";
                //$tmp_file_path = "../temp/{$tmp_file_name}";
                //move_uploaded_file($tmp_name,$tmp_file_path);
                //upload to s3 server
                $s3FileHandleController = new S3FileHandleController();
                $s3result = $s3FileHandleController->f_upload($tmp_file_name, $tmp_file_path);
                if($s3result){
                    $docObj->setDocument($s3result["ObjectURL"]);
                }
            }
            
            $docObj->setUrl($_POST["url"]);
            $docObj->setNote($_POST["note"]);
            $docObjBoImpl->f_update($docObj);
            //echo "<script>alert('Success: ".$docObj." Successfully updated!');</script>"; 
            redirectPageTo(OBJ_LIST);
        }catch(Exception $e){
            echo "<script>alert('Error: check again!');</script>";
        }
    }

?>