<?php

    use Aws\S3\S3Client;
    require_once("../util/MyInit.php");
	$docObj = new DocObj();
    $docObjBoImpl = new DocObjBoImpl();

    if(isset($_POST["submit"])){
       global $docObj; 
       global $docObjBoImpl;
        
        try{
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
            $docObj->setVarDate(date('Y-m-d', time()));
            $docObjBoImpl->f_save($docObj);
            echo "<script>alert('Success: ".$docObj." Successfully added!');</script>";
            $docObj = new DocObj();
            
        }catch(Exception $e){
            echo "<script>alert('Error: check again!');</script>";
        }
    }
    

?>