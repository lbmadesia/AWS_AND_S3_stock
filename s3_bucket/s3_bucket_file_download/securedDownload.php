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

$secured_access = $s3->getCommand('GetObject',array(
	"Bucket" => "erp.wes.com",
	"Key"	=> "wap.mp4"
));

$url = $s3->createPresignedRequest($secured_access,"+5 seconds");

$signed_url = $url->getUri();

echo "<a href='".$signed_url."'>Download</a>";
?>