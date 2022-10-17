<?php


  $dir = getcwd();

$filePath = (tempnam($dir,"php"));
// die();
// $file_name;
// $file_size;

// if (is_dir($dir)){
//     if ($dh = opendir($dir)){
//       while (($file = readdir($dh)) !== false){
//         echo   "<br>";
//         if(is_file($file)){
//            $_FILES['file'] = $file;
//         //    $info = pathinfo($file);
//         //    $file_name =  basename($file) ;
//         //    print_r(pathinfo($dir."/tester.txt"));
//         $_FILES['file']['tmp_name'] = $filePath;
//         //print_r($_FILES);
//         }
//       }
//       closedir($dh);
//     }
//   }

//   print_r($_FILES['file']['tmp_name']);
// die();
   // die();

// // Sort in ascending order - this is default
// $a = scandir($dir);

// // Sort in descending order
// $b = scandir($dir,1);


// //print_r($b);
//  print_r(dirname($b[2]) . PHP_EOL);
// die();


// $filePath = $_FILES['file']['tmp_name'];
// $type=$_FILES['file']['type'];
// $fileName = $_FILES['file']['name'];

// print_r($filePath);
// echo"<br>";
// print_r($type);
// echo"<br>";
// print_r($fileName);
// die();
    
$data = array('file' => curl_file_create($filePath, "plain/text", "contoh.zip"));

// print_r($_FILES['file']['tmp_name']);
// die();
// $ch = curl_init();     
// curl_setopt($ch, CURLOPT_URL, 'http://forkliftindonesia.co.id/data_kiriman_aspal/kirim_file/api-file-uplsoad.php');
// //curl_setopt($ch, CURLOPT_HTTPHEADER,array('Content-Type: multipart/form-data'));
// curl_setopt($ch, CURLOPT_POST, 1);
// curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
// $response = curl_exec($ch);
// curl_close($ch);

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, 'https://forkliftindonesia.co.id/data_kiriman_aspal/kirim_file/api-file-upload.php');
// $postData = array(
//     'testData' => '@/path/to/file.txt',
// );https://forkliftindonesia.co.id/data_kiriman_aspal/kirim_file/
//  ;http://forkliftindonesia.co.id/data_kiriman_aspal/kirim_file
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$response = curl_exec($ch);
print($response);


?>