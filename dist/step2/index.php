<?php
header('Content-Type: application/json');

// get device code from query string

$device_code = $_GET['device_code'];

// $device_code = 'YuO6GPWdIRCoFWmOmrhykm2TkB2Liau7LcHAfuAqZb';

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://video-pingfederate-engine.ping-devops.com/as/token.oauth2',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'client_id=df_client&grant_type=urn%3Aietf%3Aparams%3Aoauth%3Agrant-type%3Adevice_code&device_code=' . $device_code,
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/x-www-form-urlencoded'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

?>