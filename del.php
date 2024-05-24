<?php
include("conn.php");
if(isset($_GET['sno'])){
    $sno=$_GET['sno'];

$query="delete from users where sno='$sno'";
$result=mysqli_query($conn,$query);
if(!$result){
    echo("Query Failed");
}
else{
    header('location:manage_users.php?msg=user deleted.');
}
}
?>
?>