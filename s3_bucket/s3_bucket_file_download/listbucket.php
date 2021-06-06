<?php
header("Access-Control-Allow-Origin:*");
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

$bucket = $s3->listBuckets();

foreach($bucket['Buckets'] as $data)
{
	echo $data['Name']."<br><br>";
}
?>

