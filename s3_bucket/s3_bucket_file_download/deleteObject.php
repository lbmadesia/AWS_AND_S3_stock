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

$check_file = $s3->doesObjectExist("erp.wes.com","wap.mp4");

if($check_file)
{
	$s3->deleteObject(array(
	"Bucket" => "erp.wes.com",
	"Key" => "wap.mp4"
	));

	if(!$s3->doesObjectExist("erp.wes.com","wap.mp4"))
	{
		echo "delete success";
	}

	else{
		echo "delete failed";
	}

}

else{
	echo "File not found !";
}


?>