<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://timeapi.io/api/TimeZone/zone?timeZone=Asia/Jakarta',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
$respon =json_decode($response);

$date = $respon->currentLocalTime;
$tanggal = substr($date,8,2)."-".substr($date,5,2)."-".substr($date,0,4);
$dateNow =  $tanggal. " ".substr($date,11,8);

$dateModifiedFile = fopen("cek_tanggal_now.txt", "w") or die("Unable to open file!");
fwrite($dateModifiedFile, $dateNow);
fclose($dateModifiedFile);