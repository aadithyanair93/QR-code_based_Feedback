<?php
session_start();
error_reporting(0);
include('includes/config.php');
include("conn.php");
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: admin_login.php"); 
    }
    else{
if(isset($_POST['submit']))
{
  $username=$_POST['uname'];
$password_1=$_POST['password1']; 
$password_2=$_POST['password2'];
$designation=$_POST['designation'];
$query="select * from users where username='$username'" ;
$exec=mysqli_query($conn,$query);
$numExistrows =   mysqli_num_rows($exec);
if($numExistrows>0){
    // $exists= true;
    $showAlert = " username already exists.";
  }
else{
if($password_1==$password_2){
    // $hashed_password=password_hash($password_1,PASSWORD_DEFAULT);
$sql="INSERT INTO `users`(`sno`, `username`, `password`) VALUES ('','$username','$password_1','$designation')";
$result=mysqli_query($conn,$sql);

if($result)
{
$msg="user Account Created Successfully";
}
else 
{
$error="Something went wrong. Please try again";
}
}
}
}
   // }   
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Chef's Magic Admin Create Class</title>
        <link rel="stylesheet" href="css/bootstrap.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" > <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
         <style>
        .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
        </style>
        <script>
        function checkPassword(form) { 
                password1 = form.password1.value; 
                password2 = form.password2.value; 
  
                // If password not entered 
                if (password1 == '') 
                   alert("Please enter Password"); 
                      
                // If confirm password not entered 
                else if (password2 == '') 
                    alert ("Please enter confirm password"); 
                      
                // If Not same return False.     
                else if (password1 != password2) { 
                    alert ("\nPassword did not match: Please try again...") 
                    return false; 
                } 

                
            } 
            </script>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
            <?php include('includes/topbar.php');?>   
          <!-----End Top bar>
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

<!-- ========== LEFT SIDEBAR ========== -->
<?php include('includes/leftbar.php');?>                   
 <!-- /.left-sidebar -->

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Create User Account</h2>
                                </div>
                                
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
            							<li><a href="#">Users</a></li>
            							<li class="active">Create User Account</li>
            						</ul>
                                </div>
                               
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">

                             

                              

                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Create User Account</h5>
                                                </div>
                                            </div>
           <?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <strong><?php echo $msg?></strong>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
                                    <?php if($showAlert){?>
                                    <div class="alert alert-danger" role="alert">
                                   <?php echo $showAlert; ?>
                                  </div><?php }?>

                                            <div class="panel-body">

                                                <form method="post" action="create_user.php" onsubmit="return checkPassword(this)">
                                                    <div class="form-group has-success">
                                                        <label for="success" class="control-label">username</label>
                                                		<div class="">
                                                			<input type="text" name="uname" class="form-control" required="required" id="success">
                                                          
                                                		</div>
                                                	</div>
                                                       <div class="form-group has-success">
                                                        <label for="success" class="control-label">password</label>
                                                        <div class="">
                                                            <input type="password" name="password1" required="required" class="form-control" id="pass">
                                                            <input type="checkbox" name="visible" onclick="showPassword()" id="">Show Password
                                                            
                                                        </div>
                                                    </div>
                                                  
                                                    <label for="success" class="control-label">cpassword</label>
                                                        <div class="">
                                                            <input type="password" name="password2" required="required" class="form-control" id="pass_2">
                                                            <input type="checkbox" name="visible" onclick="showPassword_2()" id="">Show Password
                                                            
                                                        </div>
                                                    </div>
                                                     
                                                    <div class="form-group has-success">
                                                        <label for="success" class="control-label">Designation</label>
                                                		<div class="">
                                                			<input type="text" name="designation" class="form-control" required="required" id="success">
                                                          
                                                		</div>
                                                	</div>
  <div class="form-group has-success">

                                                        <div class="">
                                                           <button type="submit" name="submit" class="btn btn-success btn-labeled">Submit<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                    </div>


                                                    
                                                </form>

                                              
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-8 col-md-offset-2 -->
                                </div>
                                <!-- /.row -->

                               
                               

                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->

                    </div>
                    <!-- /.main-page -->

                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->
        <script>
            function showPassword(){
            var x= document.getElementById("pass");
            if(x.type === "password"){
                x.type = "text";
            }
            else{
                x.type="password";
            }
        }
        function showPassword_2(){
            var y= document.getElementById("pass_2");
            if(y.type === "password"){
                y.type = "text";
            }
            else{
                y.type="password";
            }
        }
        </script>

        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/jquery-ui/jquery-ui.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>



  
    </body>
</html>
<?php  } ?>
