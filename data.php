<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "feedback";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM `feed`";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error executing the query: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="js/DataTables/datatables.min.css"/>
        <link rel="stylesheet" href="css/main.css" media="screen" >
        
        <style>
    *{
        
        font-family: 'Poppins', sans-serif;
  
    }
    body{background-color: white;}
    .title h1{
        color: Purple;
        font-size: 50px;
        font-weight:bold;
        text-decoration: underline;
        text-underline-offset: 8px;
        text-align: center;
        margin: 80px 80px;
    }
    .contain{
        margin: -254px 50px;
        display: inline;
    }
    .welcome{
      margin: 129px 168px;
    }
  </style>
   <script>
        let a;
        let date;
        let time;
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'};
        setInterval(() => {
        a= new Date();
        date= a.toLocaleDateString(undefined, options);
     time=a.getHours() + ':'+ a.getMinutes() + ':' + a.getSeconds();
        document.getElementById('time').innerHTML=time+ " on " + date;
    }, 1000);
    </script>
</head>

<body>
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/hero-img.png" alt="">
        <span>PoliceConnect</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="getstarted scrollto" href="logout.php">Logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
    <div class="welcome">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Welcome - Mr. <?php echo $_SESSION['username']; ?></h4>
           <?php
           include "conn.php";
           
           $sql="select designation from users where username='".$_SESSION['username']."'";
           $result=mysqli_query($conn,$sql);
           while($row=mysqli_fetch_assoc($result)){
            echo "<p>Designation:"." "."$row[designation]<p>";
           }
           ?>
            <hr>
            <p>Current Timestamp:</p>
            <p class="mb-0" id="time"></p>
        </div>
    </div>

    <div class="title">
        <h1>Feedback Form Data</h1>
    </div>

    <div class="contain">
        <table class="table" id="example">
            <thead>
                <tr>
                    <th scope="col">S no.</th>
                    <th scope="col">Name of Person</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Name of Police Station</th>
                    <th scope="col">Experience at Police Station</th>
                    <th scope="col">Time Taken to Hear an Individual</th>
                    <th scope="col">Behaviour Of Police Officer</th>
                    <th scope="col">Date & Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "conn1.php";
                $sno = 0;
                $sql_1="select * from feed";
                $result_1=mysqli_query($conn,$sql_1);
                while($row=mysqli_fetch_assoc($result_1)){
                    $sno++;
                    echo "
                    <tr>
                        <th scope='row'>" . $sno . "</th>
                        <td>" . $row['name'] . "</td>
                        <td>" . $row['phone'] . "</td>
                        <td>" . $row['police'] . "</td>
                        <td>" . $row['experience'] . "</td>
                        <td>" . $row['time'] . "</td>
                        <td>" . $row['behaviour'] . "</td>
                        <td>" . $row['dt'] . "</td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
<?php
require "footer.php";
?>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    
    <script>
            $(function($) {
                $('#example').DataTable();

                $('#example2').DataTable( {
                    "scrollY":        "300px",
                    "scrollCollapse": true,
                    "paging":         false
                } );

                $('#example3').DataTable();
            });
            
        </script>
    
</body>

</html>
