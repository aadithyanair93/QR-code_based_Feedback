<?php
include("conn1.php");
if(isset($_GET['sno'])){
    $sno=$_GET['sno'];
    $done="done";

$query="UPDATE `feed` SET `status`='$done' WHERE sno='$sno'";
$result=mysqli_query($conn,$query);
if(!$result){
    echo("Query Failed");
}
else{
    header('location:manage_feedback.php?text=Status Updated.');
}
}
?>