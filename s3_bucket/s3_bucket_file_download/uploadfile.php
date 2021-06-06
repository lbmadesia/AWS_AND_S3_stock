<?php

require 'vendor/autoload.php';

use Aws\S3\S3Client;

$s3 = new S3Client(array(
	"version" => "latest",
	"region"  => "ap-south-1",
	"credentials" => array(
		"key" => "your_api_key_here",
		"secret" => "your_secret_key_here",
	),
));

$s3->putObject(array(
	"Bucket" => "erp.wes.com",
	"Key" => "wap.png",
	"Body" => fopen("demo.png",'r'),
	"ACL" => "public-read"
));

?>