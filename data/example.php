<?php
  /**
   * Example request file.
   * Make an HTTPS Post request to this file.
   *
   * Valid response: The JSON below
   * Invalid response: A JSON object with a status and error MessageFormatter
   */
  header('Content-Type: application/json');
  require_once '../authenticate.php'

  // `authenticate.php` will stop PHP execution if the user is invalid. If the
  // user checks out, the content below will be returned
?>
{"your": "content"}
