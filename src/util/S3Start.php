<?php

 use Aws\S3\S3Client;
 require_once("../composer/vendor/autoload.php");
 $config = require('S3Config.php');
 
 $s3 = S3Client::factory([
	'key' => $config['s3']['key'],
	'secret' => $config['s3']['secret'],
	'signature' => 'v4',
	'region'=> 'us-east-2'
 ]);

?>