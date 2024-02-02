<?php
session_start();
// require_once 'session_timeout.php';
 include "menuPractice.php"; ?>
<?php 
//  session_start();

// $status = isset($_GET['status']) ? $_GET['status'] : '';
 if (isset($_GET['Restmessage']) && $_GET['Restmessage'] === 'true') {

  echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>";
  echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js'></script>";
  echo "<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js'></script>";
  
  echo "<style>";
  echo " .custom-alert {";
  echo " position: fixed;";
  echo " top:20%;";
  echo " left: 50%;";
// echo " width: 100%;";
  echo " width:75%;"; 
  echo " height: 60px;"; // Set the desired height
  echo " text-align: center;";
  echo " transform: translateX(-50%);";
  echo " z-index: 1050;";
  echo " }";
  echo "</style>";


  echo '<div class="alert alert-success custom-alert" role="alert">';
  echo 'Password Reset successful! ';
  echo '</div>';
    // You may also add JavaScript to redirect after a delay
  echo '<script>
            setTimeout(function(){
                window.location.href = "homepage.php";
            }, 1000); // 2000 milliseconds = 2 seconds
          </script>';
  }
else if (isset($_GET['status']) && $_GET['status'] === 'success'){
// if ($status === 'success') {
  // $token = $_GET['tokenm'];
echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>";
echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js'></script>";
echo "<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js'></script>";
// Display the message based on the status
echo "<style>";
echo " .custom-alert {";
echo " position: fixed;";
echo " top:40%;";
echo " left: 50%;";
// echo " width: 100%;";
echo " width:75%;"; 
echo " height: 60px;"; // Set the desired height
echo " text-align: center;";
echo " transform: translateX(-50%);";
echo " z-index: 1050;";
echo " }";
echo "</style>";


    echo '<div class="alert alert-success custom-alert" role="alert">';
    echo "Login successful! Redirecting to the homepage ...";
    echo '</div>';
    // You may also add JavaScript to redirect after a delay
    echo '<script>
            setTimeout(function(){
                window.location.href = "homepage.php";
            }, 1000); // 1000 milliseconds = 1seconds
          </script>';
}
 $empid=$_SESSION['email'] ;
if(isset($empid)){

}
  else{
 $errorMessage = "login first to access this page!!!";
  echo "<script>";
  echo "alert('Login failed. Please try again: $errorMessage');";
  echo "window.location.href='index.php?message=$errorMessage';";
  echo "</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
         background-image: url('https://hubble.miraclesoft.com/assets/img/bg-login.jpg');
         background-repeat: no-repeat;
         background-attachment: fixed;
         background-size: 100% 100%;
        
      
      }
        </style>
</head>
<body>

   <h3 style="color:DeepSkyBlue; text-align:center; margin-left:5%; margin-top: 20% ;"> ... Miracle Software System ...</h3> 
</body>
</html>

