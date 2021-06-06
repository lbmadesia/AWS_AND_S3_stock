<?php

require 'vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\S3\MultipartUploader;

$s3 = new S3Client(array( 
	"version" => "latest",
	"region"  => "ap-south-1",
	"credentials" => array(
		"key" => "your_api_key_here",
		"secret" => "your_secret_key_here",
	),
));

$url = $s3->getObjectUrl("erp.wes.com","wap.mp4");
echo "<a href='".$url."'>Download</a>";
?>