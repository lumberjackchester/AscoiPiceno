<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');
ini_set('date.timezone', 'America/New_York');

require_once __DIR__ . '/library/vendor/autoload.php'; // change path as needed
 

$appID = '803185256469448';
$appSecret = 'aa09c38b69f0bd9bb35b383d5ff16f79';

//Create an access token using the APP ID and APP Secret.
$accessToken = $appID . '|' . $appSecret;

$fb = new \Facebook\Facebook([
    'app_id' => '803185256469448',
    'app_secret' => 'aa09c38b69f0bd9bb35b383d5ff16f79',
    'default_graph_version' => 'v3.0',
    //'default_access_token' => $accessToken // optional
        ]);
//The ID of the Facebook page in question.
$id = 'PicenoWines';
 
try {
    // Returns a `Facebook\FacebookResponse` object
    $response = $fb->get(
            '/' . $id . '/feed', $accessToken
    );
} catch (Facebook\Exceptions\FacebookResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}
$graphNode = $response->getGraphNode();

var_dump($graphNode);