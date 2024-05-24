<?php
include("conn1.php");
if(isset($_GET['sno'])){
    $sno=$_GET['sno'];

$query="delete from feed where sno='$sno'";
$result=mysqli_query($conn,$query);
if(!$result){
    echo("Query Failed");
}
else{
    header('location:manage_feedback.php?msg=feedback deleted.');
}
}
?>