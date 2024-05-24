<?php
$server="localhost";
$username="root";
$password="";
$database="police_connect";

$conn = mysqli_connect($server, $username, $password, $database);
if(!$conn){
    // echo "Successfully connected";
// }
// else{
die("Error". mysqli_connect_error());
}

?>
