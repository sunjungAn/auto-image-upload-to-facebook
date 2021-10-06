<?php 

$fb = new Facebook\Facebook([
  'app_id' => '428247532338328',
  'app_secret' => '31f27495e0f97411f10571624ac8e280',
  'default_graph_version' => 'v2.10',
  ]);

$data = [
  'message' => 'My awesome photo upload example.',
  'source' => $fb->fileToUpload('photo.jpg'),
];

try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->post('/me/photos', $data, '{access-token}');
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$graphNode = $response->getGraphNode();

echo 'Photo ID: ' . $graphNode['id'];

?>