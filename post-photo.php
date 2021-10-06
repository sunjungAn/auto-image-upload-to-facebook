<?php

session_start();
require_once __DIR__ . '/facebook_upload/autoload.php';

$fb = new Facebook\Facebook([
	'app_id' => '256248838177523',
	'app_secret' => '45aeb4cf14d3f410fc07c694aa4118d1',
	'default_graph_version' => 'v2.6',
	"persistent_data_handler" => "session"]);


$data = [
	'message' => 'Beautiful Kitty',
	'source' => $fb->fileToUpload('cat.jpg'),
];

try{
	$response = $fb -> post('/me/photos', $data, $_SESSION['facebook_access_token']);
}catch(Facebook\Exceptions\FacebookResponseException $e) {
	echo 'Graph returned an error: ' . $e -> getMessage();
	exit;
}catch(Facebook\Exceptions\FacebookSDKException $e){
	echo 'Facebook SDK returned an error: '. $e->getMessage();
	exit;
}

$graphNode = $response->getGraphNode();

echo 'Photo ID: ' .$graphNode['id'];
?>
