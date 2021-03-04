<?php

// set output response type to json

header('Content-Type: application/json');

// source our configuration variables

include_once "../config.php";

// build rest api call to pingfederate to kick things off

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $pingFederate . '/as/device_authz.oauth2',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_SSL_VERIFYHOST => false,
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'client_id=' . $clientId,
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/x-www-form-urlencoded'
  ),
));

if ($response = curl_exec($curl)) {

  // received response from pingfederate, echo back the json

  echo $response;

} else {

  // unable to communicate with pingfederate, echo back the error message as json

  $error = array("errorMessage" => curl_error($curl));

  echo json_encode($error);

}

// close our open socket

curl_close($curl);

?>