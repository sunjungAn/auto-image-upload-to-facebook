<?php

session_start();
require_once __DIR__ . '/vendor/autoload.php';

$fb = new Facebook\Facebook([
	'app_id' => '428247532338328',
	'app_secret' => '21629c599831005bca2cf0f65763317b',
	'default_graph_version' => 'v2.6',
	"persistent_data_handler" => "session"]);

$linkData = [
	'link' => 'http://www.example.com',
	'message' => 'User provided message',];

try {
	$response = $fb->post('/me/feed', $linkData, $_SESSION['facebook_access_token']);
}catch(Facebook\Exceptions\FacebookResponseException $e){
	echo 'Graph returned an error: ' . $e -> getMessage();
	exit;
}

$graphNode = $response->getGraphNode();

echo 'Posted with id: '.$graphNode['id'];