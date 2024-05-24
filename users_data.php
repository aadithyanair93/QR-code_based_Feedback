<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "users";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />

    
    <title>Users</title>
</head>
<body>
<div class="title"><h1 style="text-align:center;">USERS</h1></div>
<hr style="border-top: 1px solid blue; width:50%;">
  <div class="contain">
      <table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">Sno.</th>
          <th scope="col">username</th>
          <th scope="col">Password</th>
          <th scope="col">Designation</th>
          <th scope="col">dt</th>
        </tr>
      </thead>
      <tbody>
      <?php
      $sql="SELECT * FROM `users`";
      $result = mysqli_query($conn, $sql);
      $num = mysqli_num_rows($result);
      $sno=0;
    while($row = mysqli_fetch_assoc($result)){
        $sno=$sno+1;
          echo "
          <tr>
          <th scope='row'>". $sno." </th>
          <td>". $row['username']." </td>
          <td>". $row['password']."</td>
          <td>". $row['designation']."</td>
          <td>". $row['dt']." </td>
            </tr>";   
       
      
       
          echo "<br>";
      }
      ?>
       
      </tbody>
    </table>
  </div>
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script>	
  let table = new DataTable('#myTable');</script>
</body>
</html>