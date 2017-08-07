<?php
require_once '../vendor/autoload.php';

define('ID_TOKEN', $_POST['token']);
define('CLIENT_ID', '400338796931-rnmvtbfofqhsvfd8rvat5igq8h121v46.apps.googleusercontent.com');

$client = new Google_Client(['client_id' => CLIENT_ID]);
$payload = $client->verifyIdToken(ID_TOKEN);

// Validate the Google token
if (!$payload) {
  echo json_encode(array(
    'status' => false,
    'body' => 'Invalid ID token'
  ));
  die();
}

// Validate that the user is within the organisation
if ($payload['hd'] !== 'siteminder.com') {
  echo json_encode(array(
    'status' => false,
    'body' => 'Invalid organisation'
  ));
  die();
}
