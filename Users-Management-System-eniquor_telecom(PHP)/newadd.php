<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Users Management System</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
</head>
<?php
include_once 'config.php';

$con=mysqli_connect(DBHOST,DBUSER,DBPASSWORD,DBNAME);
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit;

    }

if(isset($_POST['submit']))
{    
     $first_name = $_POST['name'];
     $email = $_POST['email'];
     $address = $_POST['address'];
     $city = $_POST['city'];
     $contact = $_POST['contact'];
    $modeofconn = $_POST['modeofconn'];
    $typeofconn = $_POST['typeofconn'];
     $isValid = true;


     if($first_name == '' || $email == '' || $address == '' || $contact == '' || $city == '' || $modeofconn == '' || $typeofconn == '')
   {
     $isValid = false;
     $error_message = "Please fill all fields.";
   }
   //Check if Email-ID is valid or not
 if ($isValid && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $isValid = false;
     $error_message = "Invalid Email-ID.";
    }


    elseif($isValid){
     $sql = "INSERT INTO client_detail (name,email,address,contact,city,modeofconn,typeofconn)
     VALUES ('$first_name','$email','$address',' $contact','$city','$modeofconn','$typeofconn')";
     if (mysqli_query($con, $sql)) {
        $success_message = "Record added successfully.";
     } else {
          $error_message = "No Record inserted.";
     }
 }
     mysqli_close($con);
}
?>
<body>
    <div class="wrapper">
        <div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="javascript:;" class="simple-text">
                      <img src="" alt="">
                      EQUINOR
                    </a>
                </div>
                <ul class="nav">
                    <li>
                        <a class="nav-link" href="dashboard.html">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    </li>
                      <li>
                        <a class="nav-link" href="user.php">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>User Profile</p>
                        </a>
                    </li>

                    <li  class="nav-item active">
                        <a class="nav-link" href="newadd.php">
                            <i class="nc-icon nc-badge"></i>
                            <p>Add New Users</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="table.php">
                            <i class="nc-icon nc-notes"></i>
                            <p>Search User List</p>
                        </a>
                    </li>
                     <li>
                        <a class="nav-link" href="report.php">
                            <i class="nc-icon nc-paper-2"></i>
                            <p>Report of Users</p>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo">Users Management System</a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href="dashboard.html" class="nav-link" data-toggle="dropdown">
                                    <i class="nc-icon nc-palette"></i>
                                    <span class="d-lg-none">Dashboard</span>
                                </a>
                            </li>
                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <i class="nc-icon nc-planet"></i>
                                    <span class="notification">5</span>
                                    <span class="d-lg-none">Notification</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Notification 1</a>
                                    <a class="dropdown-item" href="#">Notification 2</a>
                                    <a class="dropdown-item" href="#">Notification 3</a>
                                    <a class="dropdown-item" href="#">Notification 4</a>
                                    <a class="dropdown-item" href="#">Another notification</a>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nc-icon nc-zoom-split"></i>
                                    <span class="d-lg-block">&nbsp;Search</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                    <span class="no-icon">Account</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="no-icon">Dropdown</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="sign_in.html">
                                    <span class="no-icon">Log out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Enter User Details</h4>
                                </div>
                                <div class="card-body">
<form action="" method="POST">
                 <?php 
            // Display Error message
            
            if(!empty($error_message)){
            ?>
            <div class="alert alert-danger">
              <strong>Error!</strong> <?= $error_message ?>
            </div>

            <?php
            }
            ?>

            <?php 
            // Display Success message
            if(!empty($success_message)){
            ?>
            <div class="alert alert-success">
              <strong>Success!</strong> <?= $success_message ?>
            </div>

            <?php
            }
            ?>

    <div class="form-group"> <!-- Full Name -->
        <label for="name" class="control-label">Full Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="John Deer">
    </div>  

    <div class="form-group"> <!-- Street 1 -->
        <label for="email" class="control-label">Email </label>
        <input type="email" class="form-control" id="email" name="email" placeholder="abc@gmail.com">
    </div>                  
                            
    <div class="form-group"> <!-- Street 2 -->
        <label for="address" class="control-label"> Address </label>
        <input type="text" class="form-control" id="address" name="address" placeholder="Apartment, suite, unit, building, floor, etc.">
    </div>  

    <div class="form-group"> <!-- City-->
        <label for="city" class="control-label">City</label>
        <input type="text" class="form-control" id="city" name="city" placeholder="Smallville">
    </div> 

     <div class="form-group"> <!-- City-->
        <label for="contact" class="control-label">Contact No.</label>
        <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact No." min="5" max="9">
    </div>                                   
                            
    <div class="form-group"> <!-- State Button -->
        <label for="modeofconn" class="control-label">Mode of Connection</label>
        <select class="form-control" id="modeofconn" name="modeofconn">
            <option value="Mobile">Mobile</option>
            <option value="Landline">Landline</option>
            

        </select>                   
    </div>
    
    <div class="form-group"> <!-- State Button -->
        <label for="typeofconn" class="control-label">type of Connection</label>
        <select class="form-control" id="typeofconn" name="typeofconn">
            <option value="Prepaid">Prepaid</option>
            <option value="Postpaid">Postpaid</option>
            

        </select>                   
    </div>
     
    
    <div class="form-group"> <!-- Submit Button -->
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </div>     
    
</form>         
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
            <!-- Footer -->
            <footer class="footer">
                <div class="container-fluid">
                    <nav>
                        <ul class="footer-menu">
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="http://www.creative-tim.com">EQUINOR</a>, Telecommunication Company
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
    </div>
 </body>


            <!--Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
 <!-- Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
 <script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin  -->  
 <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin -->
<script src="../assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="../assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
</html>
