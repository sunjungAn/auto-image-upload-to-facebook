<?php

session_start();
require_once __DIR__ . '/vendor/autoload.php';

$fb = new Facebook\Facebook([
	'app_id' => '428247532338328',
	'app_secret' => '31f27495e0f97411f10571624ac8e280',
	'default_graph_version' => 'v2.6',
	"persistent_data_handler" => "session"]);

$helper = $fb -> getRedirectLoginHelper();
$permissions = ['email', 'user_likes', 'publish_actions'];

$loginUrl = $helper->getLoginUrl('https://localhost:8888/fb-post/php-graph-sdk/login-callback.php', $permissions);

echo '<a href ="'.$loginUrl. '">Log in with Facebook!</a>';
?>