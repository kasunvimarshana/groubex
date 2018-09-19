<?php

use Aws\S3\Exception\S3Exception;

class S3FileHandleController{
    
	public function f_upload($filename, $tmp_file_path){
        $result;
        require_once("../util/S3Config.php");
        require_once("../util/S3Start.php");
        try{
            $result = $s3->putObject([
                'Bucket' => $config['s3']['bucket'],
                'Key' => "uploads/{$filename}",
                'Body' => fopen($tmp_file_path, 'rb'),
                'ACL' => 'public-read'
            ]);
            //unlink($tmp_file_path);
        }catch(S3Exception $e){
            $result = false;
        }
        return $result;
	}
   
}

?>