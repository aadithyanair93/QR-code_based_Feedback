<?php 

if(isset($_POST['submit'])){
  $login = false;
  $showError = false;
  require 'conn.php';
  
  $username = $_POST["username"];
  $password = $_POST["password"];  
$sql="Select * from users where username='$username' AND password='$password'"; 
  $result = mysqli_query($conn,$sql);
  $num = mysqli_num_rows($result);
  if($num == 1){
    $login = true;
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    header("Location: data.php");
  }
else{
  $showError = "Invalid Credentials";
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">'.
$showError.
  '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'.
'</div>
';

 }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <style>
      form{
        margin-top:200px;
        margin-left: 400px;
      }
</style>
</head>
<body>
<script>  
function validateform(){  
var name=document.getElementById("username").value;  
var password=document.getElementById("password1").value;  
  
if (username==null){  
  alert("username can't be blank");  
  return false;  
}else if(password.length<6){  
  alert("Password must be at least 6 characters long.");  
  return false;  
  }  
  else if(password==null){  
  alert("Password can't be blank");  
  return false;  
  }  
}  
</script>  
<?php require 'partials/_nav.php';?>
<?php


?>
<div class="container">
  <form action="/police connect/login.php" method="POST" onsubmit="validateform()">
  <div class="mb-3 mx-3 my-2 col-md-6">
    <label for="username" class="form-label">username</label>
    <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp" required>
  
  </div>
  <div class="mb-3 mx-3 my-3 col-md-6">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="password1" required>
  </div>
  
  
  <button type="submit" name="submit" class="btn btn-primary mx-3 my-3">Login</button> 
</form>
</div>
    
     
<?php require 'partials/footer.php' ?>
</body>
</html>