
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Management System</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="colorlib-regform-7/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="colorlib-regform-7/css/style.css">
    <script src="gen_validatorv4.js" type="text/javascript"></script>
</head>
<?php
error_reporting(0);
include 'config.php';
 
 $con=mysqli_connect(DBHOST,DBUSER,DBPASSWORD,DBNAME);
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit;
    }
   
    $error_message = "";$success_message = "";

    if(isset($_POST['signup'])){
   $fname = trim($_POST['name']);
   $email = trim($_POST['email']);
   $password = trim($_POST['pass']);
   $confirmpassword = trim($_POST['re_pass']);
   $number= trim($_POST['number']);

   $isValid = true;

   // Check fields are empty or not
   if($fname == '' || $email == '' || $password == '' || $confirmpassword == '' || $number == ''){
     $isValid = false;
     $error_message = "Please fill all fields.";
   }

   // Check if confirm password matching or not
   if($isValid && ($password != $confirmpassword) ){
     $isValid = false;
     $error_message = "Confirm password not matching";
   }

   // Check if Email-ID is valid or not
   if ($isValid && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
     $isValid = false;
     $error_message = "Invalid Email-ID.";
   }

   if($isValid){

     // Check if Email-ID already exists
     $stmt = $con->prepare("SELECT * FROM user_details WHERE userEmail = ?");
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $result = $stmt->get_result();
     $stmt->close();
     if($result->num_rows > 0){
       $isValid = false;
       $error_message = "Email-ID is already existed.";
     }

   }
   

   // Insert records
   if($isValid){
     $insertSQL = "INSERT INTO user_details(userName,userEmail,userPass,userContact ) values(?,?,?,?)";
     $stmt = $con->prepare($insertSQL);
     $stmt->bind_param("ssss",$fname,$email,$password,$number);
     $stmt->execute();
     $stmt->close();

     $success_message = "Account created successfully.";
   }
}
?>
<body>

    <div class="main" style="background-image:url('colorlib-regform-7/Endless River.png'); background-repeat: no-repeat; background-size: cover;">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form" action="">
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

                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name" required/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" required/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password" required/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" required/>
                            </div>
                            <div class="form-group">
                                <label for="number"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="number" name="number" id="number" placeholder="Enter Contact Number" required/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" required />
                                <label for="agree-term" class="label-agree-term" required><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="colorlib-regform-7/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="sign_in.html" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
        <!-- <script  type="text/javascript">
     var frmvalidator = new Validator("register-form");
     frmvalidator.addValidation("name","req","Please enter your  Name");
     frmvalidator.addValidation("name","maxlen=20",
            "Max length for name is 20");
     
     frmvalidator.addValidation("email","maxlen=50");
     frmvalidator.addValidation("email","req");
     frmvalidator.addValidation("email","email");
     
     frmvalidator.addValidation("pass","maxlen=8");
     frmvalidator.addValidation("pass","req");
     
     frmvalidator.addValidation("re_pass","maxlen=8");
     frmvalidator.addValidation("re_pass","req");
    </script> -->

    <script src="colorlib-regform-7/vendor/jquery/jquery.min.js"></script>
    <script src="colorlib-regform-7/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>