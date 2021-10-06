<?php

session_start();
require_once __DIR__ . '/vendor/autoload.php';

$fb = new Facebook\Facebook([
	'app_id' => '',
	'app_secret' => '',
	'default_graph_version' => '',
	"persistent_data_handler" => "session"]);

$helper = $fb -> getRedirectLoginHelper();
$permissions = ['email', 'user_likes', 'publish_actions'];

$loginUrl = $helper->getLoginUrl('https://localhost:8888/fb-post/php-graph-sdk/login-callback.php', $permissions);

echo '<a href ="'.$loginUrl. '">Log in with Facebook!</a>';
?>
