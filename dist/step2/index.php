<?php

// set output response type to json

header('Content-Type: application/json');

// source our configuration variables

include_once "../config.php";

// get device code from the inbound post, sent by index.html

$device_code = $_POST['device_code'];

// build rest api call to pingfedeate token endpoint
// we do this to pick up the auth token if the user has signed in

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $pingFederate . '/as/token.oauth2',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_VERBOSE => true,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_SSL_VERIFYHOST => false,
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'client_id=' . $clientId . '&grant_type=urn%3Aietf%3Aparams%3Aoauth%3Agrant-type%3Adevice_code&device_code=' . $device_code,
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/x-www-form-urlencoded'
  ),
));

if ($response = curl_exec($curl)) {

  // received response from pingfederate

  // we do not care what the response is, the caller (index.html) will interpret and react

  // echo back the json

  echo $response;

} else {

  // unable to communicate with pingfederate, echo back the error message as json

  $error = array("errorMessage" => curl_error($curl));

  echo json_encode($error);

}

?>