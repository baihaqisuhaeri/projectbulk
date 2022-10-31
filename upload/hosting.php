<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$date_modified = date('d-m-Y  H:i:s');
date_default_timezone_set('Asia/Jakarta');
if ($_SERVER['REQUEST_METHOD']=='POST')
{


    $dir = getcwd();
    $size="";
    $date="";
    $cek = false;
    date_default_timezone_set('Asia/Jakarta');
    if (is_dir($dir)){
        if ($dh = opendir($dir)){
            // echo $dh;
        while (($file = readdir($dh)) !== false){
            if(is_file($file)){
            $_FILES['file'] = $file;
            // echo $file;
            if($file == $_POST['namafile']){
           //echo $file;
            $file_name = "Nama File : ". basename($file) ;
            $cek = true;
            $size .="Size : ".filesize($file)."\n" ;
            $date .= "Date : ". date ("d-m-Y  H:i:s", filemtime($file)) . "\n";
            
            $txt = $file_name . "\n". $size . "\n" . $date . "\n" ;
            $date_modified = "Date Modified : " . $date_modified;
            //$myfile = fopen("cek.txt", "w") or die("Unable to open file!");
            $dateModifiedFile = fopen("date_modified.txt", "w") or die("Unable to open file!");
           // echo $txt;
            }
            }
        }
        closedir($dh);
        }
    }
    if($cek){
        echo $txt;
    }else{
        $txt = "GAGAL, File tidak ada";
        echo $txt;
    }
    
    
  
}
?>