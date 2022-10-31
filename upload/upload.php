<?php

//  SETTINGS
$url = "https://forkliftindonesia.co.id/data_kiriman_aspal/kirim_file/api-file-upload.php"; // alamat penerimanya
$file = __DIR__ . DIRECTORY_SEPARATOR . "testing.txt"; // File yang mau diupload
$upname = "testing.txt"; // nama file setelah diupload

date_default_timezone_set('Asia/Jakarta');
$date_modified = date('d-m-Y  H:i:s');

//  NEW CURL FILE
$cf = new CURLFile($file, mime_content_type($file), $upname);


//  CURL INIT
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_FAILONERROR, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, [
  // ATTACH FILE UPLOAD
  "upload" => $cf,
  // OPTIONAL - APPEND MORE POST DATA
  "KEY" => "VALUE"
]);



//  CURL RUN
//  GO!
$result = curl_exec($ch);

//  CURL ERROR
if (curl_errno($ch)) {
  echo "CURL ERROR - " . curl_error($ch);
} else {

  echo $result;
}


curl_close($ch);
//echo strlen($result);
if(strlen($result)==24){
  $dir = getcwd();
$size="";
$date="";
$cek = false;
date_default_timezone_set('Asia/Jakarta');
if (is_dir($dir)){
    if ($dh = opendir($dir)){
      while (($file = readdir($dh)) !== false){
        //echo   "<br>";
        if(is_file($file)){
           $_FILES['file'] = $file;
        //    $info = pathinfo($file);
           
        //    print_r(pathinfo($dir."/tester.txt"));
        //echo $file ;
        if($file == "testing.txt"){

          $file_name = "Nama File : ". basename($file) ;
          $cek = true;
       // echo "size : ";
        // print_r(filesize($file));
         $size .="Size : ".filesize($file)."\n" ;
       //  echo " Date : ";
       // print_r(date ("F d Y H:i:s.", filemtime($file)));
          $date .= "Date : ". date ("d-m-Y  H:i:s", filemtime($file)) . "\n";
          
        }else{
         
        //   $file_name = "" ;
        //  $size .="" ;
        //   $date .= "";
          
        }
        }
      }
      closedir($dh);
    }
  }
//echo"bisa";
    $txt = $file_name . "\n". $size . "\n" . $date ;
    $date_modified = "Date Modified : " . $date_modified;
  $myfile = fopen("cek.txt", "w") or die("Unable to open file!");
  $dateModifiedFile = fopen("date_modified.txt", "w") or die("Unable to open file!");
  fwrite($myfile, $txt);
  fclose($myfile);

  fwrite($dateModifiedFile, $date_modified);
  fclose($dateModifiedFile);

}else{
  //echo"gak bisa";
  $txt = "GAGAL, File tidak ada";
  $myfile = fopen("cek.txt", "w") or die("Unable to open file!");
  $date_modified = "Date Modified : " . $date_modified;
  $dateModifiedFile = fopen("date_modified.txt", "w") or die("Unable to open file!");
  fwrite($myfile, $txt);
  fclose($myfile);

  fwrite($dateModifiedFile, $date_modified);
  fclose($dateModifiedFile);
}
