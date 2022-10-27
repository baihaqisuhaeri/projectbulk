<?php

// $curl = curl_init();

// curl_setopt_array($curl, array(
//   CURLOPT_URL => 'http://localhost/insert_data/insert_data.php',
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => '',
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 0,
//   CURLOPT_FOLLOWLOCATION => true,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => 'POST',
//   CURLOPT_POSTFIELDS => array('db_name' => 'test','query_file'=> new CURLFILE('/C:/xampp/htdocs/insert_data_lokal/query.txt')),
// ));

// $response = curl_exec($curl);

// curl_close($curl);
// echo $response;
$file = __DIR__ . DIRECTORY_SEPARATOR . "query.txt";

$cf = new CURLFile($file, mime_content_type($file));

$ch = curl_init();

$data = array('db_name' => 'forklift_belajar', 'query_file' => $cf);

curl_setopt($ch, CURLOPT_URL, 'https://forkliftindonesia.co.id/data_kiriman_aspal/kirim_file/insert_data.php');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

curl_exec($ch);
