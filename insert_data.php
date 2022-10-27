<?php
if ($_SERVER['REQUEST_METHOD']=='POST')
{
$servername = "localhost";
$username = "forklift_belajar";
$password = "bayhaqi123";
$dbname = $_POST['db_name'];
}

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
 }
//else{
//   var_dump("berhasil");
// }
// die();

if ($_SERVER['REQUEST_METHOD']=='POST')
{
  move_uploaded_file($_FILES['query_file']['tmp_name'], $_FILES['query_file']['name']);
    $myfile = fopen($_FILES['query_file']['name'], "r") or die("Unable to open file!");
    $sql =  fread($myfile,filesize($_FILES['query_file']['name']));
    fclose($myfile);

    $query = explode(";",$sql);
    
//var_dump($_FILES['query_file']['name']);
// $sql = "INSERT INTO karyawan (nama, umur, alamat)
// VALUES ('bayhaqi', '24', 'jakarta')";
for($i = 0; $i< sizeof($query)-1; $i++){
//echo $query[$i];

if ($conn->query($query[$i]) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();

}
?>