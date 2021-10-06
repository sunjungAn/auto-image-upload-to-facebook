<?php

session_start();
require_once __DIR__ . '/facebook_upload/auto.php';

$fb = new Facebook\Facebook([
	'app_id' => '',
	'app_secret' => '',
	'default_graph_version' => 'v2.6',
	"persistent_data_handler" => "session"]);

$helper = $fb -> getRedirectLoginHelper();
try{
	$accessToken = $helper -> getAccessToken();
}catch(Facebook\Excptions\FacebookResponseException $e){
	echo 'Graph returned an error: '. $e->getMessage();
	exit;
}catch(Facebook\Exceptions\FacebookSDKException $e){
	echo 'Facebook SDK returned an error: '.$e->getMessage();
	exit;
}

if (isset($accessToken)){
	$_SESSION['facebook_access_token'] = (string) $acessToken;

	$postURL = "https://localhost:8888/fb-post/php-graph-sdk/post-photo.php";
	echo '<a href="' . $postURL . '">Post Image on Facebook!</a>';

	$response = $fb -> get('/me?locale=en_US&fields=name,email,likes', $_SESSION['facebook_access_token']);

	$userNode = $response -> getGraphUser();

	echo "<pre>";
	print_r($userNode);
}
