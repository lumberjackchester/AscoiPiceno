<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');
ini_set('date.timezone', 'America/New_York');

require_once __DIR__ . '/library/vendor/autoload.php'; // change path as needed

$fb = new \Facebook\Facebook([
  'app_id' => '803185256469448',
  'app_secret' => 'aa09c38b69f0bd9bb35b383d5ff16f79',
  'default_graph_version' => 'v2.10',
  'default_access_token' => '5106fcd73161d7db63f69fc7bb52e10b', // optional
]);

// Use one of the helper classes to get a Facebook\Authentication\AccessToken entity.
//   $helper = $fb->getRedirectLoginHelper();
//   $helper = $fb->getJavaScriptHelper();
//   $helper = $fb->getCanvasHelper();
//   $helper = $fb->getPageTabHelper();

try {
  // Get the \Facebook\GraphNodes\GraphUser object for the current user.
  // If you provided a 'default_access_token', the '{access-token}' is optional.
  $response = $fb->get('/me');
} catch(\Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(\Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$me = $response->getGraphUser();
echo 'Logged in as ' . $me->getName();