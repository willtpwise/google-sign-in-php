<?php
/**
 * This file calls on the GoogleClient API to verify the user's ID token and
 * request the user's basic profile.
 */
require_once 'vendor/autoload.php';

define('ID_TOKEN', $_POST['token']);
define('CLIENT_ID', '<your client id>');

// Set this to your GSuite organisation if you want to check that the user is
// from your company
define('ORGANISATION', false);

$client = new Google_Client(['client_id' => CLIENT_ID]);
$payload = $client->verifyIdToken(ID_TOKEN);

// Validate the Google ID token
if (!$payload) {
  echo json_encode(array(
    'status' => false,
    'body' => 'Invalid ID token'
  ));
  die();
}

// Validate that the user is within the organisation
// Optional...
if (ORGANISATION && $payload['hd'] !== ORGANISATION) {
  echo json_encode(array(
    'status' => false,
    'body' => 'Invalid organisation'
  ));
  die();
}
